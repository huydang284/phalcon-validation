<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\Filled;
use Phalcon\Validation;

class FilledTest extends TestCase
{
    public static function filledValidatorDataProvider()
    {
        return [
            [
                'data' => [
                    'email' => 'example@gmail.com'
                ],
                'passed' => true, // not have `field`, return true
            ],
            [
                'data' => [
                    'email' => 'example@gmail.com',
                    'password' => ''
                ],
                'passed' => false, // have `field` but empty, return false
            ],
            [
                'data' => [
                    'email' => 'example@gmail.com',
                    'password' => 'newpassword'
                ],
                'passed' => true, // have `field` but not empty, return true
            ]
        ];
    }

    /**
     * @dataProvider filledValidatorDataProvider
     * @param $data
     * @param $passed
     */
    public function testFilledValidator($data, $passed)
    {
        $validation = new Validation();
        $validation->add('password',
            new Filled([
                'message' => 'Error message'
            ]));

        $messages = $validation->validate($data);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
