```markdown
# PHP Classes

Classes in PHP are a fundamental part of object-oriented programming (OOP). They are templates for creating objects, which are instances of a class.

## Class Definition

A class is defined using the `class` keyword, followed by the name of the class and a pair of curly braces `{}`. The name of the class should be a valid label, which means it should start with a letter or underscore, followed by any number of letters, numbers, or underscores.

```php
class MyClass {
    // Class properties and methods go here
}
```

## Constructor

The constructor is a special method that is automatically called when an object is created. It is defined using the `__construct()` method. The constructor can accept parameters, which can be used to set the initial state of the object.

```php
class MyClass {
    public function __construct() {
        echo "An object of MyClass was created.";
    }
}
```

## Properties

Properties are variables that belong to a class. They can have different visibility levels, defined by the access modifiers `public`, `private`, and `protected`.
- `public` properties can be accessed from anywhere, including from outside the class and from child classes.
- `private` properties can only be accessed from within the class itself.
- `protected` properties can be accessed from within the class and from child classes.

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

Static properties and methods belong to the class itself, rather than to instances of the class. They are defined using the `static` keyword. Static properties and methods can be accessed even without creating an instance of the class.

```php
class MyClass {
    public static $myStaticProperty = "Hello, World!";

    public static function myStaticMethod() {
        echo "This is a static method.";
    }
}

```

To access a static property or method, you use the class name followed by the scope resolution operator `::`. This operator is also known as the "double colon".

```php
// Accessing a static property
echo MyClass::$myStaticProperty; // Outputs: Hello, World!

// Accessing a static method
MyClass::myStaticMethod(); // Outputs: This is a static method.
```
```