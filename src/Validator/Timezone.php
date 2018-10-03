<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Validator;


use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

/**
 * Class Timezone
 * @package HuyDang\PhalconValidation\Validator
 */
class Timezone extends Validator
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
        if (in_array($validation->getValue($attribute), timezone_identifiers_list())) {
            return true;
        }

        $message = $this->getOption('message');
        $validation->appendMessage(new Message($message, $attribute));

        return false;
    }
}
