<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Tenant;

class TenantRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'name'=>'required|string|alpha',
                'email'=>'required|email|unique:tenants,email',
                'password'=>'required',

            ];
        }
        if($this->isMethod('put')){
            return [
                'name'=>'string|alpha',
                'email'=>'email|unique:tenants,email',
                'password'=>'string',
            ];
        }
    }

    
    public function messages(){
        return[
            'name.alpha'=>'O nome deve conter apenas caracteres alfabéticos.',
            'name.required'=>'Insira o nome da República.',
            'email.email'=>'Insira um e-mail válido.',
            'email.unique'=>'Este e-mail já está cadastrado.',
            'password.required'=>'Insira sua senha.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),
        422));
    }   
}
