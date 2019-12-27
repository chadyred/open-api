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

class EncodingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi\\JsonSchema\\Model\\Encoding';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi\JsonSchema\Model\Encoding;
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
        $object = new \Jane\OpenApi\JsonSchema\Model\Encoding();
        if (property_exists($data, 'contentType') && $data->{'contentType'} !== null) {
            $object->setContentType($data->{'contentType'});
        }
        if (property_exists($data, 'headers') && $data->{'headers'} !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'headers'} as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Model\\Header', 'json', $context);
            }
            $object->setHeaders($values);
        }
        if (property_exists($data, 'style') && $data->{'style'} !== null) {
            $object->setStyle($data->{'style'});
        }
        if (property_exists($data, 'explode') && $data->{'explode'} !== null) {
            $object->setExplode($data->{'explode'});
        }
        if (property_exists($data, 'allowReserved') && $data->{'allowReserved'} !== null) {
            $object->setAllowReserved($data->{'allowReserved'});
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getContentType()) {
            $data->{'contentType'} = $object->getContentType();
        }
        if (null !== $object->getHeaders()) {
            $values = new \stdClass();
            foreach ($object->getHeaders() as $key => $value) {
                $values->{$key} = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'headers'} = $values;
        }
        if (null !== $object->getStyle()) {
            $data->{'style'} = $object->getStyle();
        }
        if (null !== $object->getExplode()) {
            $data->{'explode'} = $object->getExplode();
        }
        if (null !== $object->getAllowReserved()) {
            $data->{'allowReserved'} = $object->getAllowReserved();
        }

        return $data;
    }
}
