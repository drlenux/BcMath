<?php

namespace DrLenux\BcMath;

use DrLenux\BcMath\lib\BcMathExists;
use DrLenux\BcMath\lib\BcMathNotExists;

/**
 * Class BcMathFactory
 * @package Drlenux\BcMath
 */
final class BcMathFactory
{
    private function __construct()
    {
    }

    /**
     * @var BcMathInterface
     */
    private static $di;

    /**
     * @param bool $runBcMath
     * @return BcMathInterface
     */
    public static function instance(bool $runBcMath = true)
    {
        if (self::$di === null) {
            if ($runBcMath && function_exists('bcadd')) {
                self::$di = new BcMathExists();
            } else {
                self::$di = new BcMathNotExists();
            }
        }

        return self::$di;
    }
}