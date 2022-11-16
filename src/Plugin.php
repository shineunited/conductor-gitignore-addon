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

namespace ShineUnited\Conductor\Addon\Gitignore;

use ShineUnited\Conductor\Addon\Gitignore\Provider\BlueprintProvider;
use ShineUnited\Conductor\Addon\Gitignore\Provider\GeneratorProvider;
use ShineUnited\Conductor\Addon\Gitignore\Provider\ParameterProvider;
use ShineUnited\Conductor\Capability\BlueprintProvider as BlueprintProviderCapability;
use ShineUnited\Conductor\Capability\GeneratorProvider as GeneratorProviderCapability;
use ShineUnited\Conductor\Capability\ParameterProvider as ParameterProviderCapability;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capable;

/**
 * Composer Plugin
 */
class Plugin implements PluginInterface, Capable {

	/**
	 * {@inheritDoc}
	 */
	public function activate(Composer $composer, IOInterface $io) {
		// do nothing
	}

	/**
	 * {@inheritDoc}
	 */
	public function deactivate(Composer $composer, IOInterface $io) {
		// do nothing
	}

	/**
	 * {@inheritDoc}
	 */
	public function uninstall(Composer $composer, IOInterface $io) {
		// do nothing
	}

	/**
	 * {@inheritDoc}
	 */
	public function getCapabilities() {
		return [
			BlueprintProviderCapability::class => BlueprintProvider::class,
			GeneratorProviderCapability::class => GeneratorProvider::class,
			ParameterProviderCapability::class => ParameterProvider::class
		];
	}
}
