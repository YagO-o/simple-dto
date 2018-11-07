<?php

use PHPUnit\Framework\TestCase;
use SimpleDto\SimpleDto;

/**
 * Class SimpleDtoTest
 */
class SimpleDtoTest extends TestCase
{
    public function testSuccessCanAssignDefaultValues(): void
    {
        $dto = new class([]) extends SimpleDto
        {
            /** @var int */
            private $integer = 5;
            /** @var int[] */
            private $integerArray = [1, 2, 3, 4, 5];
            /** @var int|null */
            private $integerNull;
            /** @var int[]|null */
            private $integerNullArray;

            /**
             * @return int
             */
            public function getInteger(): int
            {
                return $this->integer;
            }

            /**
             * @return int[]
             */
            public function getIntegerArray(): array
            {
                return $this->integerArray;
            }

            /**
             * @return int|null
             */
            public function getIntegerNull()
            {
                return $this->integerNull;
            }

            /**
             * @return int[]|null
             */
            public function getIntegerNullArray()
            {
                return $this->integerNullArray;
            }
        };

        self::assertSame(5, $dto->getInteger());
        self::assertSame([1, 2, 3, 4, 5], $dto->getIntegerArray());
        self::assertNull($dto->getIntegerNull());
        self::assertNull($dto->getIntegerNullArray());
    }

    public function testSuccessCanAssignInteger(): void
    {
        $intValue = 1;
        $longIntValue = 5;
        $arrayIntValue = [1, 2, 3, 4];
        $nullableInt = null;
        $nullableIntArray = null;

        /**
         * Class SimpleDto
         * @package SimpleDto
         */
        $dto = new class(
            [
                'int' => $intValue,
                'longInt' => $longIntValue,
                'intArray' => $arrayIntValue,
                'nullableInt' => $nullableInt,
                'nullableIntArray' => $nullableIntArray,
            ]
        ) extends SimpleDto
        {
            /** @var int */
            private $int;

            /** @var integer */
            private $longInt;

            /** @var int[] */
            private $intArray;

            /** @var int|null */
            private $nullableInt;

            /** @var int[]|null */
            private $nullableIntArray;

            public function getInt(): int
            {
                return $this->int;
            }

            public function getIntArray(): array
            {
                return $this->intArray;
            }

            public function getLongInt(): int
            {
                return $this->longInt;
            }

            public function getNullableInt()
            {
                return $this->nullableInt;
            }

            public function getNullableIntArray()
            {
                return $this->nullableIntArray;
            }
        };

        self::assertSame($intValue, $dto->getInt());
        self::assertSame($arrayIntValue, $dto->getIntArray());
        self::assertSame($longIntValue, $dto->getLongInt());
        self::assertSame($nullableInt, $dto->getNullableInt());
        self::assertSame($nullableIntArray, $dto->getNullableIntArray());
    }

    public function testSuccessCanAssignFloat(): void
    {
        $floatValue = 1.1;

        $arrayFloatValue = [1.1, 2.2, 3.3, 4.4];
        $nullableFloatValue = null;
        $nullableFloatArrayValue = null;

        /**
         * Class SimpleDto
         * @package SimpleDto
         */
        $dto = new class(
            [
                'float' => $floatValue,
                'floatArray' => $arrayFloatValue,
                'nullableFloat' => $nullableFloatValue,
                'nullableFloatArray' => $nullableFloatArrayValue,
            ]
        ) extends SimpleDto
        {

            /** @var float */
            private $float;

            /** @var float[] */
            private $floatArray;

            /** @var float|null */
            private $nullableFloat;

            /** @var int[]|null */
            private $nullableFloatArray;

            public function getFloat(): float
            {
                return $this->float;
            }

            public function getFloatArray(): array
            {
                return $this->floatArray;
            }

            public function getNullableFloat()
            {
                return $this->nullableFloat;
            }

            public function getNullableFloatArray()
            {
                return $this->nullableFloatArray;
            }
        };

        self::assertSame($floatValue, $dto->getFloat());
        self::assertSame($arrayFloatValue, $dto->getFloatArray());
        self::assertSame($nullableFloatValue, $dto->getNullableFloat());
        self::assertSame($nullableFloatArrayValue, $dto->getNullableFloatArray());
    }

    public function testSuccessCanAssignBool(): void
    {
        $boolValue = true;
        $longBoolValue = false;
        $arrayBoolValue = [true, false, true, false];
        $nullableBool = null;
        $nullableBoolArray = null;

        /**
         * Class SimpleDto
         * @package SimpleDto
         */
        $dto = new class(
            [
                'bool' => $boolValue,
                'longBool' => $longBoolValue,
                'boolArray' => $arrayBoolValue,
                'nullableBool' => $nullableBool,
                'nullableBoolArray' => $nullableBoolArray,
            ]
        ) extends SimpleDto
        {
            /** @var bool */
            private $bool;

            /** @var boolean */
            private $longBool;

            /** @var bool[] */
            private $boolArray;

            /** @var bool|null */
            private $nullableBool;

            /** @var bool[]|null */
            private $nullableBoolArray;

            public function getbool(): bool
            {
                return $this->bool;
            }

            public function getboolArray(): array
            {
                return $this->boolArray;
            }

            public function getLongBool(): bool
            {
                return $this->longBool;
            }

            public function getNullableBool()
            {
                return $this->nullableBool;
            }

            public function getNullableBoolArray()
            {
                return $this->nullableBoolArray;
            }
        };

        self::assertSame($boolValue, $dto->getbool());
        self::assertSame($arrayBoolValue, $dto->getboolArray());
        self::assertSame($longBoolValue, $dto->getLongBool());
        self::assertSame($nullableBool, $dto->getNullableBool());
        self::assertSame($nullableBoolArray, $dto->getNullableBoolArray());

    }

    public function testSuccessCanAssignString(): void
    {
        $stringValue = 'string';
        $arrayStringValue = ['its', 'a', 'string', 'array'];
        $nullableStringValue = null;
        $nullableStringArrayValue = null;

        /**
         * Class SimpleDto
         * @package SimpleDto
         */
        $dto = new class(
            [
                'string' => $stringValue,
                'stringArray' => $arrayStringValue,
                'nullableString' => $nullableStringValue,
                'nullableStringArray' => $nullableStringArrayValue,
            ]
        ) extends SimpleDto
        {

            /** @var string */
            private $string;

            /** @var string[] */
            private $stringArray;

            /** @var string|null */
            private $nullableString;

            /** @var int[]|null */
            private $nullableStringArray;

            public function getString(): string
            {
                return $this->string;
            }

            public function getStringArray(): array
            {
                return $this->stringArray;
            }

            public function getNullableString()
            {
                return $this->nullableString;
            }

            public function getNullableStringArray()
            {
                return $this->nullableStringArray;
            }
        };

        self::assertSame($stringValue, $dto->getString());
        self::assertSame($arrayStringValue, $dto->getStringArray());
        self::assertSame($nullableStringValue, $dto->getNullableString());
        self::assertSame($nullableStringArrayValue, $dto->getNullableStringArray());
    }

    public function testSuccessCanAssignArray(): void
    {
        $arrayValue = [1, 'two', false, 3.14];
        $arrayOfArrayValue = [
            [
                1,
                'two',
                false,
                3.14
            ],
            [
                1,
                'two',
                false,
                3.14
            ],
            [
                1,
                'two',
                false,
                3.14
            ],
            [
                1,
                'two',
                false,
                3.14
            ]
        ];
        $nullableArrayValue = null;
        $nullableArrayOfArrayValue = null;

        /**
         * Class SimpleDto
         * @package SimpleDto
         */
        $dto = new class(
            [
                'testArray' => $arrayValue,
                'testArrayOfArray' => $arrayOfArrayValue,
                'nullableArray' => $nullableArrayValue,
                'nullableArrayOfArray' => $nullableArrayOfArrayValue,
            ]
        ) extends SimpleDto
        {

            /** @var array */
            private $testArray;

            /** @var array[] */
            private $testArrayOfArray;

            /** @var array|null */
            private $nullableArray;

            /** @var array[]|null */
            private $nullableArrayOfArray;

            public function getTestArray(): array
            {
                return $this->testArray;
            }

            public function getTestArrayOfArray(): array
            {
                return $this->testArrayOfArray;
            }

            public function getNullableArray(): ?array
            {
                return $this->nullableArray;
            }

            public function getNullableArrayOfArray(): ?array
            {
                return $this->nullableArrayOfArray;
            }
        };

        self::assertSame($arrayValue, $dto->getTestArray());
        self::assertSame($arrayOfArrayValue, $dto->getTestArrayOfArray());
        self::assertSame($nullableArrayValue, $dto->getNullableArray());
        self::assertSame($nullableArrayOfArrayValue, $dto->getNullableArrayOfArray());
    }

    public function testSuccessCanAssignTypeClass(): void
    {
        $typeValue = new TestType();
        $typeArrayValue = [
            new TestType(),
            new TestType(),
        ];
        $nullableTypeValue = null;
        $nullableTypeArrayValue = null;

        $dto = new class(
            [
                'type' => $typeValue,
                'typeArray' => $typeArrayValue,
                'nullableType' => $nullableTypeValue,
                'nullableTypeArray' => $nullableTypeArrayValue
            ]) extends SimpleDto
        {
            /** @var TestType */
            private $type;

            /** @var TestType[] */
            private $typeArray;

            /** @var TestType|null */
            private $nullableType;

            /** @var TestType[]|null */
            private $nullableTypeArray;

            /**
             * @return TestType
             */
            public function getType(): TestType
            {
                return $this->type;
            }

            /**
             * @return TestType[]
             */
            public function getTypeArray(): array
            {
                return $this->typeArray;
            }

            /**
             * @return null|TestType
             */
            public function getNullableType()
            {
                return $this->nullableType;
            }

            /**
             * @return null|TestType[]
             */
            public function getNullableTypeArray()
            {
                return $this->nullableTypeArray;
            }

        };

        self::assertSame($typeValue, $dto->getType());
        self::assertSame($typeArrayValue, $dto->getTypeArray());
        self::assertSame($nullableTypeValue, $dto->getNullableType());
        self::assertSame($nullableTypeArrayValue, $dto->getNullableTypeArray());
    }

    public function testSuccessGetPropertyFromCache(): void
    {
        require 'TestDtoClass.php';
        $dto = new TestDtoClass([]);
        $overrideIntDto = new TestDtoClass(['integer' => 10]);
        $overrideStringDto = new TestDtoClass(['string' => 'str']);

        self::assertSame(TestDtoClass::DEFAULT_STRING_VALUE, $dto->getString());
        self::assertSame(TestDtoClass::DEFAULT_INT_VALUE, $dto->getInteger());
        self::assertSame($overrideIntDto->getInteger(), 10);
        self::assertSame($overrideStringDto->getString(), 'str');
        self::assertTrue(\SimpleDto\DtoPropertyStorage::hasProperties(TestDtoClass::class));
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidIntPropertyParams($typeParam): void
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'integer') {
            $this->addToAssertionCount(1);
            return;
        }
        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['integer' => $paramValue]) extends SimpleDto
        {
            /** @var int */
            private $integer;
        };
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidIntArrayPropertyParams($typeParam): void
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'array_integer') {
            $this->addToAssertionCount(1);
            return;
        }
        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['array_integer' => $paramValue]) extends SimpleDto
        {
            /** @var int[] */
            private $array_integer;
        };
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidBooleanPropertyParams($typeParam): void
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'boolean') {
            $this->addToAssertionCount(1);
            return;
        }
        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['boolean' => $paramValue]) extends SimpleDto
        {
            /** @var bool */
            private $boolean;
        };
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidBooleanArrayPropertyParams($typeParam): void
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'array_boolean') {
            $this->addToAssertionCount(1);
            return;
        }
        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['array_boolean' => $paramValue]) extends SimpleDto
        {
            /** @var bool[] */
            private $array_boolean;
        };
    }


    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidFloatPropertyParams($typeParam): void
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'float') {
            $this->addToAssertionCount(1);
            return;
        }
        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['float' => $paramValue]) extends SimpleDto
        {
            /** @var float */
            private $float;
        };
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidFloatArrayPropertyParams($typeParam): void
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'float_array') {
            $this->addToAssertionCount(1);
            return;
        }
        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['float_array' => $paramValue]) extends SimpleDto
        {
            /** @var float[] */
            private $float_array;
        };
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidStringPropertyParams($typeParam): void
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'string') {
            $this->addToAssertionCount(1);
            return;
        }
        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['string' => $paramValue]) extends SimpleDto
        {
            /** @var string */
            private $string;
        };
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidStringArrayPropertyParams($typeParam): void
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'array_string') {
            $this->addToAssertionCount(1);
            return;
        }
        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['array_string' => $paramValue]) extends SimpleDto
        {
            /** @var string[] */
            private $array_string;
        };
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidArrayPropertyParams($typeParam): void
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        $acceptedParams = [
            'array',
            'array_array',
            'array_null',
            'array_string',
            'array_float',
            'array_integer',
            'array_boolean',
            'array_type'
        ];
        if (\in_array($paramType, $acceptedParams, true)) {
            $this->addToAssertionCount(1);
            return;
        }

        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['array' => $paramValue]) extends SimpleDto
        {
            /** @var array */
            private $array;
        };
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidArrayArrayPropertyParams($typeParam)
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'array_array') {
            $this->addToAssertionCount(1);
            return;
        }
        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['array_array' => $paramValue]) extends SimpleDto
        {
            /** @var array[] */
            private $array_array;
        };
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidTypePropertyParams($typeParam)
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'type') {
            $this->addToAssertionCount(1);
            return;
        }
        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['type' => $paramValue]) extends SimpleDto
        {
            /** @var TestType */
            private $type;
        };
    }

    /**
     * @dataProvider possibleTypeParamsDataProvider
     * @param $typeParam
     */
    public function testFailInvalidTypeArrayPropertyParams($typeParam): void
    {
        $paramType = key($typeParam);
        $paramValue = reset($typeParam);
        if ($paramType === 'array_type') {
            $this->addToAssertionCount(1);
            return;
        }

        $this->expectException(\SimpleDto\ValidationException::class);
        new class(['array_type' => $paramValue]) extends SimpleDto
        {
            /** @var TestType[] */
            private $array_type;
        };
    }

    public function testFailPropertyWithoutPhpDoc(): void
    {
        $this->expectException(\SimpleDto\AnnotationException::class);

        new class([]) extends SimpleDto
        {
            private $t;
        };
    }

    public function testFailPropertyWithWrongAnnotation(): void
    {

        $this->expectException(\SimpleDto\AnnotationException::class);

        new class([]) extends SimpleDto
        {
            /** @var floatintdoublebool */
            private $t;
        };
    }

    public function testFailPropertyTypeClassNotExist(): void
    {
        $this->expectException(\SimpleDto\AnnotationException::class);

        new class([]) extends SimpleDto
        {
            /** @var UnexistClassName[] */
            private $t;
        };
    }

    /**
     * @return array
     */
    public function possibleTypeParamsDataProvider(): array
    {
        return [
            [
                ['null' => null],
            ],
            [
                ['string' => 'string'],
            ],
            [
                ['float' => 3.14],
            ],
            [
                ['integer' => 5],
            ],
            [
                ['boolean' => true],
            ],
            [
                ['type' => new TestType()],
            ],
            [
                ['array' => ['string', 3.14, 5, true, new TestType()]],
            ],
            [
                ['array_array' => ['array' => ['string', 3.14, 5, true, new TestType()]]],
            ],
            [
                ['array_null' => [null, null]],
            ],
            [
                ['array_string' => ['this', 'is', 'array', 'of', 'strings']],
            ],
            [
                ['array_float' => [3.14, 2, 71, 9.8]],
            ],
            [
                ['array_integer' => [1, 2, 3, 4, 5]],
            ],
            [
                ['array_boolean' => [true, false, true, false]],
            ],
            [
                ['array_type' => [new TestType(), new TestType(), new TestType()]],
            ]
        ];
    }
}


class TestType
{
}
