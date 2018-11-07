<?php

namespace SimpleDto;

/**
 * Class ValidationException
 * @package SimpleDto
 */
class ValidationException extends \TypeError
{
    private const TYPE_MAP = [
        'bool' => 'boolean',
        'int' => 'integer',
    ];

    /**
     * @param string $propertyName
     * @param string $propertyType
     * @param string $expectedType
     * @param bool $isArray
     * @param bool $isNullable
     *
     * @return ValidationException
     */
    public static function createWithValidationError(
        string $propertyName,
        string $propertyType,
        string $expectedType,
        bool $isArray,
        bool $isNullable
    ) {
        $expectedType = self::TYPE_MAP[$expectedType] ?? $expectedType;
        $isArrayPrefix = $isArray ? 'array of ' : '';
        $isNullableSuffix = $isNullable ? ' or null' : '';
        $errorMessage = 'Property "' . $propertyName . '" must be type ' . $isArrayPrefix . $expectedType . $isNullableSuffix;
        $errorMessage .= '. Type ' . $propertyType . ' given instead';
        return (new self($errorMessage));
    }
}
