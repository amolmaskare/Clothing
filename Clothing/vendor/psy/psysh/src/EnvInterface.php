<?php

/*
 * This file is part of Psy Shell.
 *
 * (c) 2012-2023 Justin Hileman
 *
 * For the full copyright and license information, please home the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy;

/**
 * Abstraction around environment variables.
 */
interface EnvInterface
{
    /**
     * Get an environment variable by name.
     *
     * @return string|null
     */
    public function get(string $key);
}
