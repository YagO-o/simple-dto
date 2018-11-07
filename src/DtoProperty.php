<?php

namespace SimpleDto;

/**
 * Class ReflectionProperty
 * @package SimpleDto
 */
class DtoProperty
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $name;
    /**
     * @var bool
     */
    private $isNullable;
    /**
     * @var bool
     */
    private $isArray;

    /**
     * @var mixed
     */
    private $defaultValue;

    public function __construct(
        string $type,
        string $name,
        bool $isNullable,
        bool $isArray,
        $defaultValue
    )
    {
        $this->type = $type;
        $this->name = $name;
        $this->isNullable = $isNullable;
        $this->isArray = $isArray;
        $this->defaultValue = $defaultValue;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->isNullable;
    }

    /**
     * @return bool
     */
    public function isArray(): bool
    {
        return $this->isArray;
    }

    /**
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }
}
