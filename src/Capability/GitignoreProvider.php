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

namespace ShineUnited\Conductor\Addon\Gitignore\Capability;

use ShineUnited\Conductor\Addon\Gitignore\Pattern\Rule;
use Composer\Plugin\Capability\Capability;

/**
 * Gitignore Provider Interface
 *
 * This capability will receive an array with 'config' key as constructor
 * argument. This contains a ShineUnited\Conductor\Configuration\Configuration
 * instance. It also contains a 'plugin' key containing the plugin instance that
 * created the capability.
 */
interface GitignoreProvider extends Capability {

	/**
	 * Retrieve an array of gitignore rules
	 *
	 * @return Rule[]
	 */
	public function getGitignores(): array;
}
