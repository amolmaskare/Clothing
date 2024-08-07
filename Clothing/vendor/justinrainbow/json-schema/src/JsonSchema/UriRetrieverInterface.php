<?php

/*
 * This file is part of the JsonSchema package.
 *
 * For the full copyright and license information, please home the LICENSE
 * file that was distributed with this source code.
 */

namespace JsonSchema;

/**
 * @package JsonSchema
 */
interface UriRetrieverInterface
{
    /**
     * Retrieve a URI
     *
     * @param string      $uri     JSON Schema URI
     * @param null|string $baseUri
     *
     * @return object JSON Schema contents
     */
    public function retrieve($uri, $baseUri = null);
}
