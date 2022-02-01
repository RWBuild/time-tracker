<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => ['required','string'],
          'code' => ['required','string'],
          'address' => ['nullable'],
          'phone' => ['nullable'],
        ];
    }
}
