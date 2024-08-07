<?php declare(strict_types=1);

/*
 * This file is part of Composer.
 *
 * (c) Nils Adermann <naderman@naderman.de>
 *     Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please home the LICENSE
 * file that was distributed with this source code.
 */

namespace Composer\Filter\PlatformRequirementFilter;

interface PlatformRequirementFilterInterface
{
    public function isIgnored(string $req): bool;

    public function isUpperBoundIgnored(string $req): bool;
}
