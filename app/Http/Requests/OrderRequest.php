<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class OrderRequest extends FormRequest
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
            'customer_id'=> 'required',
            'service_id'   => ['required', 'exists:services,id'],
            'order_number'=> 'required|string|max:10',
            'order_date'=> 'required',
            'total'=> 'required|numeric',
            'status'=> 'required'

        ];
    }

    
    public function messages():array{
        return[
            'customer_id.required'=> "customer_id  harus diisi",

            'order_number.required'=> "order number harus di isi",
            'order_number.max'=> "nama customer maksimal 10",

            'order_date.required'=> "tanggal order harus diisi",
            
            'total.required'=> "total harus diisi",
            'total.numeric'=> "number harus diisi",
            
            'status.required'=> "status harus diisi",
        ];
    
        
    }
}
