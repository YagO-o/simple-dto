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
        if (DtoPropertyStorage::hasProperties(static::class) === false) {
            $reflection = new \ReflectionClass(static::class);
            $this->fulfillDtoPropertyStorage($reflection);
        }

        $propertyList = DtoPropertyStorage::getPropertyList(static::class);

        foreach ($propertyList as $property) {

            $isIsset = array_key_exists($property->getName(), $params);
            $defaultValue = $property->getDefaultValue();
            $propertyValue = $isIsset ? $params[$property->getName()] : $defaultValue;

            $isValid = $this->validate(
                $property->getType(),
                $property->getName(),
                $property->isNullable(),
                $property->isArray(),
                $propertyValue
            );

            if ($isValid) {
                $property = new \ReflectionProperty(static::class, $property->getName());
                $property->setAccessible(true);
                $property->setValue($this, $propertyValue);
            } else {
                throw ValidationException::createWithValidationError(
                    $property->getName(),
                    \gettype($propertyValue),
                    $property->getType(),
                    $property->isArray(),
                    $property->isNullable()
                );
            }
        }
    }

    private function fulfillDtoPropertyStorage(\ReflectionClass $reflection): void
    {
        $defaultPropertyValues = $reflection->getDefaultProperties();
        $propertyList = $reflection->getProperties();

        foreach ($propertyList as $property) {
            $propertyName = $property->getName();
            if (preg_match('/@var\s+([^\s]+)/', $property->getDocComment(), $matches) === 0) {
                throw AnnotationException::withEmptyPhpDocComment($propertyName);
            }

            $typeListString = $matches[1];
            $typeList = explode(self::TYPE_DELIMITER, $typeListString);
            $isNullable = \in_array(self::NULLABLE_ATTRIBUTE, $typeList, true);
            $defaultValue = $defaultPropertyValues[$property->getName()];

            $typeWithoutNull = array_diff($typeList, [self::NULLABLE_ATTRIBUTE]);
            $propertyType = reset($typeWithoutNull);
            $isArray = mb_substr($propertyType, -2) === self::ARRAY_ATTRIBUTE;
            if ($isArray) {
                $propertyType = rtrim($propertyType, self::ARRAY_ATTRIBUTE);
            }

            DtoPropertyStorage::add(static::class,
                new DtoProperty(
                    $propertyType,
                    $propertyName,
                    $isNullable,
                    $isArray,
                    $defaultValue
                )
            );
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
        $typeExist = class_exists($propertyType) || interface_exists($propertyType);
        $validationFunction = self::VALIDATION_FUNCTION_MAP[$propertyType] ?? null;

        if ($validationFunction === null && $typeExist === false) {
            throw AnnotationException::withAnnotationError($propertyName, $propertyType);
        }

        if ($paramValue === null && $isNullable) {
            return true;
        }

        if ($isArray && \is_array($paramValue) === false) {
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
