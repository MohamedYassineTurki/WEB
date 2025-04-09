<?php
function load(string $class_name) {
    if (file_exists($class_name.".php")) {
        $file = $class_name.".php";
        include_once $file;
    } else {
        die("Class file not found: " . $class_name);
    }
    spl_autoload_register('load');
}