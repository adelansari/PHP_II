```markdown
# PHP Classes

Classes in PHP are a fundamental part of object-oriented programming (OOP). They are templates for creating objects, which are instances of a class.

## Class Definition

A class is defined using the `class` keyword, followed by the name of the class and a pair of curly braces `{}`. Here's an example:

```php
class MyClass {
    // Class properties and methods go here
}
```

## Constructor

The constructor is a special method that is automatically called when an object is created. It is defined using the `__construct()` method. Here's an example:

```php
class MyClass {
    public function __construct() {
        echo "An object of MyClass was created.";
    }
}
```

## Properties

Properties are variables that belong to a class. They can have different visibility levels, defined by the access modifiers `public`, `private`, and `protected`.

```php
class MyClass {
    public $publicProperty;
    private $privateProperty;
    protected $protectedProperty;
}
```

## Methods

Methods are functions that belong to a class. Like properties, they can also have different visibility levels.

```php
class MyClass {
    public function publicMethod() {
        // ...
    }

    private function privateMethod() {
        // ...
    }

    protected function protectedMethod() {
        // ...
    }
}
```

## Static Properties and Methods

Static properties and methods belong to the class itself, rather than to instances of the class. They are defined using the `static` keyword.

```php
class MyClass {
    public static $myStaticProperty;

    public static function myStaticMethod() {
        // ...
    }
}
```

To access a static property or method, you use the class name followed by the scope resolution operator `::`.

```php
echo MyClass::$myStaticProperty;
MyClass::myStaticMethod();
```
```