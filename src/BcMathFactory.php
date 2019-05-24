<?php

namespace Drlenux\BcMath;

/**
 * Class BcMathFactory
 * @package Drlenux\BcMath
 */
final class BcMathFactory implements BcMathInterface
{
    use Singleton;

    /**
     * @var bool
     */
    private $error;

    /**
     * @var bool
     */
    private $runBcMath = true;

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public function bcadd(string $left_operand, string $right_operand, int $scale = 0): string
    {
        if (function_exists('bcadd') && $this->runBcMath) {
            return bcadd($left_operand, $right_operand, $scale);
        } else {
            $this->error = true;
            return (string)round((float)$left_operand + (float)$right_operand, $scale);
        }
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public function bcsub(string $left_operand, string $right_operand, int $scale = 0): string
    {
        if (function_exists('bcsub') && $this->runBcMath) {
            return bcsub($left_operand, $right_operand, $scale);
        } else {
            $this->error = true;
            return (string)round((float)$left_operand - (float)$right_operand, $scale);
        }
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public function bcmul(string $left_operand, string $right_operand, int $scale = 0): string
    {
        if (function_exists('bcmul') && $this->runBcMath) {
            return bcmul($left_operand, $right_operand, $scale);
        } else {
            $this->error = true;
            return (string)round((float)$left_operand * (float)$right_operand, $scale);
        }
    }

    /**
     * @param string $dividend
     * @param string $divisor
     * @param int $scale
     * @return mixed
     */
    public function bcdiv(string $dividend, string $divisor, int $scale = 0): string
    {
        if (function_exists('bcdiv') && $this->runBcMath) {
            return bcdiv($dividend, $divisor, $scale);
        } else {
            $this->error = true;
            return (string)round((float)$dividend / (float)$divisor, $scale);
        }
    }

    /**
     * @param string $dividend
     * @param string $divisor
     * @param int $scale
     * @return string
     */
    public function bcmod(string $dividend, string $divisor, int $scale = 0): string
    {
        if (function_exists('bcmod') && $this->runBcMath) {
            return bcmod($dividend, $divisor, $scale);
        } else {
            $this->error = true;
            return (string)round((float)$dividend % (float)$divisor, $scale);
        }
    }

    /**
     * @param string $base
     * @param string $exponent
     * @param int $scale
     * @return string
     */
    public function bcpow(string $base, string $exponent, int $scale = 0): string
    {
        if (function_exists('bcpow') && $this->runBcMath) {
            return bcpow($base, $exponent, $scale);
        } else {
            $this->error = true;
            return (string)round(pow((float)$base, (float)$exponent), $scale);
        }
    }

    /**
     * @param string $operand
     * @param int|null $scale
     * @return string
     */
    public function bcsqrt(string $operand, int $scale = null): string
    {
        if (function_exists('bcsqrt') && $this->runBcMath) {
            return bcsqrt($operand, $scale);
        } else {
            $this->error = true;
            return (string)round(sqrt((float)$operand), $scale);
        }
    }

    /**
     * @param int $scale
     * @return int
     */
    public function bcscale(int $scale): int
    {
        if (function_exists('bcscale') && $this->runBcMath) {
            return bcscale($scale);
        } else {
            $this->error = true;
            return $scale;
        }
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return int
     */
    public function bccomp(string $left_operand, string $right_operand, int $scale = 0): int
    {
        if (function_exists('bccomp') && $this->runBcMath) {
            return bccomp($left_operand, $right_operand, $scale);
        } else {
            $this->error = true;
            $res = round((float)$left_operand, $scale) - round((float) $right_operand, $scale);
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
    public function bcpowmod(string $base, string $exponent, string $modulus, int $scale = 0): ?string
    {
        return $this->bcmod($this->bcpow($base, $exponent, $scale), $modulus, $scale);
    }

    /**
     * @param bool $runBcMath
     */
    public function runBcMath(bool $runBcMath = true): void
    {
        $this->runBcMath = $runBcMath;
    }
}