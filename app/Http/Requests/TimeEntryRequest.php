<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Auth;
use App\Services\DurationService;
use Auth;

class TimeEntryRequest extends FormRequest
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
          'project_id' =>['required','numeric'],
          'task_id' =>['required','numeric'],
          'user_id' =>['required'],
          'duration' =>['numeric'],
          'date' =>['date','required'],
        ];
    }
   public function prepareForValidation() : void
   {
    $duration= (new DurationService())->convertToMinutes($this->duration);
 
    $this->merge(
        [
            'user_id'=>Auth()->user()->id,
            'duration' => $duration,
        ]

    );
   } 
}
