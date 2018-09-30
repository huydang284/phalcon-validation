<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\Json;
use Phalcon\Validation;

class JsonTest extends TestCase
{
    public static function jsonValidatorDataProvider()
    {
        return [
            [
                'field' => '"alphadash"',
                'passed' => true,
            ],
            [
                'field' => '123',
                'passed' => true,
            ],
            [
                'field' => 'null',
                'passed' => true,
            ],
            [
                'field' => 'notnull',
                'passed' => false,
            ],
            [
                'field' => '[123]',
                'passed' => true,
            ],
            [
                'field' => '{key: value}',
                'passed' => false,
            ],
            [
                'field' => '{"key": "value"}',
                'passed' => true,
            ],
            [
                'field' => '{"key": 123}',
                'passed' => true,
            ],
            [
                'field' => '{"key": 123',
                'passed' => false,
            ],
        ];
    }

    /**
     * @dataProvider jsonValidatorDataProvider
     * @param $field
     * @param $passed
     */
    public function testJsonValidator($field, $passed)
    {
        $validation = new Validation();
        $validation->add('field',
            new Json([
                'message' => 'Error message'
            ]));

        $messages = $validation->validate([
            'field' => $field
        ]);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
