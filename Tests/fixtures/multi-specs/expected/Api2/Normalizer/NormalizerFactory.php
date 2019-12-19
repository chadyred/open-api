<?php

namespace Jane\OpenApi\Tests\Expected\Api2\Normalizer;

@trigger_error('The "NormalizerFactory" class is deprecated since Jane 5.3, use "LazyNormalizer" instead.', E_USER_DEPRECATED);
/**
 * @deprecated The "NormalizerFactory" class is deprecated since Jane 5.3, use "LazyNormalizer" instead.
 */
class NormalizerFactory
{
    public static function create()
    {
        $normalizers = array();
        $normalizers[] = new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer();
        $normalizers[] = new \Jane\OpenApi\Tests\Expected\Api2\Normalizer\LazyNormalizer();
        return $normalizers;
    }
}