<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Locator;

class LocatorRequest extends FormRequest
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
                'email'=>'required|email|unique:locators,email',
                'phoneNumber'=>'required|numeric|celular_com_ddd',
                'password'=>'required',
                'cpf'=>'required|unique:locators,cpf|formato_cpf',
                'phoneOpcional'=>'numeric|telefone_com_ddd',

            ];
        }
        if($this->isMethod('put')){
            return [
                'name'=>'string|alpha',
                'email'=>'email|unique:locators,email',
                'phoneNumber'=>'numeric|celular_com_ddd',
                'cpf'=>'unique:locators,cpf|formato_cpf',
                'phoneOpcional'=>'numeric|telefone_com_ddd',
                
            ];
        }
    }

    public function messages(){
        return[
            'name.alpha'=>'O nome deve conter apenas caracteres alfabéticos.',
            'name.required'=>'Insira o nome da República.',
            'email.email'=>'Insira um e-mail válido.',
            'email.unique'=>'Este e-mail já está cadastrado.',
            'phoneNumber.required'=>'Insira seu número de celular com ddd.',
            'phoneNumber.celular_com_ddd'=>'Insira seu número de celular com ddd.',
            'phoneOpcional.telefone_com_ddd'=>'Insira seu número de telefone com ddd.',
            'password.required'=>'Insira sua senha.',
            'cpf.unique'=>'Este cpf já está cadastrado.',
            'cpf.required'=>'Favor inserir seu cpf.',
            'cpf.formato_cpf'=>'Este cpf não atende ao formato brasileiro.',

        ];

    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),
        422));
    }
}
