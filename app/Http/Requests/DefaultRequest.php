<?php

namespace App\Http\Requests;

use App\Http\Controllers\ResponseController;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

abstract class DefaultRequest extends FormRequest
{
    private $response;
    public function __construct()
    {
        $this->response = new ResponseController();
    }

    public abstract function setRules();
    public abstract function setMessages();


    public function messages()
    {
        return $this->setMessages();
    }

    public function rules()
    {
        return $this->setRules();
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->messages();

        $response = $this->response->send(false, null, 'Erro de validação', $errors);

        throw new ValidationException($validator, response()->json($response, 400));
    }
}
