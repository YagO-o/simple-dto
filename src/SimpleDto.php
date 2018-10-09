<?php

namespace SimpleDto;

/**
 * Class SimpleDto
 * @package SimpleDto
 */
class SimpleDto
{
    private const NULLABLE_ATTRIBUTE = 'null';
    private const ARRAY_ATTRIBUTE = '[]';
    private const TYPE_DELIMITER = '|';

    private const VALIDATION_FUNCTION_MAP = [
        'int' => 'is_int',
        'integer' => 'is_int',
        'bool' => 'is_bool',
        'boolean' => 'is_bool',
        'float' => 'is_float',
        'string' => 'is_string',
        'array' => 'is_array',
    ];

    /**
     * SimpleDto constructor.
     *
     * @param array $params
     *
     * @throws AnnotationException
     * @throws ValidationException
     * @throws \ReflectionException
     */
    public function __construct(array $params = [])
    {
        $reflection = new \ReflectionClass(static::class);

        $defaultPropertyValues = $reflection->getDefaultProperties();

        $propertyList = $reflection->getProperties();

        foreach ($propertyList as $property) {
            $propertyName = $property->getName();

            if (preg_match('/@var\s+([^\s]+)/', $property->getDocComment(), $matches) === 0) {
                throw AnnotationException::withEmptyPhpDocComment($propertyName);
            }

            list(, $typeListString) = $matches;

            $typeList = explode(self::TYPE_DELIMITER, $typeListString);
            $isNullable = in_array(self::NULLABLE_ATTRIBUTE, $typeList);
            $isIsset = array_key_exists($property->getName(), $params);
            $defaultValue = $defaultPropertyValues[$property->getName()];
            $paramValue = $isIsset ? $params[$property->getName()] : $defaultValue;

            $typeWithoutNull = array_diff($typeList, [self::NULLABLE_ATTRIBUTE]);
            $propertyType = reset($typeWithoutNull);
            $isTypeArray = mb_substr($propertyType, -2) === self::ARRAY_ATTRIBUTE;
            if ($isTypeArray) {
                $propertyType = rtrim($propertyType, self::ARRAY_ATTRIBUTE);
            }

            $isValid = $this->validate($propertyType, $propertyName, $isNullable, $isTypeArray, $paramValue);

            if ($isValid) {
                $property->setAccessible(true);
                $property->setValue($this, $paramValue);
            } else {
                throw ValidationException::createWithValidationError($propertyName, $propertyType, $isTypeArray,
                    $isNullable);
            }
        }
    }

    /**
     * @param string $propertyType
     *
     * @param string $propertyName
     *
     * @param bool $isNullable
     *
     * @param bool $isArray
     *
     * @param mixed $paramValue
     *
     * @return bool
     *
     * @throws AnnotationException
     */
    private function validate(
        string $propertyType,
        string $propertyName,
        bool $isNullable,
        bool $isArray,
        $paramValue
    ): bool {
        $typeExist = class_exists($propertyType);
        $validationFunction = self::VALIDATION_FUNCTION_MAP[$propertyType] ?? null;

        if ($validationFunction === null && $typeExist === false) {
            throw AnnotationException::withAnnotationError($propertyName, $propertyType);
        }

        if ($paramValue === null && $isNullable) {
            return true;
        }

        if ($isArray && is_array($paramValue) === false) {
            return false;
        }

        $paramValueList = $isArray ? $paramValue : [$paramValue];

        foreach ($paramValueList as $listValue) {
            if ($typeExist) {
                if ($listValue instanceof $propertyType === false) {
                    return false;
                }
                continue;
            }

            if ($validationFunction($listValue) === false) {
                return false;
            }
        }

        return true;
    }
}
