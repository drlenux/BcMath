<?php


namespace DrLenux\BcMath\lib;

use DrLenux\BcMath\BcMathInterface;

/**
 * Class BcMathExists
 * @package DrLenux\BcMath\lib
 */
class BcMathExists
{
    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $name(...$arguments);
    }
}