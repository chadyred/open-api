<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi\Tests\Expected\Resource;

trait DefaultResourceTrait
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function testHost(string $fetch = self::FETCH_OBJECT)
    {
        $endpoint = new \Jane\OpenApi\Tests\Expected\Endpoint\TestHost();

        return $this->executePsr7Endpoint($endpoint, $fetch);
    }
}
