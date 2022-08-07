<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            "slug" => Str::slug($this->title),
            // "slug" => Str::of($this->title)->slug()->append("-adicional")
        ]);
    }

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
            "slug" => "required|min:5|max:500|unique:posts",
            "content" => "required|min:7",
            "category_id" => "required|integer",
            "description" => "required|min:7",
            "posted" => "required",
        ];
    }
}