<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\IpV6;
use Phalcon\Validation;

class IpV6Test extends TestCase
{
    public static function ipV6ValidatorDataProvider()
    {
        return [
            [
                'field' => '120.138.20.36',
                'passed' => false,
            ],
            [
                'field' => '2001:0db8:85a3:0000:0000:8a2e:0370:7334',
                'passed' => true,
            ],
        ];
    }

    /**
     * @dataProvider ipV6ValidatorDataProvider
     * @param $field
     * @param $passed
     */
    public function testIpV6Validator($field, $passed)
    {
        $validation = new Validation();
        $validation->add('field',
            new IpV6([
                'message' => 'Error message'
            ]));

        $messages = $validation->validate([
            'field' => $field
        ]);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
