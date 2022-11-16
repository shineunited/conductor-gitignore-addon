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

namespace ShineUnited\Conductor\Addon\Gitignore\Provider;

use ShineUnited\Conductor\Capability\ParameterProvider as ParameterProviderCapability;
use ShineUnited\Conductor\Configuration\Configuration;
use ShineUnited\Conductor\Configuration\Parameter\BooleanParameter;

/**
 * Parameter Provider
 */
class ParameterProvider implements ParameterProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getParameters(): array {
		return [
			new BooleanParameter('gitignore.ignore-lockfile', false),
			new BooleanParameter('gitignore.ignore-pharfile', true),
			new BooleanParameter('gitignore.ignore-vendordir', true),
			new BooleanParameter('gitignore.ignore-packages', true)
		];
	}
}
