# shineunited/conductor-gitignore-addon

[![License](https://img.shields.io/packagist/l/shineunited/conductor-gitignore-addon)](https://github.com/shineunited/conductor-gitignore-addon/blob/main/LICENSE)
[![Latest Version](https://img.shields.io/packagist/v/shineunited/conductor-gitignore-addon?label=latest)](https://packagist.org/packages/shineunited/conductor-gitignore-addon/)
[![PHP Version](https://img.shields.io/packagist/dependency-v/shineunited/conductor-gitignore-addon/php?label=php)](https://www.php.net/releases/index.php)
[![Main Status](https://img.shields.io/github/workflow/status/shineunited/conductor-gitignore-addon/Build/main?label=main)](https://github.com/shineunited/conductor-gitignore-addon/actions/workflows/build.yml?query=branch%3Amain)
[![Release Status](https://img.shields.io/github/workflow/status/shineunited/conductor-gitignore-addon/Build/release?label=release)](https://github.com/shineunited/conductor-gitignore-addon/actions/workflows/build.yml?query=branch%3Arelease)
[![Develop Status](https://img.shields.io/github/workflow/status/shineunited/conductor-gitignore-addon/Build/develop?label=develop)](https://github.com/shineunited/conductor-gitignore-addon/actions/workflows/build.yml?query=branch%3Adevelop)

## Description
In conjunction with Conductor, this addon will automatically modify the project's .gitignore file to exclude paths installed with the Conductor or specified explicitly by other packages.


## Installation
To add conductor-gitignore-addon, the recommended method via composer.
```sh
$ composer require shineunited/conductor-gitignore-addon
```


## Configuration
The gitignore addon uses the Conductor configuration framework to parse parameters in the 'extra' section of the project's composer.json file.

### Parameters

###### gitignore.ignore-lockfile
(boolean) If true, add the composer lockfile (composer.lock) to the gitignore file. Defaults to false.

###### gitignore.ignore-pharfile
(boolean) If true, add the composer pharfile (composer.phar) to the gitignore file. Defaults to true.

###### gitignore.ignore-vendordir
(boolean) If true, add the entire vendor directory to the gitignore file. Defaults to true.

###### gitignore.ignore-packages
(boolen) If true, automatically add any packages installed with conductor installers outside of the vendor directory to the gitignore file. Defaults to true.


### Example

```json
{
	"name": "example/project",
	"type": "project",
	"extra": {
		"gitignore": {
			"ignore-lockfile": true,
			"ignore-pharfile": false,
			"ignore-vendordir": true,
			"ignore-packages": true
		}
	}
}
```


## Usage

### GitignoreProvider Capability
In addition to the automatically added gitignore rules based on the project's config, a composer plugin can explicitly add various rules via the GitignoreProvider capability.

#### Example Plugin
The plugin must implement Capable and provide the GitignoreProvider capability.
```php
<?php

namespace Example\Project;

use Composer\Composer;
use Composer\IO\IOInterface;
use ShineUnited\Conductor\Addon\Gitignore\Capability\GitignoreProvider;

class ComposerPlugin implements PluginInterface, Capable {

	public function activate(Composer $composer, IOInterface $io): void {
		// ...
	}

	public function deactivate(Composer $composer, IOInterface $io): void {
		// ...
	}

	public function uninstall(Composer $composer, IOInterface $io): void {
		// ...
	}

	public function getCapabilities(): array {
		return [
			GitignoreProvider::class => ExampleGitignoreProvider::class
		];
	}
}
```

#### Example Provider
The provider must implement the capability, and return a list of gitignore RuleInterface objects.
```php
<?php

namespace Example\Project;

use ShineUnited\Conductor\Addon\Gitignore\Capability\GitignoreProvider;
use ShineUnited\Conductor\Addon\Gitignore\Pattern\Rule;

class ExampleGitignoreProvider implements GitignoreProvider {

	public function getGitignores(): array {
		return [
			new Rule('path/to/ignore'),
			new Rule('another/path/to/ignore')
		];
	}
}
```
