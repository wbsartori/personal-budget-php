<?php

namespace App\Modules\Validators;

class ModulesValidator
{
    /**
     * @param $field
     * @return string
     */
    public function validatorFieldStatus($field): string
    {
        $status = '';

        if(isset($field['status']) && $field['status'] === 'on'){
            return $status = 'A';
        }
        return $status = 'I';
    }
}
