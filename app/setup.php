<?php
//----- autoload any classes we are using ------
require_once __DIR__ . '/../vendor/autoload.php';

//----- autoload any classes we are using ------
require_once __DIR__ . '/config_db.php';

//----- Twig setup --------------
$app = new Silex\Application();
$templatesPath = __DIR__ . '/../templates';
$loader = new Twig_Loader_Filesystem($templatesPath);
$twig = new Twig_Environment($loader);

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => $templatesPath
));


