<?php

namespace Jane\OpenApi\Tests\Expected\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Jane\JsonSchemaRuntime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class DefaultUserFieldsEntitiesUrlNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi\\Tests\\Expected\\Model\\DefaultUserFieldsEntitiesUrl';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Jane\\OpenApi\\Tests\\Expected\\Model\\DefaultUserFieldsEntitiesUrl';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \Jane\OpenApi\Tests\Expected\Model\DefaultUserFieldsEntitiesUrl();
        if (\array_key_exists('urls', $data)) {
            $values = array();
            foreach ($data['urls'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\Tests\\Expected\\Model\\UrlEntity', 'json', $context);
            }
            $object->setUrls($values);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getUrls()) {
            $values = array();
            foreach ($object->getUrls() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['urls'] = $values;
        }
        return $data;
    }
}