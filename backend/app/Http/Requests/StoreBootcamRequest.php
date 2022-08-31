<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBootcamRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=>'required|min:5',
            "user_id"=>'required|exists:users,id'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'error en el campo',
            'user_id.exists'=>'no se encuentra id user',
            'name.min'=>'Minimo 5 caracteres'

        ];
    }
    //Enviar response con error de validacion
    protected function failedValidation(Validator $v){
        //Si la validacion es fallida se lanza una excepcion a HTTP
        throw new HttpResponseException(
            response()->json(["success"=> false, "error"=> $v->errors()], 422)
        );
    }
}
