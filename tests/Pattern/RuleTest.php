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
use ShineUnited\Conductor\Addon\Gitignore\Pattern\Rule;
use ShineUnited\Conductor\Addon\Gitignore\Pattern\RuleInterface;
use ShineUnited\Conductor\Addon\Gitignore\Pattern\ExcludeInterface;

/**
 * Rule Test
 */
class RuleTest extends TestCase {

	/**
	 * @return void
	 */
	public function testConstructor(): void {
		$rule = new Rule('path', [
			'exclude'
		]);

		$this->assertInstanceOf(RuleInterface::class, $rule);
	}

	/**
	 * @return void
	 */
	public function testGetPathWithString(): void {
		$string = 'string/path';

		$rule = new Rule($string);
		$this->assertSame($string, $rule->getPath());
	}

	/**
	 * @return void
	 */
	public function testGetPathWithCallable(): void {
		$callable = function () {
			return 'callable/path';
		};

		$rule = new Rule($callable);
		$this->assertSame($callable, $rule->getPath());
	}

	/**
	 * @return void
	 */
	public function testAddExcludeWithExcludeInterface(): void {
		$rule = new Rule('path');
		$exclude = $this->createStub(ExcludeInterface::class);

		$rule->addExclude($exclude);

		$this->assertSame([$exclude], $rule->getExcludes());
	}

	/**
	 * @return void
	 */
	public function testAddExcludeWithString(): void {
		$rule = new Rule('path');

		$string = 'string/exclude';

		$rule->addExclude($string);
		$excludes = $rule->getExcludes();

		$this->assertSame($string, $excludes[0]->getPath());
	}

	/**
	 * @return void
	 */
	public function testAddExcludeWithCallable(): void {
		$rule = new Rule('path');

		$callable = function () {
			return 'callable/exclude';
		};

		$rule->addExclude($callable);
		$excludes = $rule->getExcludes();

		$this->assertSame($callable, $excludes[0]->getPath());
	}

	/**
	 * @return void
	 */
	public function testGetExcludes(): void {
		$stub = $this->createStub(ExcludeInterface::class);
		$string = 'string/exclude';
		$callable = function () {
			return 'callable/exclude';
		};

		$excludes = [
			$stub,
			$string,
			$callable
		];

		$rule = new Rule('path', $excludes);

		$excludes = $rule->getExcludes();
		foreach ($excludes as $exclude) {
			$this->assertInstanceOf(ExcludeInterface::class, $exclude);
		}

		$this->assertSame($stub, $excludes[0]);
		$this->assertSame($string, $excludes[1]->getPath());
		$this->assertSame($callable, $excludes[2]->getPath());
	}
}
