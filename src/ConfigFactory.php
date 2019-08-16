<?php 
declare(strict_types=1);

namespace App;

class ConfigFactory
{
    public static function create(array $yamlArray): Config
    {
        return new Config(
            $yamlArray['config']['title'],
            $yamlArray['config']['subtitle'],
        );
    }
}
