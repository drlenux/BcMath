<?php

namespace DrLenux\BcMath;

interface BcMathInterface
{
    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public static function bcadd (string $left_operand, string $right_operand, int $scale = 0): string;

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public static function bcsub (string $left_operand, string $right_operand, int $scale = 0): string;

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public static function bcmul (string $left_operand, string $right_operand, int $scale = 0): string;


    /**
     * @param string $dividend
     * @param string $divisor
     * @param int $scale
     * @return mixed
     */
    public static function bcdiv (string $dividend, string $divisor, int $scale = 0): string;

    /**
     * @param string $dividend
     * @param string $divisor
     * @param int $scale
     * @return string
     */
    public static function bcmod (string $dividend, string $divisor, int $scale = 0): string;

    /**
     * @param string $base
     * @param string $exponent
     * @param int $scale
     * @return string
     */
    public static function bcpow (string $base, string $exponent, int $scale = 0): string;

    /**
     * @param string $operand
     * @param int|null $scale
     * @return string
     */
    public static function bcsqrt (string $operand, int $scale = null): string;

    /**
     * @param int $scale
     */
    public static function bcscale (int $scale): void;

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return int
     */
    public static function bccomp (string $left_operand, string $right_operand, int $scale = 0): int;

    /**
     * @param string $base
     * @param string $exponent
     * @param string $modulus
     * @param int $scale
     * @return string|null
     */
    public static function bcpowmod (string $base, string $exponent, string $modulus, int $scale = 0): ?string;
}