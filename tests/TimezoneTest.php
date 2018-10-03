<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\Timezone;
use Phalcon\Validation;

class TimezoneTest extends TestCase
{
    public static function timezoneValidatorDataProvider()
    {
        return [
            [
                'field' => 'UTC',
                'passed' => true,
            ],
            [
                'field' => 'Asia/Ho_Chi_Minh',
                'passed' => true,
            ],
            [
                'field' => 'Asia/Saigon',
                'passed' => false,
            ],
            [
                'field' => 'timezone',
                'passed' => false,
            ],
        ];
    }

    /**
     * @dataProvider timezoneValidatorDataProvider
     * @param $field
     * @param $passed
     */
    public function testTimezoneValidator($field, $passed)
    {
        $validation = new Validation();
        $validation->add('field',
            new Timezone([
                'message' => 'Error message'
            ]));

        $messages = $validation->validate([
            'field' => $field
        ]);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
