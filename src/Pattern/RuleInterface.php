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
 * Rule Interface
 */
interface RuleInterface {

	/**
	 * Gets the rule path.
	 *
	 * @return string|callable The rule path.
	 */
	public function getPath(): string|callable;

	/**
	 * Returns a list of exclude objects.
	 *
	 * @return Exclude[] List of excludes.
	 */
	public function getExcludes(): array;
}
