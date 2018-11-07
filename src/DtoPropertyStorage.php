<?php

namespace SimpleDto;

/**
 * Class ReflectionStorage
 *
 * @package SimpleDto
 */
class DtoPropertyStorage
{
    private static $propertyMap = [];

    /**
     * @param string $className
     *
     * @param DtoProperty $reflectionProperty
     */
    public static function add(string $className, DtoProperty $reflectionProperty): void
    {
        self::$propertyMap[$className][$reflectionProperty->getName()] = $reflectionProperty;
    }

    /**
     * @param string $className
     *
     * @return bool
     */
    public static function hasProperties(string $className): bool
    {
        return array_key_exists($className, self::$propertyMap);
    }


    /**
     * @param string $className
     *
     * @return DtoProperty[]
     */
    public static function getPropertyList(string $className): array
    {
        return self::$propertyMap[$className] ?? [];
    }
}
