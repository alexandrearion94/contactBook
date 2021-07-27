<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        {
            switch($this->method()) {
                case "POST":
                     return [
                         'name' => 'required|min:8|max:128|unique:Contact',
                         'fone' => 'required|max:12',
                     ];
     
                     break;
     
     
     
                 case "PUT":
     
                     break;
     
     
                 default:break;    
            }
         }
     }
        
    }