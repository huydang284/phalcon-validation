<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Validator;


use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

class In extends Validator
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
        $in = $this->getOption('in', []);

        if (is_array($in) && in_array($field, $in)) {
            return true;
        }

        $message = $this->getOption('message');
        $validation->appendMessage(new Message($message, $attribute));

        return false;
    }
}
