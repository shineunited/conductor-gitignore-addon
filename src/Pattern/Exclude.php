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
 * Exclude
 */
class Exclude implements ExcludeInterface {
	private mixed $path;

	/**
	 * Initializes the exclude.
	 *
	 * @param string|callable $path The path to exclude.
	 */
	public function __construct(string|callable $path) {
		$this->path = $path;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPath(): string|callable {
		return $this->path;
	}
}
