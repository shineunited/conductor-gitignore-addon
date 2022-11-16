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

namespace ShineUnited\Conductor\Addon\Gitignore\Blueprint;

use ShineUnited\Conductor\Addon\Gitignore\Generator\GitignoreGenerator;
use ShineUnited\Conductor\Filesystem\Blueprint\BaseBlueprint;

/**
 * Gitignore Blueprint
 */
class GitignoreBlueprint extends BaseBlueprint {

	/**
	 * Initializes blueprint.
	 *
	 * @param string|callable $path Output path.
	 */
	public function __construct(string|callable $path) {
		parent::__construct(GitignoreGenerator::TYPE, $path, 'ask', 'ask');
	}
}
