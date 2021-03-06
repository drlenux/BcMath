<?php

namespace DrLenux\BcMath;

/**
 * Interface BcMathInterface
 * @package DrLenux\BcMath
 */
interface BcMathInterface
{
    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public function bcadd (string $left_operand, string $right_operand, ?int $scale = null): string;

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public function bcsub (string $left_operand, string $right_operand, ?int $scale = null): string;

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public function bcmul (string $left_operand, string $right_operand, ?int $scale = null): string;


    /**
     * @param string $dividend
     * @param string $divisor
     * @param int $scale
     * @return mixed
     */
    public function bcdiv (string $dividend, string $divisor, ?int $scale = null): string;

    /**
     * @param string $dividend
     * @param string $divisor
     * @param int $scale
     * @return string
     */
    public function bcmod (string $dividend, string $divisor, ?int $scale = null): string;

    /**
     * @param string $base
     * @param string $exponent
     * @param int $scale
     * @return string
     */
    public function bcpow (string $base, string $exponent, ?int $scale = null): string;

    /**
     * @param string $operand
     * @param int|null $scale
     * @return string
     */
    public function bcsqrt (string $operand, ?int $scale = null): string;

    /**
     * @param int $scale
     */
    public function bcscale (int $scale): void;

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return int
     */
    public function bccomp (string $left_operand, string $right_operand, ?int $scale = null): int;

    /**
     * @param string $base
     * @param string $exponent
     * @param string $modulus
     * @param int $scale
     * @return string|null
     */
    public function bcpowmod (string $base, string $exponent, string $modulus, ?int $scale = null): ?string;
}