<?php
declare(strict_types=1);

namespace HuyDang\PhalconValidation\Validator;


use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

/**
 * Class IpV4
 * @package HuyDang\PhalconValidation\Validator
 */
class IpV4 extends Validator
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
        $isPassed = !!filter_var($field, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);

        if ($isPassed) {
            return true;
        }

        $message = $this->getOption('message');
        $validation->appendMessage(new Message($message, $attribute));

        return false;
    }
}
