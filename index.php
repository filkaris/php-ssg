<?php 
declare(strict_types=1);

use App\ConfigFactory;
use App\Controller;
use App\PostFactory;
use App\Router;
use Pagerange\Markdown\MetaParsedown;
use Symfony\Component\Yaml\Yaml;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/vendor/autoload.php';

try {
    // Building Dependencies
    $parser = new MetaParsedown();
    $factory = new PostFactory($parser);

    $configString = file_get_contents('config.yaml');
    $config = ConfigFactory::create(Yaml::parse($configString));

    $twig = new Environment(new FilesystemLoader('templates/'));

    $controller = new Controller($factory, $twig, $config);

    $router = new Router($controller);
    $response = $router->route($_SERVER['PATH_INFO']);

    echo $response;
}
catch (Throwable $e) {
    // Here for debugging purposes
    echo 'Exception: '. $e->getMessage();
}
