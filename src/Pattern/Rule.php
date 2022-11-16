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
 * Rule
 */
class Rule implements RuleInterface {
	private mixed $path;
	private array $excludes;

	/**
	 * Initializes the rule.
	 *
	 * @param string|callable       $path     The path to ignore.
	 * @param array|string|callable $excludes Paths to exclude from the ignore rule.
	 */
	public function __construct(string|callable $path, array|string|callable $excludes = []) {
		$this->path = $path;
		$this->excludes = [];
		if (is_array($excludes)) {
			foreach ($excludes as $exclude) {
				$this->addExclude($exclude);
			}
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPath(): string|callable {
		return $this->path;
	}

	/**
	 * Add an exclusion to the ignore rule.
	 *
	 * @param ExcludeInterface|string|callable $exclude The path to exclude.
	 *
	 * @return Rule This rule.
	 */
	public function addExclude(ExcludeInterface|string|callable $exclude): self {
		if (!$exclude instanceof ExcludeInterface) {
			$exclude = new Exclude($exclude);
		}

		$this->excludes[] = $exclude;

		return $this;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getExcludes(): array {
		return $this->excludes;
	}
}
