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
                         'name' => 'required|min:8|max:128|unique:contacts',
                         'fone' => 'required|min:11',
                     ];
     
                     break;
     
     
     
                 case "PUT":
                    return [
                        'name' => 'min:8|max:128|unique:contacts,'.$this->contact->id,
                        'fone' => 'min:11|unique:contacts, fone,'.$this->contact->id
                    ];

                    break;
     
     
                 default:break;    
            }
         }
     }
        
    }
