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
use ShineUnited\Conductor\Addon\Gitignore\Pattern\Exclude;
use ShineUnited\Conductor\Addon\Gitignore\Pattern\ExcludeInterface;

/**
 * Exclude Test
 */
class ExcludeTest extends TestCase {

	/**
	 * @return void
	 */
	public function testConstructor(): void {
		$exclude = new Exclude('path');

		$this->assertInstanceOf(ExcludeInterface::class, $exclude);
	}

	/**
	 * @return void
	 */
	public function testGetPathWithString(): void {
		$string = 'string/path';

		$exclude = new Exclude($string);
		$this->assertSame($string, $exclude->getPath());
	}

	/**
	 * @return void
	 */
	public function testGetPathWithCallable(): void {
		$callable = function () {
			return 'callable/path';
		};

		$exclude = new Exclude($callable);
		$this->assertSame($callable, $exclude->getPath());
	}
}
