<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\Max;
use Phalcon\Validation;

class MaxTest extends TestCase
{
    public static function maxValidatorDataProvider()
    {
        $validateNumeric = [
            [
                'max' => 1,
                'field' => 0,
                'passed' => true
            ],
            [
                'max' => 1,
                'field' => 1,
                'passed' => true
            ],
            [
                'max' => 1,
                'field' => 2,
                'passed' => false
            ]
        ];

        $validateString = [
            [
                'max' => 5,
                'field' => 'this is text field',
                'passed' => false
            ],
            [
                'max' => 18,
                'field' => 'this is text field',
                'passed' => true
            ],
            [
                'max' => 19,
                'field' => 'this is text field',
                'passed' => true
            ],
        ];

        $validateArray = [
            [
                'max' => 2,
                'field' => [123],
                'passed' => true
            ],
            [
                'max' => 2,
                'field' => [123, 456],
                'passed' => true
            ],
            [
                'max' => 2,
                'field' => [123, 456, 789],
                'passed' => false
            ],
        ];

        return array_merge($validateNumeric, $validateString, $validateArray);
    }

    /**
     * @dataProvider maxValidatorDataProvider
     * @param $max
     * @param $field
     * @param $passed
     */
    public function testMaxValidator($max, $field, $passed)
    {
        $validation = new Validation();
        $validation->add('field',
            new Max([
                'max' => $max,
                'message' => 'Error message'
            ]));

        $messages = $validation->validate([
            'field' => $field
        ]);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
