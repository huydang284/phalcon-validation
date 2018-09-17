<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\In;
use Phalcon\Validation;

class InTest extends TestCase
{
    public static function inValidatorDataProvider()
    {
        return [
            [
                'field' => 1,
                'in' => [1, 2, 3],
                'passed' => true,
            ],
            [
                'field' => 4,
                'in' => [1, 2, 3],
                'passed' => false,
            ],
            [
                'field' => 2,
                'in' => [],
                'passed' => false,
            ],
            [
                'field' => 2,
                'in' => '1,2,3',
                'passed' => false,
            ],
        ];
    }

    /**
     * @dataProvider inValidatorDataProvider
     * @param $field
     * @param $in
     * @param $passed
     */
    public function testInValidator($field, $in, $passed)
    {
        $validation = new Validation();
        $validation->add('field',
            new In([
                'in' => $in,
                'message' => 'Error message'
            ]));

        $messages = $validation->validate([
            'field' => $field
        ]);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
