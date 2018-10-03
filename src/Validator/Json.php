<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Validator;


use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

/**
 * Class Json
 * @package HuyDang\PhalconValidation\Validator
 */
class Json extends Validator
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
        if ($this->isJson($validation->getValue($attribute))) {
            return true;
        }

        $message = $this->getOption('message');
        $validation->appendMessage(new Message($message, $attribute));

        return false;
    }

    /**
     * Check if string is valid json
     * @param string $string
     * @return bool
     */
    private function isJson(string $string):bool
    {
        json_decode($string);

        return (json_last_error() == JSON_ERROR_NONE);
    }
}
