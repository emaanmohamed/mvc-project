<?php

use Sectheater\Http\Request;
use Sectheater\Http\Response;

require_once __DIR__. '/../vendor/autoload.php';
require_once __DIR__. '/../routes/web.php';

$route = new \SecTheater\Http\Route(new Request, new Response);

$route->resolve();