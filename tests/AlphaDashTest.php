<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\AlphaDash;
use Phalcon\Validation;

class AlphaDashTest extends TestCase
{
    public static function alphaDashValidatorDataProvider()
    {
        return [
            [
                'field' => 'alphadash',
                'passed' => true,
            ],
            [
                'field' => 'alpha_dash',
                'passed' => true,
            ],
            [
                'field' => '__',
                'passed' => true,
            ],
            [
                'field' => 'alpha dash',
                'passed' => false,
            ],
            [
                'field' => 'alpha-dash',
                'passed' => false,
            ],
            [
                'field' => 'alphadash ',
                'passed' => false,
            ],
        ];
    }

    /**
     * @dataProvider alphaDashValidatorDataProvider
     * @param $field
     * @param $passed
     */
    public function testAlphaDashValidator($field, $passed)
    {
        $validation = new Validation();
        $validation->add('field',
            new AlphaDash([
                'message' => 'Error message'
            ]));

        $messages = $validation->validate([
            'field' => $field
        ]);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
