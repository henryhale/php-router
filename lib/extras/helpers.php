<?php

/**
 * Creates a closure that will be invoked when a certian route is requested
 */
function view(string $file, string $title = NULL) {
    return function(array $params = []) use ($file, $title) {
        require_once __DIR__ . '/../../views/' . $file;
        exit(0);
    };
}

/**
 * Creates a closure that will be invoked when an `api` route is requested 
 */
function process(string $file) {
    return function(array $params = []) use ($file) {
        require_once __DIR__ . '/../../api/' . $file;
        exit(0);
    };
}