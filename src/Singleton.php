<?php

namespace DrLenux\BcMath;

/**
 * Trait Singleton
 * @package Drlenux\BcMath
 */
trait Singleton
{
    public static function instance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new static();
        }
        return $instance;
    }

    private function __construct()
    {
    }
}