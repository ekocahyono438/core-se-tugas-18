<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class ServicesRequest extends FormRequest
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
            'description'=> 'required|string|max:255',
            'duration_days'=> 'required|integer|max:50',
            'status' => 'required',
            
        ];
    }

    
    public function messages():array{
        return[
            'name.required'=> "nama Services harus diisi",
            'name.max'=> "nama Services maksimal 225",

            'description.required'=> "description services harus diisi",
            'description.max'=> "description services maksimal 225",
            
            'duration_days.required'=> "duration_days harus diisi",
            'duration_days.max'=> "duration_days maksimal 225",
            'status.required'=> "status harus di isi"
        ];
    
        
    }
}
