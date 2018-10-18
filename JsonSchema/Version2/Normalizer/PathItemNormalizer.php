<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi\JsonSchema\Version2\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class PathItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\PathItem';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi\JsonSchema\Version2\Model\PathItem;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!\is_object($data)) {
            throw new InvalidArgumentException();
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['document-origin']);
        }
        $object = new \Jane\OpenApi\JsonSchema\Version2\Model\PathItem();
        $data = clone $data;
        if (property_exists($data, '$ref')) {
            $object->setDollarRef($data->{'$ref'});
            unset($data->{'$ref'});
        }
        if (property_exists($data, 'get')) {
            $object->setGet($this->denormalizer->denormalize($data->{'get'}, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\Operation', 'json', $context));
            unset($data->{'get'});
        }
        if (property_exists($data, 'put')) {
            $object->setPut($this->denormalizer->denormalize($data->{'put'}, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\Operation', 'json', $context));
            unset($data->{'put'});
        }
        if (property_exists($data, 'post')) {
            $object->setPost($this->denormalizer->denormalize($data->{'post'}, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\Operation', 'json', $context));
            unset($data->{'post'});
        }
        if (property_exists($data, 'delete')) {
            $object->setDelete($this->denormalizer->denormalize($data->{'delete'}, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\Operation', 'json', $context));
            unset($data->{'delete'});
        }
        if (property_exists($data, 'options')) {
            $object->setOptions($this->denormalizer->denormalize($data->{'options'}, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\Operation', 'json', $context));
            unset($data->{'options'});
        }
        if (property_exists($data, 'head')) {
            $object->setHead($this->denormalizer->denormalize($data->{'head'}, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\Operation', 'json', $context));
            unset($data->{'head'});
        }
        if (property_exists($data, 'patch')) {
            $object->setPatch($this->denormalizer->denormalize($data->{'patch'}, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\Operation', 'json', $context));
            unset($data->{'patch'});
        }
        if (property_exists($data, 'parameters')) {
            $values = [];
            foreach ($data->{'parameters'} as $value) {
                $value_1 = $value;
                if (\is_object($value) and isset($value->{'name'}) and (isset($value->{'in'}) and $value->{'in'} == 'body') and isset($value->{'schema'})) {
                    $value_1 = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\BodyParameter', 'json', $context);
                }
                if (\is_object($value) and (isset($value->{'in'}) and $value->{'in'} == 'header') and isset($value->{'name'}) and (isset($value->{'type'}) and ($value->{'type'} == 'string' or $value->{'type'} == 'number' or $value->{'type'} == 'boolean' or $value->{'type'} == 'integer' or $value->{'type'} == 'array'))) {
                    $value_1 = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\HeaderParameterSubSchema', 'json', $context);
                }
                if (\is_object($value) and (isset($value->{'in'}) and $value->{'in'} == 'formData') and isset($value->{'name'}) and (isset($value->{'type'}) and ($value->{'type'} == 'string' or $value->{'type'} == 'number' or $value->{'type'} == 'boolean' or $value->{'type'} == 'integer' or $value->{'type'} == 'array' or $value->{'type'} == 'file'))) {
                    $value_1 = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\FormDataParameterSubSchema', 'json', $context);
                }
                if (\is_object($value) and (isset($value->{'in'}) and $value->{'in'} == 'query') and isset($value->{'name'}) and (isset($value->{'type'}) and ($value->{'type'} == 'string' or $value->{'type'} == 'number' or $value->{'type'} == 'boolean' or $value->{'type'} == 'integer' or $value->{'type'} == 'array'))) {
                    $value_1 = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\QueryParameterSubSchema', 'json', $context);
                }
                if (\is_object($value) and (isset($value->{'required'}) and $value->{'required'} == '1') and (isset($value->{'in'}) and $value->{'in'} == 'path') and isset($value->{'name'}) and (isset($value->{'type'}) and ($value->{'type'} == 'string' or $value->{'type'} == 'number' or $value->{'type'} == 'boolean' or $value->{'type'} == 'integer' or $value->{'type'} == 'array'))) {
                    $value_1 = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\PathParameterSubSchema', 'json', $context);
                }
                if (\is_object($value) and isset($value->{'$ref'})) {
                    $value_1 = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Version2\\Model\\JsonReference', 'json', $context);
                }
                $values[] = $value_1;
            }
            $object->setParameters($values);
            unset($data->{'parameters'});
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/^x-/', $key)) {
                $object[$key] = $value_2;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getDollarRef()) {
            $data->{'$ref'} = $object->getDollarRef();
        }
        if (null !== $object->getGet()) {
            $data->{'get'} = $this->normalizer->normalize($object->getGet(), 'json', $context);
        }
        if (null !== $object->getPut()) {
            $data->{'put'} = $this->normalizer->normalize($object->getPut(), 'json', $context);
        }
        if (null !== $object->getPost()) {
            $data->{'post'} = $this->normalizer->normalize($object->getPost(), 'json', $context);
        }
        if (null !== $object->getDelete()) {
            $data->{'delete'} = $this->normalizer->normalize($object->getDelete(), 'json', $context);
        }
        if (null !== $object->getOptions()) {
            $data->{'options'} = $this->normalizer->normalize($object->getOptions(), 'json', $context);
        }
        if (null !== $object->getHead()) {
            $data->{'head'} = $this->normalizer->normalize($object->getHead(), 'json', $context);
        }
        if (null !== $object->getPatch()) {
            $data->{'patch'} = $this->normalizer->normalize($object->getPatch(), 'json', $context);
        }
        if (null !== $object->getParameters()) {
            $values = [];
            foreach ($object->getParameters() as $value) {
                $value_1 = $value;
                if (\is_object($value)) {
                    $value_1 = $this->normalizer->normalize($value, 'json', $context);
                }
                if (\is_object($value)) {
                    $value_1 = $this->normalizer->normalize($value, 'json', $context);
                }
                if (\is_object($value)) {
                    $value_1 = $this->normalizer->normalize($value, 'json', $context);
                }
                if (\is_object($value)) {
                    $value_1 = $this->normalizer->normalize($value, 'json', $context);
                }
                if (\is_object($value)) {
                    $value_1 = $this->normalizer->normalize($value, 'json', $context);
                }
                if (\is_object($value)) {
                    $value_1 = $this->normalizer->normalize($value, 'json', $context);
                }
                $values[] = $value_1;
            }
            $data->{'parameters'} = $values;
        }
        foreach ($object as $key => $value_2) {
            if (preg_match('/^x-/', $key)) {
                $data->{$key} = $value_2;
            }
        }

        return $data;
    }
}
