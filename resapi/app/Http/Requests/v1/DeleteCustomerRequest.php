<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        $abilities = auth()->payload()->get('abilities');
    
        return is_array($abilities) && in_array('delete', $abilities);
    }
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            // You can add validation rules specific to the delete request if needed
        ];
    }
}
