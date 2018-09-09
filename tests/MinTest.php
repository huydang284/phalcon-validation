<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\Min;
use Phalcon\Validation;

class MinTest extends TestCase
{
    public static function minValidatorDataProvider()
    {
        $validateNumeric = [
            [
                'min' => 1,
                'field' => 0,
                'passed' => false
            ],
            [
                'min' => 1,
                'field' => 1,
                'passed' => true
            ],
            [
                'min' => 1,
                'field' => 2,
                'passed' => true
            ]
        ];

        $validateString = [
            [
                'min' => 5,
                'field' => 'this is text field',
                'passed' => true
            ],
            [
                'min' => 18,
                'field' => 'this is text field',
                'passed' => true
            ],
            [
                'min' => 19,
                'field' => 'this is text field',
                'passed' => false
            ],
        ];

        $validateArray = [
            [
                'min' => 2,
                'field' => [123],
                'passed' => false
            ],
            [
                'min' => 2,
                'field' => [123, 456],
                'passed' => true
            ],
            [
                'min' => 2,
                'field' => [123, 456, 789],
                'passed' => true
            ],
        ];

        return array_merge($validateNumeric, $validateString, $validateArray);
    }

    /**
     * @dataProvider minValidatorDataProvider
     * @param $min
     * @param $field
     * @param $passed
     */
    public function testMinValidator($min, $field, $passed)
    {
        $validation = new Validation();
        $validation->add('field',
            new Min([
                'min' => $min,
                'message' => 'Error message'
            ]));

        $messages = $validation->validate([
            'field' => $field
        ]);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
