<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateOrderRequest extends FormRequest
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
            'account_id' => 'required|numeric|exists:accounts,id',
            'cantidad'   => 'required|numeric|min:1',
            'producto'   => 'required',
            'valor'      => 'required|numeric|min:1',
        ];
    }

    public function failedValidation(Validator $validator) {
        //write your bussiness logic here otherwise it will give same old JSON response
       throw new HttpResponseException(response()->json(['msg' => 'existen errores','erros' => $validator->errors()], 422));
   }
}
