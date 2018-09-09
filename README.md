# Advanced validators for PHP Phalcon Framework.

## Supported Validators
[Min](#min)

[Max](#max)

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
