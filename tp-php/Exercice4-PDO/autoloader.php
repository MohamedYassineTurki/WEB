<?php
function load(string $class_name) {
    $file = __DIR__ . "/classes/" . $class_name . ".php";
    if (file_exists($file)) {
        include_once $file;
    } else {
        die("Class file not found: " . $class_name);
    }
}
spl_autoload_register('load');