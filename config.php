<?php
// show all errors for now
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    require_once(__DIR__ . '/src/' . strtolower($class) . '.php');
});
