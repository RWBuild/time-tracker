<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name' => ['required','string'],
            'client_id' => ['required','numeric'],
            'description' => ['string'],
            'budget' => ['numeric'],
        ];

        // $this->merge([
        //     'client_id' => auth()->clients()->id,
            
        // ]);
    }
}
