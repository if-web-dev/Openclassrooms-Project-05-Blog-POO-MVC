<?php

namespace App\Exceptions;

class RouteNotFoundException extends \Exception
{
   protected $message = "Cette page n'existe pas";
}
