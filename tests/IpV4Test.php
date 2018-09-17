<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\AlphaDash;
use HuyDang\PhalconValidation\Validator\IpV4;
use Phalcon\Validation;

class IpV4Test extends TestCase
{
    public static function ipV4ValidatorDataProvider()
    {
        return [
            [
                'field' => '120.138.20.36',
                'passed' => true,
            ],
            [
                'field' => '120.138.20',
                'passed' => false,
            ],
        ];
    }

    /**
     * @dataProvider ipV4ValidatorDataProvider
     * @param $field
     * @param $passed
     */
    public function testIpV4Validator($field, $passed)
    {
        $validation = new Validation();
        $validation->add('field',
            new IpV4([
                'message' => 'Error message'
            ]));

        $messages = $validation->validate([
            'field' => $field
        ]);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
