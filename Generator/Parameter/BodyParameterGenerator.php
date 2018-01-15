<?php

namespace Jane\OpenApi\Generator\Parameter;

use Doctrine\Common\Inflector\Inflector;
use Jane\JsonSchema\Generator\Context\Context;
use Jane\JsonSchemaRuntime\Reference;
use Jane\OpenApi\Model\BodyParameter;
use Jane\OpenApi\Model\Schema;
use PhpParser\Node;
use PhpParser\Parser;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class BodyParameterGenerator extends ParameterGenerator
{
    /**
     * @var DenormalizerInterface
     */
    private $denormalizer;

    public function __construct(Parser $parser, DenormalizerInterface $denormalizer)
    {
        parent::__construct($parser);

        $this->denormalizer = $denormalizer;
    }

    /**
     * {@inheritdoc}
     *
     * @param $parameter BodyParameter
     */
    public function generateMethodParameter($parameter, Context $context, $reference)
    {
        $name = Inflector::camelize($parameter->getName());

        list($class, $array) = $this->getClass($parameter, $context, $reference);
        $paramType = \count($class) === 1 ? $class[0] : null;

        if ($array) {
            $paramType = 'array';
        }

        return new Node\Param($name, null, $paramType);
    }

    /**
     * {@inheritdoc}
     *
     * @param $parameter BodyParameter
     */
    public function generateMethodDocParameter($parameter, Context $context, $reference)
    {
        list($class, $array) = $this->getClass($parameter, $context, $reference);

        return sprintf(' * @param %s $%s %s', implode('|', $class), Inflector::camelize($parameter->getName()), $parameter->getDescription() ?: '');
    }

    /**
     * @param BodyParameter $parameter
     * @param Context       $context
     *
     * @return array
     */
    protected function getClass(BodyParameter $parameter, Context $context, $reference)
    {
        $resolvedSchema = null;
        $jsonReference = null;
        $array = false;
        $schema = $parameter->getSchema();

        if ($schema instanceof Reference) {
            list($jsonReference, $resolvedSchema) = $this->resolveSchema($schema, Schema::class);
        }

        if ($schema instanceof Schema && 'array' === $schema->getType() && $schema->getItems() instanceof Reference) {
            list($jsonReference, $resolvedSchema) = $this->resolveSchema($schema->getItems(), Schema::class);
            $array = true;
        }

        if (null === $resolvedSchema) {
            if ($context->getRegistry()->hasClass($reference)) {
                return [['\\' . $context->getRegistry()->getSchema($reference)->getNamespace() . '\\Model\\' . $context->getRegistry()->getClass($reference)->getName()], false];
            }

            return [$this->convertParameterType($schema->getType()), null];
        }

        $class = $context->getRegistry()->getClass($jsonReference);

        // Happens when reference resolve to a none object
        if (null === $class) {
            return [$this->convertParameterType($schema->getType()), null];
        }

        $class = '\\' . $context->getRegistry()->getSchema($jsonReference)->getNamespace() . '\\Model\\' . $class->getName();

        if ($array) {
            $class .= '[]';
        }

        return [[$class], $array];
    }

    private function convertParameterType($type)
    {
        $convertArray = [
            'string' => ['string'],
            'number' => ['float'],
            'boolean' => ['bool'],
            'integer' => ['int'],
            'array' => ['array'],
            'object' => ['\\stdClass'],
            'file' => ['string', 'resource', '\\' . StreamInterface::class],
        ];

        return $convertArray[$type] ?? ['mixed'];
    }

    /**
     * @param Reference $reference
     * @param $class
     *
     * @return mixed
     */
    private function resolveSchema(Reference $reference, $class)
    {
        $result = $reference;

        do {
            $refString = (string) $reference->getMergedUri();
            $result = $result->resolve(function ($data) use ($result, $class) {
                return $this->denormalizer->denormalize($data, $class, 'json', [
                    'document-origin' => (string) $result->getMergedUri()->withFragment(''),
                ]);
            });
        } while ($result instanceof Reference);

        return [$refString, $result];
    }
}
