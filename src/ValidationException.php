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
     * @param string $type
     * @param bool $isArray
     * @param bool $isNullable
     *
     * @return ValidationException
     */
    public static function createWithValidationError(string $propertyName, string $type, bool $isArray, bool $isNullable)
    {
        $type = self::TYPE_MAP[$type] ?? $type;
        $isArrayPrefix = $isArray ? 'array of ' : '';
        $isNullableSuffix = $isNullable ? ' or null' : '';
        $errorMessage = 'Property "' .$propertyName . '" must be type ' . $isArrayPrefix . $type . $isNullableSuffix;
        return (new self($errorMessage));
    }
}
