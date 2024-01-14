<?php

/**
 * Asset class
 * - to ease the process of handling assets
 */
class Asset {
    
    private static string $base;

    /**
     * Sets the base path in which assets are stored
     */
    public static function setBase(string $path) {
        self::$base = $path;
    }

    /**
     * Create a full and sanitized file path for an asset
     */
    public static function url(string $path): string {
        return filter_var(str_replace('//', '/', self::$base . '/' . $path), FILTER_SANITIZE_URL);
    }
}

