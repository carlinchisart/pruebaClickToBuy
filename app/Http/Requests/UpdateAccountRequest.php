<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAccountRequest extends FormRequest
{
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
            'nombre' => 'sometimes|nullable|min:4|max:79',
            'telefono' => 'sometimes|nullable|min:4|max:19',
            'email' => 'sometimes|nullable|email|max:49'
        ];
    }

    public function failedValidation(Validator $validator) {
        //write your bussiness logic here otherwise it will give same old JSON response
       throw new HttpResponseException(response()->json(['msg' => 'existen errores','erros' => $validator->errors()], 422));
   }
}
