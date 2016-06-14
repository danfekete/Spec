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
$d = [2];
$spec = new Specification(new ExpressionSpec('1 > d[0]'));
$spec->isSatisfiedBy(['d' => $d]); // return false
```

#### 2. Boolean chaining

```php
/*
 * You can use classes in expression code
*/
class Nan {

    public function isNan($value)
    {
        return is_nan($value);
    }

}

$spec = new Specification(new AndSpec(
    new NotSpec(new ExpressionSpec('checker.isNan(d)')),
    new OrSpec(
        new ExpressionSpec('d != 12'),
        new ExpressionSpec('d > 10')
    ),
    new AndSpec(
        new ExpressionSpec('d > 5'),
        new ExpressionSpec('d < 20')
    )
));

$spec->isSatisfiedBy(['d' => 17, 'checker' => new Nan()]); // return true
```

## TODO

1. Cache parsed code permanently
2. ~~Array builder, builds specification from arrays~~
3. ~~JSON builder~~

## License

MIT, see LICENSE