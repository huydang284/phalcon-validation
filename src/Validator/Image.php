<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Validator;


use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

/**
 * Class Image
 * @package HuyDang\PhalconValidation\Validator
 */
class Image extends Validator
{
    /**
     * Executes the validation
     *
     * @param \Phalcon\Validation $validation
     * @param string $attribute
     * @return bool
     */
    public function validate(\Phalcon\Validation $validation, $attribute): bool
    {
        $filePath = $validation->getValue($attribute);

        if ($this->isImage($filePath)) {
            return true;
        }

        $message = $this->getOption('message');
        $validation->appendMessage(new Message($message, $attribute));

        return false;
    }

    /**
     * Check if file is image
     * @param string $filePath
     * @return bool
     */
    private function isImage(string $filePath): bool
    {
        if (!file_exists($filePath)) {
            return false;
        }

        $image = @getimagesize($filePath);

        return is_array($image) && !empty($image[0]);
    }
}
