<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Validator;


use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

/**
 * Class NotIn
 * @package HuyDang\PhalconValidation\Validator
 */
class NotIn extends Validator
{
    /**
     * Executes the validation
     *
     * @param \Phalcon\Validation $validation
     * @param string $attribute
     * @return bool
     */
    public function validate(\Phalcon\Validation $validation, $attribute)
    {
        $field = $validation->getValue($attribute);
        $notIn = $this->getOption('not_in', []);

        if (is_array($notIn) && !in_array($field, $notIn)) {
            return true;
        }

        $message = $this->getOption('message');
        $validation->appendMessage(new Message($message, $attribute));

        return false;
    }
}
