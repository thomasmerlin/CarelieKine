<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', "1");
require_once __DIR__.'/vendor/autoload.php';

use App\Core\Kernel\Kernel;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$router = new Kernel($request);
$router->run();
