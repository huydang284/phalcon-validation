<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Tests;

use HuyDang\PhalconValidation\Validator\Image;
use Phalcon\Validation;

class ImageTest extends TestCase
{
    const TEST_DIR = 'test-files';
    const IMG = 'photo.jpg';
    const PLAIN_TEXT = 'plaintext.txt';

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        mkdir(self::TEST_DIR);
        // generate plain text
        file_put_contents(self::TEST_DIR . DIRECTORY_SEPARATOR . self::PLAIN_TEXT, 'simple text');

        // generate image
        $img = imagecreatetruecolor(120, 20);
        $bg = imagecolorallocate($img, 255, 255, 255);
        imagefilledrectangle($img, 0, 0, 120, 20, $bg);
        imagejpeg($img, self::TEST_DIR . DIRECTORY_SEPARATOR . self::IMG, 100);
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();
        exec('rm -rf ' . self::TEST_DIR);
    }

    public static function imageValidatorDataProvider()
    {
        return [
            [
                'file' => self::TEST_DIR . DIRECTORY_SEPARATOR . self::PLAIN_TEXT,
                'passed' => false,
            ],
            [
                'file' => self::TEST_DIR . DIRECTORY_SEPARATOR . self::IMG,
                'passed' => true,
            ],
        ];
    }

    /**
     * @dataProvider imageValidatorDataProvider
     * @param $file
     * @param $passed
     */
    public function testImageValidator($file, $passed)
    {
        $validation = new Validation();
        $validation->add('image',
            new Image([
                'message' => 'Error message'
            ]));

        $messages = $validation->validate([
            'image' => $file
        ]);

        $this->assertSame($passed, $messages->count() === 0);
    }
}
