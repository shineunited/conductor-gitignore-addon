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

namespace ShineUnited\Conductor\Addon\Gitignore\Tests;

use ShineUnited\Conductor\Addon\Gitignore\Plugin;
use ShineUnited\Conductor\Addon\Gitignore\Provider\BlueprintProvider;
use ShineUnited\Conductor\Addon\Gitignore\Provider\GeneratorProvider;
use ShineUnited\Conductor\Addon\Gitignore\Provider\ParameterProvider;
use ShineUnited\Conductor\Capability\BlueprintProvider as BlueprintProviderCapability;
use ShineUnited\Conductor\Capability\GeneratorProvider as GeneratorProviderCapability;
use ShineUnited\Conductor\Capability\ParameterProvider as ParameterProviderCapability;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capable;

/**
 * Base Test Case
 */
class PluginTest extends TestCase {

	/**
	 * @return void
	 */
	public function testGetCapabilities(): void {
		$classmap = [
			BlueprintProviderCapability::class => BlueprintProvider::class,
			GeneratorProviderCapability::class => GeneratorProvider::class,
			ParameterProviderCapability::class => ParameterProvider::class
		];

		$plugin = new Plugin();
		$this->assertInstanceOf(PluginInterface::class, $plugin);
		$this->assertInstanceOf(Capable::class, $plugin);

		$capabilities = $plugin->getCapabilities();
		$this->assertIsArray($capabilities);

		foreach ($classmap as $capability => $provider) {
			$this->assertArrayHasKey($capability, $capabilities);
			$this->assertEquals($provider, $capabilities[$capability]);
		}
	}
}
