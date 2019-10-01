<?php

namespace DrLenux\BcMath\lib;

use DrLenux\BcMath\BcMathInterface;

/**
 * Class BcMathNotExists
 * @package DrLenux\BcMath\lib
 */
class BcMathNotExists implements BcMathInterface
{
    /**
     * @var null|int
     */
    private $scale = null;

    /**
     * @param int|null $scale
     * @return int|null
     */
    private function getScale(?int $scale): ?int
    {
        return ($scale === null) ? $this->scale : $scale;
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public function bcadd(string $left_operand, string $right_operand, ?int $scale = null): string
    {
        return (string)round((float)$left_operand + (float)$right_operand, $this->getScale($scale));
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public function bcsub(string $left_operand, string $right_operand, ?int $scale = null): string
    {
        return (string)round((float)$left_operand - (float)$right_operand, $this->getScale($scale));
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return string
     */
    public function bcmul(string $left_operand, string $right_operand, ?int $scale = null): string
    {
        return (string)round((float)$left_operand * (float)$right_operand, $this->getScale($scale));
    }

    /**
     * @param string $dividend
     * @param string $divisor
     * @param int $scale
     * @return mixed
     */
    public function bcdiv(string $dividend, string $divisor, ?int $scale = null): string
    {
        return (string)round((float)$dividend / (float)$divisor, $this->getScale($scale));
    }

    /**
     * @param string $dividend
     * @param string $divisor
     * @param int $scale
     * @return string
     */
    public function bcmod(string $dividend, string $divisor, ?int $scale = null): string
    {
        return (string)round((float)$dividend % (float)$divisor, $this->getScale($scale));
    }

    /**
     * @param string $base
     * @param string $exponent
     * @param int $scale
     * @return string
     */
    public function bcpow(string $base, string $exponent, ?int $scale = null): string
    {
        return (string)round(pow((float)$base, (float)$exponent), $this->getScale($scale));
    }

    /**
     * @param string $operand
     * @param int|null $scale
     * @return string
     */
    public function bcsqrt(string $operand, ?int $scale = null): string
    {
        return (string)round(sqrt((float)$operand), $this->getScale($scale));
    }

    /**
     * @param int $scale
     */
    public function bcscale(int $scale): void
    {
        $this->scale = $scale;
    }

    /**
     * @param string $left_operand
     * @param string $right_operand
     * @param int $scale
     * @return int
     */
    public function bccomp(string $left_operand, string $right_operand, ?int $scale = null): int
    {
        $res = round((float)$left_operand, $this->getScale($scale)) - round((float) $right_operand, $this->getScale($scale));
        if ($res == 0) {
            return 0;
        } elseif ($res > 0) {
            return 1;
        } else {
            return -1;
        }
    }

    /**
     * @param string $base
     * @param string $exponent
     * @param string $modulus
     * @param int $scale
     * @return string|null
     */
    public function bcpowmod(string $base, string $exponent, string $modulus, ?int $scale = null): ?string
    {
        return $this->bcmod($this->bcpow($base, $exponent, $this->getScale($scale)), $modulus, $this->getScale($scale));
    }
}