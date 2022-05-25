<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', "1");
require_once __DIR__.'/vendor/autoload.php';

use App\Core\Kernel\Kernel;
use App\Core\VarDumper\VarDumper;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$request = Request::createFromGlobals();

$router = new Kernel($request);
return $router->run();