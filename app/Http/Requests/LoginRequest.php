<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
        'name'      => 'required|max:255',
        'email'     => 'required|email|unique:email',
        'password'  => 'required|min:6',
        'password_confirmation' => 'required_with:password|same:password|min:6'
        ]; 
    }
}
