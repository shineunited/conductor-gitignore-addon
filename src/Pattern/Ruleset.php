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
 * Ruleset
 */
class Ruleset {
	private string $name;
	private array $rules;

	/**
	 * Initializes the ruleset.
	 *
	 * @param string  $name  The name of the ruleset.
	 * @param mixed[] $rules A list of rules.
	 */
	public function __construct(string $name, array $rules = []) {
		$this->name = $name;
		$this->rules = [];
		foreach ($rules as $rule) {
			$this->addRule($rule);
		}
	}

	/**
	 * Gets the name of the ruleset.
	 *
	 * @return string Name of the ruleset.
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * Adds a rule to the ruleset.
	 *
	 * @param RuleInterface|string|callable $rule The rule to add.
	 *
	 * @return Ruleset The current ruleset.
	 */
	public function addRule(RuleInterface|string|callable $rule): self {
		if (!$rule instanceof RuleInterface) {
			$rule = new Rule($rule);
		}

		$this->rules[] = $rule;

		return $this;
	}

	/**
	 * Returns the list of rules.
	 *
	 * @return Rule[] The list of rules.
	 */
	public function getRules(): array {
		return $this->rules;
	}

	/**
	 * Checks if the ruleset has any rules.
	 *
	 * @return boolean True if there are one or more rules in this ruleset.
	 */
	public function hasRules(): bool {
		if (count($this->rules) > 0) {
			return true;
		}

		return false;
	}
}
