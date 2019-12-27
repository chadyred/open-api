<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi\JsonSchema\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
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
        return $type === 'Jane\\OpenApi\\JsonSchema\\Model\\PathItem';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi\JsonSchema\Model\PathItem;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['document-origin']);
        }
        if (isset($data->{'$recursiveRef'})) {
            return new Reference($data->{'$recursiveRef'}, $context['document-origin']);
        }
        $object = new \Jane\OpenApi\JsonSchema\Model\PathItem();
        $data = clone $data;
        if (property_exists($data, '$ref') && $data->{'$ref'} !== null) {
            $object->setDollarRef($data->{'$ref'});
            unset($data->{'$ref'});
        }
        if (property_exists($data, 'summary') && $data->{'summary'} !== null) {
            $object->setSummary($data->{'summary'});
            unset($data->{'summary'});
        }
        if (property_exists($data, 'description') && $data->{'description'} !== null) {
            $object->setDescription($data->{'description'});
            unset($data->{'description'});
        }
        if (property_exists($data, 'get') && $data->{'get'} !== null) {
            $object->setGet($this->denormalizer->denormalize($data->{'get'}, 'Jane\\OpenApi\\JsonSchema\\Model\\Operation', 'json', $context));
            unset($data->{'get'});
        }
        if (property_exists($data, 'put') && $data->{'put'} !== null) {
            $object->setPut($this->denormalizer->denormalize($data->{'put'}, 'Jane\\OpenApi\\JsonSchema\\Model\\Operation', 'json', $context));
            unset($data->{'put'});
        }
        if (property_exists($data, 'post') && $data->{'post'} !== null) {
            $object->setPost($this->denormalizer->denormalize($data->{'post'}, 'Jane\\OpenApi\\JsonSchema\\Model\\Operation', 'json', $context));
            unset($data->{'post'});
        }
        if (property_exists($data, 'delete') && $data->{'delete'} !== null) {
            $object->setDelete($this->denormalizer->denormalize($data->{'delete'}, 'Jane\\OpenApi\\JsonSchema\\Model\\Operation', 'json', $context));
            unset($data->{'delete'});
        }
        if (property_exists($data, 'options') && $data->{'options'} !== null) {
            $object->setOptions($this->denormalizer->denormalize($data->{'options'}, 'Jane\\OpenApi\\JsonSchema\\Model\\Operation', 'json', $context));
            unset($data->{'options'});
        }
        if (property_exists($data, 'head') && $data->{'head'} !== null) {
            $object->setHead($this->denormalizer->denormalize($data->{'head'}, 'Jane\\OpenApi\\JsonSchema\\Model\\Operation', 'json', $context));
            unset($data->{'head'});
        }
        if (property_exists($data, 'patch') && $data->{'patch'} !== null) {
            $object->setPatch($this->denormalizer->denormalize($data->{'patch'}, 'Jane\\OpenApi\\JsonSchema\\Model\\Operation', 'json', $context));
            unset($data->{'patch'});
        }
        if (property_exists($data, 'trace') && $data->{'trace'} !== null) {
            $object->setTrace($this->denormalizer->denormalize($data->{'trace'}, 'Jane\\OpenApi\\JsonSchema\\Model\\Operation', 'json', $context));
            unset($data->{'trace'});
        }
        if (property_exists($data, 'servers') && $data->{'servers'} !== null) {
            $values = [];
            foreach ($data->{'servers'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Model\\Server', 'json', $context);
            }
            $object->setServers($values);
            unset($data->{'servers'});
        }
        if (property_exists($data, 'parameters') && $data->{'parameters'} !== null) {
            $values_1 = [];
            foreach ($data->{'parameters'} as $value_1) {
                $value_2 = $value_1;
                if (is_object($value_1) and isset($value_1->{'$ref'})) {
                    $value_2 = $this->denormalizer->denormalize($value_1, 'Jane\\OpenApi\\JsonSchema\\Model\\Reference', 'json', $context);
                } elseif (is_object($value_1) and isset($value_1->{'name'}) and isset($value_1->{'in'})) {
                    $value_2 = $this->denormalizer->denormalize($value_1, 'Jane\\OpenApi\\JsonSchema\\Model\\Parameter', 'json', $context);
                }
                $values_1[] = $value_2;
            }
            $object->setParameters($values_1);
            unset($data->{'parameters'});
        }
        foreach ($data as $key => $value_3) {
            if (preg_match('/^(get|put|post|delete|options|head|patch|trace)$/', $key)) {
                $object[$key] = $this->denormalizer->denormalize($value_3, 'Jane\\OpenApi\\JsonSchema\\Model\\Operation', 'json', $context);
            }
            if (preg_match('/^x-/', $key)) {
                $object[$key] = $value_3;
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
        if (null !== $object->getSummary()) {
            $data->{'summary'} = $object->getSummary();
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
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
        if (null !== $object->getTrace()) {
            $data->{'trace'} = $this->normalizer->normalize($object->getTrace(), 'json', $context);
        }
        if (null !== $object->getServers()) {
            $values = [];
            foreach ($object->getServers() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'servers'} = $values;
        }
        if (null !== $object->getParameters()) {
            $values_1 = [];
            foreach ($object->getParameters() as $value_1) {
                $value_2 = $value_1;
                if (is_object($value_1)) {
                    $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                } elseif (is_object($value_1)) {
                    $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $values_1[] = $value_2;
            }
            $data->{'parameters'} = $values_1;
        }
        foreach ($object as $key => $value_3) {
            if (preg_match('/^(get|put|post|delete|options|head|patch|trace)$/', $key)) {
                $data->{$key} = $this->normalizer->normalize($value_3, 'json', $context);
            }
            if (preg_match('/^x-/', $key)) {
                $data->{$key} = $value_3;
            }
        }

        return $data;
    }
}
