<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Validator;


use Phalcon\Validation;
use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

/**
 * Class Min
 * @package HuyDang\PhalconValidation\Validator
 */
class Min extends Validator
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
        $min = $this->getOption('min', false);
        $field = $validation->getValue($attribute);
        $isPassed = (is_numeric($field) && $field >= $min) ||
            (is_string($field) && $min >= 0 && strlen($field) >= $min) ||
            (is_array($field) && $min >= 0 && count($field) >= $min);

        if ($isPassed) {
            return true;
        }

        $message = $this->getOption('message');
        $validation->appendMessage(new Message($message, $attribute, 'Number'));

        return false;
    }
}
