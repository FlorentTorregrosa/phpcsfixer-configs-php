<?php

namespace drupol\PhpCsFixerConfigsPhp\Config;

/**
 * Class Php.
 */
final class Php extends YamlConfig
{
    /**
     * Php constructor.
     */
    public function __construct()
    {
        parent::__construct('drupol/phpcsfixer-configs-php/php');

        $parent = (new YamlConfig())
            ->withRulesFromYaml(
                __DIR__ . '/../../config/php/phpcsfixer.rules.yml'
            );

        $this
            ->setRules(
                $parent->getRules()
            );

        $this
            ->setFinder(
                $this->getFinder()
                    ->files()
                    ->name('*.php')
                    ->ignoreDotFiles(true)
                    ->ignoreVCS(true)
                    ->exclude(['build', 'libraries', 'node_modules', 'vendor'])
                    ->in($_SERVER['PWD'])
            );
    }
}
