## Simple Dto

This is class for building simple DTO objects via PHPDoc annotations. 
Includes scalar, array and type validation.

### Example:
```php

class DtoClass extends SimpleDto
{
    /** @var integer */
    private $id;

    /** @var string|null */
    private $name;

    /** @var int[] */
    private $idList;

    /** @var TypeClass */
    private $typeClass;

    /** @var float */
    private $rating = 3.5;
    
    /** @var bool */
    private $isAdmin = false;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int[]
     */
    public function getIdList(): array
    {
        return $this->idList;
    }

    /**
     * @return TypeClass
     */
    public function getTypeClass(): TypeClass
    {
        return $this->typeClass;
    }

    /**
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }
    
    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }
}

class TypeClass
{
}


$dto = new DtoClass([
    'id' => 5,
    'name' => 'Ivan',
    'idList' => [1,2,3,4,5],
    'typeClass' => new TypeClass(),
    'isAdmin' => true,
]);

$id = $dto->getId(); // 5
$name = $dto->getName(); // 'Ivan'
$idList = $dto->getIdList(); // [1,2,3,4,5]
$rating = $dto->getRating(); // 3.5
$typeClass = $dto->getTypeClass(); // TypeClass object
$isAdmin = $dto->isAdmin(); // true
```

### Installation:

```
composer require yago-o/simple-dto
```

### Caveats:
 - All types may be arrayable.
 - All class properties must be described via PHPDoc annotation.
 - To use custom classes on properties you must write full class name include namespace.
