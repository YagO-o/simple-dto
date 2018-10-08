<?php

namespace SimpleDto;

/**
 * Class AnnotationException
 * @package SimpleDto
 */
class AnnotationException extends \RuntimeException
{
    /**
     * @param string $propertyName
     *
     * @param string $typeName
     *
     * @return AnnotationException
     */
    public static function withAnnotationError(string $propertyName, string $typeName): self
    {
        $errorMessage = 'Property '.
            $propertyName.
            'has invalid type annotation '.
            $typeName.
            'Supported annotations: int, integer, bool, boolean, string, float, array, {{FullClassNameWithNameSpace}} and them [] suffix';
        return (new self($errorMessage));
    }

    /**
     * @param string $propertyName
     *
     * @return AnnotationException
     */
    public static function withEmptyPhpDocComment(string $propertyName)
    {
        $errorMessage = 'Property '. $propertyName. ' not has php-doc @var annotation';
        return (new self($errorMessage));
    }
}
