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

### Min
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
