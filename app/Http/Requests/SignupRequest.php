<?php
namespace App\Http\Requests;

class SignupRequest extends Request
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
            'username' => 'required|max:255',
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'phone' => 'max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ];
    }
}