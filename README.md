# Spec

[![Build Status](https://travis-ci.org/danfekete/Spec.svg?branch=master)](https://travis-ci.org/danfekete/Spec)

Spec is a PHP implementation of the Specification pattern which can be used for building simple or complex business rules.

> In computer programming, the **specification pattern** is a particular [software design pattern](https://en.wikipedia.org/wiki/Software_design_pattern), whereby [business rules](https://en.wikipedia.org/wiki/Business_rules) can be recombined by chaining the business rules together using boolean logic. The pattern is frequently used in the context of [domain-driven design](https://en.wikipedia.org/wiki/Domain-driven_design).
>
> [https://en.wikipedia.org/wiki/Specification_pattern](https://en.wikipedia.org/wiki/Specification_pattern)

The library uses the incredible [expression-language](https://packagist.org/packages/symfony/expression-language) component from Symfony to provide the DSL for expressions.

## Installation

`$ composer require danfekete/spec `

## Usage

#### 1. Simple expression

```php
$spec = new ExpressionSpec("val == 3", ['val']);
$spec->isSatisfiedBy(['val' => 3]); // return true
$spec->isSatisfiedBy(['val' => 2]); // return false
```

#### 2. Boolean chaining

```php
$obj = new stdClass();
$obj->value = 3;

SpecificationBuilder::build(new AndSpec(

  new ExpressionSpec('o.value == 3', ['o']),
  new ExpressionSpec('o.value > 2', ['o']),

  new OrSpec(
    new ExpressionSpec('o.value > 0', ['o']),
    new ExpressionSpec('o.value == 0', ['o'])
  )

))->run(['o' => $obj]); // return true
```



## License

MIT, see LICENSE