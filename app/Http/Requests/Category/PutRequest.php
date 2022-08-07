<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PutRequest extends FormRequest
{
    //Sobreescribir clase para devolver errores
    public function failedValidation(
        \Illuminate\Contracts\Validation\Validator $validator
    ) {
        if ($this->expectsJson()) {
            $response = new Response($validator->errors(), 422);

            // Excepcion para el error
            throw new ValidationException($validator, $response);
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|min:5|max:500",
            "slug" =>
                "required|min:5|max:500|unique:categories,slug," . //el slug va a ser igual al del id que se pasa
                $this->route("category")->id,
        ];
    }
}