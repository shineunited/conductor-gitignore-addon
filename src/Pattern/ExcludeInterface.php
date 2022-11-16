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

namespace ShineUnited\Conductor\Addon\Gitignore\Pattern;

/**
 * Exclude Interface
 */
interface ExcludeInterface {

	/**
	 * Gets the excluded path.
	 *
	 * @return string|callable The excluded path.
	 */
	public function getPath(): string|callable;
}
