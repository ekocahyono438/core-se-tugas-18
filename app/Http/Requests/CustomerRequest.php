<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|email|max:255',
            'city'=> 'required|string|max:255'
        ];
    }

    
    public function messages():array{
        return[
            'name.required'=> "Nama customer harus diisi",
            'name.max'=> "nama customer maksimal 225",

            'email.required'=> "email customer harus diisi",
            'email.max'=> "nama customer maksimal 225",
            'email.email'=> "format email tidak valid. contoh valid : wowo@gmail.com",

            'city.required'=> "kota harus diisi",
        ];
    
        
    }
}
