<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\NotIn;
use Phalcon\Validation;

class NotInTest extends TestCase
{
    public static function notInValidatorDataProvider()
    {
        return [
            [
                'field' => 1,
                'not_in' => [1, 2, 3],
                'passed' => false,
            ],
            [
                'field' => 4,
                'not_in' => [1, 2, 3],
                'passed' => true,
            ],
            [
                'field' => 2,
                'not_in' => [],
                'passed' => true,
            ],
            [
                'field' => 2,
                'not_in' => '1,2,3',
                'passed' => false,
            ],
        ];
    }

    /**
     * @dataProvider notInValidatorDataProvider
     * @param $field
     * @param $notIn
     * @param $passed
     */
    public function testNotInValidator($field, $notIn, $passed)
    {
        $validation = new Validation();
        $validation->add('field',
            new NotIn([
                'not_in' => $notIn,
                'message' => 'Error message'
            ]));

        $messages = $validation->validate([
            'field' => $field
        ]);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
