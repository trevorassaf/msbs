<?php

/**
 * Document Root Relative Path. Reltaive path from html document root to endpoints.
 */
defined('DRRP') 
  ? null 
  : define('DRRP', '../endpoints/');

abstract class EndpointInfo {
  const PATH = DRRP . 'endpoint.php';
}
