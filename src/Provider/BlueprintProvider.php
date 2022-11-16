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

use ShineUnited\Conductor\Capability\BlueprintProvider as BlueprintProviderCapability;
use ShineUnited\Conductor\Addon\Gitignore\Blueprint\GitignoreBlueprint;

/**
 * Blueprint Provider
 */
class BlueprintProvider implements BlueprintProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getBlueprints(): array {
		return [
			new GitignoreBlueprint('{$working-dir}/.gitignore')
		];
	}
}
