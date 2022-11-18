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

namespace ShineUnited\Conductor\Addon\Gitignore\Tests\Generator;

use ShineUnited\Conductor\Addon\Gitignore\Tests\TestCase;
use ShineUnited\Conductor\Addon\Gitignore\Blueprint\GitignoreBlueprintInterface;
use ShineUnited\Conductor\Addon\Gitignore\Generator\GitignoreGenerator;
use ShineUnited\Conductor\Filesystem\Blueprint\BlueprintInterface;
use ShineUnited\Conductor\Filesystem\Blueprint\FileBlueprintInterface;
use ShineUnited\Conductor\Filesystem\Generator\GeneratorInterface;

/**
 * Gitignore Generator Test
 */
class GitignoreGeneratorTest extends TestCase {

	/**
	 * @return void
	 */
	public function testHandlesBlueprint(): void {
		$generator = new GitignoreGenerator();

		$gitignoreBlueprint = $this->createStub(GitignoreBlueprintInterface::class);
		$genericBlueprint = $this->createStub(BlueprintInterface::class);
		$fileBlueprint = $this->createStub(FileBlueprintInterface::class);

		$this->assertTrue($generator->handlesBlueprint($gitignoreBlueprint));
		$this->assertFalse($generator->handlesBlueprint($genericBlueprint));
		$this->assertFalse($generator->handlesBlueprint($fileBlueprint));
	}

	/**
	 * @return void
	 */
	public function testGenerateContents(): void {
		$this->toDo();
	}
}
