<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Validator;


use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

/**
 * Class AlphaDash
 * @package HuyDang\PhalconValidation\Validator
 */
class Filled extends Validator
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
        $value = $validation->getValue($attribute);
        if (is_null($value) || !empty($value)) {
            return true;
        }

        $message = $this->getOption('message');
        $validation->appendMessage(new Message($message, $attribute));

        return false;
    }
}
