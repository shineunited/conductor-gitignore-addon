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

namespace ShineUnited\Conductor\Addon\Gitignore\Tests\Pattern;

use ShineUnited\Conductor\Addon\Gitignore\Tests\TestCase;
use ShineUnited\Conductor\Addon\Gitignore\Pattern\Ruleset;
use ShineUnited\Conductor\Addon\Gitignore\Pattern\RuleInterface;
use ShineUnited\Conductor\Addon\Gitignore\Pattern\ExcludeInterface;

/**
 * Ruleset Test
 */
class RulesetTest extends TestCase {

	/**
	 * @return void
	 */
	public function testConstructor(): void {
		$ruleset = new Ruleset('name', [
			'exclude'
		]);

		$this->assertInstanceOf(Ruleset::class, $ruleset);
	}

	/**
	 * @return void
	 */
	public function testGetName(): void {
		$name = 'name';

		$ruleset = new Ruleset($name);

		$this->assertSame($name, $ruleset->getName());
	}

	/**
	 * @return void
	 */
	public function testAddRuleWithRuleInterface(): void {
		$ruleset = new Ruleset('name');
		$rule = $this->createStub(RuleInterface::class);

		$this->assertFalse($ruleset->hasRules());
		$ruleset->addRule($rule);

		$this->assertTrue($ruleset->hasRules());
		$this->assertSame([$rule], $ruleset->getRules());
	}

	/**
	 * @return void
	 */
	public function testAddRuleWithString(): void {
		$ruleset = new Ruleset('name');

		$string = 'string/path';

		$this->assertFalse($ruleset->hasRules());
		$ruleset->addRule($string);

		$this->assertTrue($ruleset->hasRules());
		$this->assertIsArray($ruleset->getRules());
		$rules = $ruleset->getRules();
		$this->assertSame($string, $rules[0]->getPath());
	}

	/**
	 * @return void
	 */
	public function testAddRuleWithCallable(): void {
		$ruleset = new Ruleset('name');

		$callable = function () {
			return 'callable/rule';
		};

		$this->assertFalse($ruleset->hasRules());
		$ruleset->addRule($callable);

		$this->assertTrue($ruleset->hasRules());
		$this->assertIsArray($ruleset->getRules());
		$rules = $ruleset->getRules();
		$this->assertSame($callable, $rules[0]->getPath());
	}

	/**
	 * @return void
	 */
	public function testGetRules(): void {
		$stub = $this->createStub(RuleInterface::class);
		$string = 'string/rule';
		$callable = function () {
			return 'callable/rule';
		};

		$rules = [
			$stub,
			$string,
			$callable
		];

		$ruleset = new Ruleset('name', $rules);

		$rules = $ruleset->getRules();
		foreach ($rules as $rule) {
			$this->assertInstanceOf(RuleInterface::class, $rule);
		}

		$this->assertSame($stub, $rules[0]);
		$this->assertSame($string, $rules[1]->getPath());
		$this->assertSame($callable, $rules[2]->getPath());
	}

	/**
	 * @return void
	 */
	public function testHasRules(): void {
		$stub = $this->createStub(RuleInterface::class);
		$string = 'string/rule';
		$callable = function () {
			return 'callable/rule';
		};

		$rules = [
			$stub,
			$string,
			$callable
		];

		foreach ($rules as $rule) {
			$ruleset = new Ruleset('name');

			$this->assertFalse($ruleset->hasRules());

			$ruleset->addRule($rule);

			$this->assertTrue($ruleset->hasRules());
		}
	}
}
