<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Validator;


use Phalcon\Validation;
use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

/**
 * Class Max
 * @package HuyDang\PhalconValidation\Validator
 */
class Max extends Validator
{
    /**
     * Executes the validation
     *
     * @param Validation $validation
     * @param string $attribute
     * @return bool
     */
    public function validate(Validation $validation, $attribute): bool
    {
        $max = $this->getOption('max', false);
        $field = $validation->getValue($attribute);
        $isPassed = (is_numeric($field) && $field <= $max) ||
            (is_string($field) && $max >= 0 && strlen($field) <= $max) ||
            (is_array($field) && $max >= 0 && count($field) <= $max);

        if ($isPassed) {
            return true;
        }

        $message = $this->getOption('message');
        $validation->appendMessage(new Message($message, $attribute));

        return false;
    }
}
