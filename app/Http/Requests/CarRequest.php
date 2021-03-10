<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Exceptions\InvalidInputException;
class CarRequest extends FormRequest
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

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['title'=>'Error de validación','code'=>422,
                                        'description'=>'Los datos ingresados no son correctos',
                                        'errors'=>$validator->errors()], 400));
    }

    public static function validateBrand($brand){
        if($brand == 'Honda'){
            throw new InvalidInputException("La marca no está permitida:",403,$brand);
        } else{
            return true;
        }
    }

    public static function validateModel($model){
        if($model <= 2005){
            throw new InvalidInputException("El modelo es demasiado antiguo:",403,$model);
        } else{
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "reference" => "required|min:2|max:70",
            "brand" => "required|alpha_dash|min:3",
            "price" => "required|numeric|min:500|max:1000000",
            "model" => "nullable|numeric|min:2000|max:2025",
            "owner_id" => "required|exists:users,id"
        ];
    }
}
