<?php

/**
 * This file is part of Conductor Gitignore Addon.
 *
 * (c) Shine United LLC
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace ShineUnited\Conductor\Addon\Gitignore\Provider;

use ShineUnited\Conductor\Addon\Gitignore\Generator\GitignoreGenerator;
use ShineUnited\Conductor\Capability\GeneratorProvider as GeneratorProviderCapability;

/**
 * Generator Provider
 */
class GeneratorProvider implements GeneratorProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getGenerators(): array {
		return [
			new GitignoreGenerator()
		];
	}
}
