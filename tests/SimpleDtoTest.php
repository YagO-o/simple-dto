<?php

use PHPUnit\Framework\TestCase;
use SimpleDto\SimpleDto;

/**
 * Class SimpleDtoTest
 */
class SimpleDtoTest extends TestCase
{
    public function testSuccessCanAssignDefaultValues()
    {
        $dto = new class([]) extends SimpleDto{
            /** @var int */
            protected $integer = 5;
            /** @var int[] */
            protected $integerArray = [1,2,3,4,5];
            /** @var int|null */
            protected $integerNull = null;
            /** @var int[]|null */
            protected $integerNullArray = null;

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
        self::assertSame([1,2,3,4,5], $dto->getIntegerArray());
        self::assertSame(null, $dto->getIntegerNull());
        self::assertSame(null, $dto->getIntegerNullArray());
    }

    public function testSuccessCanAssignInteger()
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
            protected $int;

            /** @var integer */
            protected $longInt;

            /** @var int[] */
            protected $intArray;

            /** @var int|null */
            protected $nullableInt;

            /** @var int[]|null */
            protected $nullableIntArray;

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

    public function testSuccessCanAssignFloat()
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
            protected $float;

            /** @var float[] */
            protected $floatArray;

            /** @var float|null */
            protected $nullableFloat;

            /** @var int[]|null */
            protected $nullableFloatArray;

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

    public function testSuccessCanAssignBool()
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
            protected $bool;

            /** @var boolean */
            protected $longBool;

            /** @var bool[] */
            protected $boolArray;

            /** @var bool|null */
            protected $nullableBool;

            /** @var bool[]|null */
            protected $nullableBoolArray;

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

    public function testSuccessCanAssignString()
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
            protected $string;

            /** @var string[] */
            protected $stringArray;

            /** @var string|null */
            protected $nullableString;

            /** @var int[]|null */
            protected $nullableStringArray;

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

    public function testSuccessCanAssignArray()
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
            protected $testArray;

            /** @var array[] */
            protected $testArrayOfArray;

            /** @var array|null */
            protected $nullableArray;

            /** @var array[]|null */
            protected $nullableArrayOfArray;

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

    public function testSuccessCanAssignTypeClass()
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
            protected $type;

            /** @var TestType[] */
            protected $typeArray;

            /** @var TestType|null */
            protected $nullableType;

            /** @var TestType[]|null */
            protected $nullableTypeArray;

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

    public function testFailInvalidIntPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['integer']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['int' => $invalidParam]) extends SimpleDto
                {
                    /** @var int */
                    protected $int;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "int" must be type integer', $exception->getMessage());
                continue;
            }
            self::fail('not integer array value '. var_export($invalidParam, true). ' was accepted');
        }

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['integer' => $invalidParam]) extends SimpleDto
                {
                    /** @var integer */
                    protected $integer;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "integer" must be type integer', $exception->getMessage());
                continue;
            }
            self::fail('not integer value '. var_export($invalidParam, true). ' was accepted');
        }

    }

    public function testFailInvalidIntArrayPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['array_integer']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['int' => $invalidParam]) extends SimpleDto {
                    /** @var int[] */
                    protected $int;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "int" must be type array of integer', $exception->getMessage());
                continue;
            }
            self::fail('not integer array value '. var_export($invalidParam, true). ' was accepted');
        }

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['integer' => $invalidParam]) extends SimpleDto {
                    /** @var integer[] */
                    protected $integer;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "integer" must be type array of integer', $exception->getMessage());
                continue;
            }
            self::fail('not integer array value '. var_export($invalidParam, true). ' was accepted');
        }
    }


    public function testFailInvalidBooleanPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['boolean']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['bool' => $invalidParam]) extends SimpleDto {
                    /** @var bool */
                    protected $bool;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "bool" must be type boolean', $exception->getMessage());
                continue;
            }
            self::fail('not boolean value '. var_export($invalidParam, true). ' was accepted');
        }

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['boolean' => $invalidParam]) extends SimpleDto {
                    /** @var boolean */
                    protected $boolean;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "boolean" must be type boolean', $exception->getMessage());
                continue;
            }
            self::fail('not boolean  value '. var_export($invalidParam, true). ' was accepted');
        }
    }

    public function testFailInvalidBooleanArrayPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['array_boolean']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['boolean' => $invalidParam]) extends SimpleDto {
                    /** @var boolean[] */
                    protected $boolean;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "boolean" must be type array of boolean', $exception->getMessage());
                continue;
            }
            self::fail('not boolean array value '. var_export($invalidParam, true). ' was accepted');
        }

        foreach ($invalidParams as $invalidParam) {
            try {
                new class() extends SimpleDto {
                    /** @var bool[] */
                    protected $boolean;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "boolean" must be type array of boolean', $exception->getMessage());
                continue;
            }
            self::fail('not boolean array value '. var_export($invalidParam, true). ' was accepted');
        }
    }

    public function testFailInvalidFloatPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['float']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['float' => $invalidParam]) extends SimpleDto {
                    /** @var float */
                    protected $float;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "float" must be type float', $exception->getMessage());
                continue;
            }
            self::fail('not float value '. var_export($invalidParam, true). ' was accepted');
        }
    }

    public function testFailInvalidFloatArrayPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['float_array']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['float_array' => $invalidParam]) extends SimpleDto {
                    /** @var float[] */
                    protected $float_array;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "float_array" must be type array of float', $exception->getMessage());
                continue;
            }
            self::fail('not float array value '. var_export($invalidParam, true). ' was accepted');
        }
    }

    public function testFailInvalidStringPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['string']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['string' => $invalidParam]) extends SimpleDto {
                    /** @var string */
                    protected $string;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "string" must be type string', $exception->getMessage());
                continue;
            }
            self::fail('not string value '. var_export($invalidParam, true). ' was accepted');
        }
    }

    public function testFailInvalidStringArrayPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['array_string']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['array_string' => $invalidParam]) extends SimpleDto {
                    /** @var string[] */
                    protected $array_string;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "array_string" must be type array of string', $exception->getMessage());
                continue;
            }
            self::fail('not string array value '. var_export($invalidParam, true). ' was accepted');
        }
    }

    public function testFailInvalidArrayPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['array']);
        unset($invalidParams['array_array']);
        unset($invalidParams['array_null']);
        unset($invalidParams['array_string']);
        unset($invalidParams['array_float']);
        unset($invalidParams['array_integer']);
        unset($invalidParams['array_boolean']);
        unset($invalidParams['array_type']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['array' => $invalidParam]) extends SimpleDto {
                    /** @var array */
                    protected $array;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "array" must be type array', $exception->getMessage());
                continue;
            }
            self::fail('not array value '. var_export($invalidParam, true). ' was accepted');
        }
    }

    public function testFailInvalidArrayArrayPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['array_array']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['array_array' => $invalidParam]) extends SimpleDto {
                    /** @var array[] */
                    protected $array_array;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "array_array" must be type array of array', $exception->getMessage());
                continue;
            }
            self::fail('not array of array value '. var_export($invalidParam, true). ' was accepted');
        }
    }

    public function testFailInvalidTypePropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['type']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['type' => $invalidParam]) extends SimpleDto {
                    /** @var TestType */
                    protected $type;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "type" must be type TestType', $exception->getMessage());
                continue;
            }
            self::fail('not type class value '. var_export($invalidParam, true). ' was accepted');
        }
    }

    public function testFailInvalidTypeArrayPropertyParams()
    {
        $invalidParams = $this->getParamsSet();
        unset($invalidParams['array_type']);

        foreach ($invalidParams as $invalidParam) {
            try {
                new class(['array_type' => $invalidParam]) extends SimpleDto {
                    /** @var TestType[] */
                    protected $array_type;
                };
            } catch (\SimpleDto\ValidationException $exception) {
                self::assertSame('Property "array_type" must be type array of TestType', $exception->getMessage());
                continue;
            }
            self::fail('not type class array value '. var_export($invalidParam, true). ' was accepted');
        }
    }

    public function testFailPropertyWithoutPhpDoc()
    {
        $this->expectException(\SimpleDto\AnnotationException::class);

        new class([]) extends SimpleDto {
            protected $t;
        };
    }

    public function testFailPropertyWithWrongAnnotation()
    {

        $this->expectException(\SimpleDto\AnnotationException::class);

        new class([]) extends SimpleDto {
            /** @var floatintdoublebool */
            protected $t;
        };
    }

    public function testFailPropertyTypeClassNotExist()
    {
        $this->expectException(\SimpleDto\AnnotationException::class);

        new class([]) extends SimpleDto {
            /** @var UnexistClassName[] */
            protected $t;
        };
    }

    private function getParamsSet(): array
    {
        return [
            'null' => null,
            'string' => 'string',
            'float' => 3.14,
            'integer' => 5,
            'boolean' => true,
            'type' => new TestType(),
            'array' => ['string', 3.14, 5, true, new TestType()],
            'array_array' => ['array' => ['string', 3.14, 5, true, new TestType()]],
            'array_null' => [null, null],
            'array_string' => ['this', 'is', 'array', 'of', 'strings'],
            'array_float' => [3.14, 2,71, 9.8],
            'array_integer' => [1,2,3,4,5],
            'array_boolean' => [true, false, true, false],
            'array_type' => [new TestType(), new TestType(), new TestType()],
        ];
    }
}


class TestType
{
}
