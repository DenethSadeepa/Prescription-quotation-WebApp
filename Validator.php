<?php

class Validator
{
    public static function validate($params, $validation_rules)
    {
        $response = [];

        foreach ($validation_rules as $field => $rules) {

            foreach (explode('|', $rules) as $rule) {

                $value = trim($params[$field]);
                if ($rule == 'required' && array_key_exists($field, $params) == true && empty($value)) {
                    $response[$field] =  $field . " is required.\n";
                } else if (!empty($value)) {
                    if ($rule == 'alphanumeric' && preg_match('/^[a-z0-9 .\-]+$/i', $params[$field]) == false) {

                        $response[$field] = "The value of " . $field . " is not a valid alphanumeric value.\n";
                    }

                    if ($rule == 'phone' && preg_match('/^[0-9 \-\(\)\+]+$/i', $params[$field]) == false) {

                        $response[$field] = "The value of " . $field . " is not a valid phone number.\n";
                    }

                    if ($rule == 'email' && filter_var($params[$field], FILTER_VALIDATE_EMAIL) == false) {

                        $response[$field] = "The value of " . $field . " is not a valid email value.\n";
                    }
                }

                if (array_key_exists($field, $params) == true) {
                }
            }
        }

        return $response;
    }
}
