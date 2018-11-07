<?php

/**
 * Class TestDtoClass
 */
class TestDtoClass extends \SimpleDto\SimpleDto {

    public const DEFAULT_STRING_VALUE = 'string';
    public const DEFAULT_INT_VALUE = 5;

    /** @var string */
    private $string = self::DEFAULT_STRING_VALUE;
    /** @var int */
    private $integer = self::DEFAULT_INT_VALUE;

    /**
     * @return string
     */
    public function getString(): string
    {
        return $this->string;
    }

    /**
     * @return int
     */
    public function getInteger(): int
    {
        return $this->integer;
    }
}
