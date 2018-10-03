# Advanced validators for PHP Phalcon Framework.
[![License](https://poser.pugx.org/michele-angioni/phalcon-validators/license)](https://packagist.org/packages/michele-angioni/phalcon-validators)
[![Build Status](https://travis-ci.org/huydang284/phalcon-validation.svg)](https://travis-ci.org/huydang284/phalcon-validators)

## Introduction

Advanced Validators adds several new validators to support Phalcon Framework.
 
## Installation

## Supported Validators
[Min](#min)

[Max](#max)

[AlphaDash](#alphadash)

[In](#in)

[NotIn](#notin)

[IpV4](#ipv4)

[IpV6](#ipv6)

[Json](#json)

[Filled](#filled)

### Min

The field under validation must have a minimum value. For string data, value corresponds to the number of characters. For numeric data, value corresponds to a given integer value. For an array, size corresponds to the count of the array.

```php
use \HuyDang\PhalconValidation\Validator\Min;

$validation = new Validation();
$validation->add('field',
    new Min([
        'min' => $min,
        'message' => 'Error message'
    ]));

$messages = $validation->validate([
    'field' => $field
]);

if ($messages->count() > 0) {
    // field is not passed
} else {
    // field is passed
}
```

### Max

The field under validation must be less than or equal to a maximum value. For string data, value corresponds to the number of characters. For numeric data, value corresponds to a given integer value. For an array, size corresponds to the count of the array.

```php
use \HuyDang\PhalconValidation\Validator\Max;

$validation = new Validation();
$validation->add('field',
    new Max([
        'max' => $max,
        'message' => 'Error message'
    ]));

$messages = $validation->validate([
    'field' => $field
]);

if ($messages->count() > 0) {
    // field is not passed
} else {
    // field is passed
}
```

### AlphaDash

The field under validation may have alpha-numeric characters, as well as dashes and underscores.

```php
use \HuyDang\PhalconValidation\Validator\AlphaDash;

$validation = new Validation();
$validation->add('field',
    new AlphaDash([
        'message' => 'Error message'
    ]));

$messages = $validation->validate([
    'field' => $field
]);

if ($messages->count() > 0) {
    // field is not passed
} else {
    // field is passed
}
```

### In

The field under validation must be included in the given list of values. 

```php
use \HuyDang\PhalconValidation\Validator\In;

$validation = new Validation();
$validation->add('field',
    new In([
        'in' => [1, 2, 3],
        'message' => 'Error message'
    ]));

$messages = $validation->validate([
    'field' => $field
]);

if ($messages->count() > 0) {
    // field is not passed
} else {
    // field is passed
}
```

### NotIn

The field under validation must not be included in the given list of values.

```php
use \HuyDang\PhalconValidation\Validator\NotIn;

$validation = new Validation();
$validation->add('field',
    new NotIn([
        'not_in' => [1, 2, 3],
        'message' => 'Error message'
    ]));

$messages = $validation->validate([
    'field' => $field
]);

if ($messages->count() > 0) {
    // field is not passed
} else {
    // field is passed
}
```

### IpV4

The field under validation must be an IPv4 address.

```php
use \HuyDang\PhalconValidation\Validator\IpV4;

$validation = new Validation();
$validation->add('field',
    new IpV4([
        'message' => 'Error message'
    ]));

$messages = $validation->validate([
    'field' => $field
]);

if ($messages->count() > 0) {
    // field is not passed
} else {
    // field is passed
}
```

### IpV6

The field under validation must be an IPv6 address.

```php
use \HuyDang\PhalconValidation\Validator\IpV6;

$validation = new Validation();
$validation->add('field',
    new IpV6([
        'message' => 'Error message'
    ]));

$messages = $validation->validate([
    'field' => $field
]);

if ($messages->count() > 0) {
    // field is not passed
} else {
    // field is passed
}
```

### Json

The field under validation must be a valid JSON string.

```php
use \HuyDang\PhalconValidation\Validator\Json;

$validation = new Validation();
$validation->add('field',
    new Json([
        'message' => 'Error message'
    ]));

$messages = $validation->validate([
    'field' => $field
]);

if ($messages->count() > 0) {
    // field is not passed
} else {
    // field is passed
}
```

### Filled

The field under validation must not be empty when it is present.

```php
use \HuyDang\PhalconValidation\Validator\Filled;

$validation = new Validation();
$validation->add('field',
    new Filled([
        'message' => 'Error message'
    ]));

$messages = $validation->validate([
    'field' => $field
]);

if ($messages->count() > 0) {
    // field is not passed
} else {
    // field is passed
}
```
