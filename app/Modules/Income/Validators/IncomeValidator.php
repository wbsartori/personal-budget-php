<?php

namespace App\Modules\Income\Validators;

use App\Modules\Utils\Constants;

class IncomeValidator
{
    /**
     * @param $request
     * @return mixed
     */
    public function validateFields($request): mixed
    {
        return $request->validate([
            'name' => 'required',
            'birthDate' => 'required',
            'gender' => 'required',
            'email' => 'required'
        ], [
            'name.required' => Constants::VALIDATE_MSG['person']['name'],
            'birthDate.required' => Constants::VALIDATE_MSG['person']['birthDate'],
            'gender.required' => Constants::VALIDATE_MSG['person']['gender'],
            'email.required' => Constants::VALIDATE_MSG['person']['email'],
        ]);
    }
}
