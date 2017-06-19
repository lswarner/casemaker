<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
     {
       if( $this->user()->is_admin ) {
         return true;
       }

       if( $this->user()->id == $this->route('user')->id ) {
         return true;
       }

       return false;
     }

     /**
      * Get the validation rules that apply to the request.
      *
      * @return array
      */
     public function rules()
     {
         return [
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users,email,'.$this->route('user')->id,
           'affiliation' => 'required|string|max:255',
           'introduction' => 'required|string',
         ];
     }
}
