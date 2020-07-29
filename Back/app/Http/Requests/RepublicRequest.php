<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Republic;


class RepublicRequest extends FormRequest
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
                'price'=>'required|numeric',
                'description'=>'required|string',
                'bedrooms'=>'required|integer',
                'bathrooms'=>'required|integer',
                'numberResidents'=>'required|integer',
                'street'=>'required|string',
                'houseNumber'=>'required|string',
                'neighborhood'=>'required|string',
                'city'=>'required|string',

            ];
        }
        if($this->isMethod('put')){
            return[
                'name'=>'string|alpha',
                'price'=>'numeric',
                'description'=>'string',
                'bedrooms'=>'integer',
                'bathrooms'=>'integer',
                'numberResidents'=>'integer',
                'street'=>'string',
                'houseNumber'=>'string',
                'neighborhood'=>'string',
                'city'=>'string',
            ];
        }
        
    }
    public function messages(){
        return[
            'name.alpha'=>'O nome deve conter apenas caracteres alfabéticos.',
            'name.required'=>'Insira o nome da República.',
            'price.numeric'=>'O preço deve ser numérico.',
            'price.required'=>'Insira o preço dessa vaga.',
            'description.required'=>'Insira a descrição dessa vaga.',
            'badrooms.required'=>'Insira o número de quartos dessa República. ',
            'bathrooms.required'=>'Insira o número de banheiros dessa República.',
            'numberResidents.required'=>'Insira o número de residentes dessa república.',
            'houseNumber.required'=>'Insira o número do endereço dessa vaga.',
            'street.required'=>'Insira a rua dessa vaga.',
            'neighborhood.required'=>'Insira o bairro dessa vaga.',
            'city.required'=>'Insira a cidade dessa vaga.',
            'badrooms.integer'=>'Este campo deve ser numérico, insira a quantidade de quartos dessa República. ',
            'bathrooms.integer'=>'Este campo deve ser numérico, insira a quantidade de banheiros dessa República. ',
            'numberResidents.integer'=>'Este campo deve ser numérico, insira a quantidade de residentes dessa República. '

        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),
        422));
    }
}
