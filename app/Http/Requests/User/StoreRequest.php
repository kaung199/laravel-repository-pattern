<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreRequest extends FormRequest
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
        $user_id = request()->user ? request()->user->id : null;
        $data['password'] = 'required|min:8|confirmed';

        if($user_id){
            $data['password'] = 'nullable|min:8|confirmed';
        }

        $rules = [
            'name' => 'required|regex:/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/|max:255',
            'email' => 'required|email|unique:users,email,'.$user_id,
        ]+$data;

        return $rules;
    }

    /**
     * validation filed 
     * response json
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));
    }

    /**
     * custom validation messages
     */
    public function messages()
    {
        return [
            '*.required' => 'This field is required'
        ];
    }
}
