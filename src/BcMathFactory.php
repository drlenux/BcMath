<?php

namespace DrLenux\BcMath;

/**
 * Class BcMathFactory
 * @package Drlenux\BcMath
 */
final class BcMathFactory implements BcMathInterface
{
    /**
     * @return static
     * @deprecated
     */
    public static function instance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new static();
        }
        return $instance;
    }

    /**
     * BcMathFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * @var bool
     */
    private static $error;

    /**
     * @var bool
     */
    private static $runBcMath = true;


    private static $scale = null;

    /**
     * @param int|null $scale
     * @return int|null
     */
    private static function getScale(?int $scale): ?int
    {
        return ($scale === null) ? self::$scale : $scale;
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public static function bcadd(string $left_operand, string $right_operand, ?int $scale = null): string
    {
        if (function_exists('bcadd') && self::$runBcMath) {
            return bcadd($left_operand, $right_operand, self::getScale($scale));
        } else {
            self::$error = true;
            return (string)round((float)$left_operand + (float)$right_operand, self::getScale($scale));
        }
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public static function bcsub(string $left_operand, string $right_operand, int $scale = 0): string
    {
        if (function_exists('bcsub') && self::$runBcMath) {
            return bcsub($left_operand, $right_operand, self::getScale($scale));
        } else {
            self::$error = true;
            return (string)round((float)$left_operand - (float)$right_operand, self::getScale($scale));
        }
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public static function bcmul(string $left_operand, string $right_operand, int $scale = 0): string
    {
        if (function_exists('bcmul') && self::$runBcMath) {
            return bcmul($left_operand, $right_operand, self::getScale($scale));
        } else {
            self::$error = true;
            return (string)round((float)$left_operand * (float)$right_operand, self::getScale($scale));
        }
    }

    /**
     * @param string $dividend
     * @param string $divisor
     * @param int $scale
     * @return mixed
     */
    public static function bcdiv(string $dividend, string $divisor, int $scale = 0): string
    {
        if (function_exists('bcdiv') && self::$runBcMath) {
            return bcdiv($dividend, $divisor, self::getScale($scale));
        } else {
            self::$error = true;
            return (string)round((float)$dividend / (float)$divisor, self::getScale($scale));
        }
    }

    /**
     * @param string $dividend
     * @param string $divisor
     * @param int $scale
     * @return string
     */
    public static function bcmod(string $dividend, string $divisor, int $scale = 0): string
    {
        if (function_exists('bcmod') && self::$runBcMath) {
            return bcmod($dividend, $divisor, self::getScale($scale));
        } else {
            self::$error = true;
            return (string)round((float)$dividend % (float)$divisor, self::getScale($scale));
        }
    }

    /**
     * @param string $base
     * @param string $exponent
     * @param int $scale
     * @return string
     */
    public static function bcpow(string $base, string $exponent, int $scale = 0): string
    {
        if (function_exists('bcpow') && self::$runBcMath) {
            return bcpow($base, $exponent, self::getScale($scale));
        } else {
            self::$error = true;
            return (string)round(pow((float)$base, (float)$exponent), self::getScale($scale));
        }
    }

    /**
     * @param string $operand
     * @param int|null $scale
     * @return string
     */
    public static function bcsqrt(string $operand, int $scale = null): string
    {
        if (function_exists('bcsqrt') && self::$runBcMath) {
            return bcsqrt($operand, self::getScale($scale));
        } else {
            self::$error = true;
            return (string)round(sqrt((float)$operand), self::getScale($scale));
        }
    }

    /**
     * @param int $scale
     */
    public static function bcscale(int $scale): void
    {
        if (function_exists('bcscale') && self::$runBcMath) {
            bcscale(self::getScale($scale));
        } else {
            self::$error = true;
            self::$scale = $scale;
        }
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return int
     */
    public static function bccomp(string $left_operand, string $right_operand, int $scale = 0): int
    {
        if (function_exists('bccomp') && self::$runBcMath) {
            return bccomp($left_operand, $right_operand, self::getScale($scale));
        } else {
            self::$error = true;
            $res = round((float)$left_operand, self::getScale($scale)) - round((float) $right_operand, self::getScale($scale));
            if ($res == 0) {
                return 0;
            } elseif ($res > 0) {
                return 1;
            } else {
                return -1;
            }
        }
    }

    /**
     * @param string $base
     * @param string $exponent
     * @param string $modulus
     * @param int $scale
     * @return string|null
     */
    public static function bcpowmod(string $base, string $exponent, string $modulus, int $scale = 0): ?string
    {
        return self::bcmod(self::bcpow($base, $exponent, self::getScale($scale)), $modulus, self::getScale($scale));
    }

    /**
     * @param bool $runBcMath
     */
    public static function runBcMath(bool $runBcMath = true): void
    {
        self::$runBcMath = $runBcMath;
    }
}