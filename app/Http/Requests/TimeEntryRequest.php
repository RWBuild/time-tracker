<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\DurationService;

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
        'project_id' => ['required','numeric'],
        'task_id' => ['required','numeric'],
        'user_id' => ['required','numeric'],
        'duration' => ['numeric'],
        'date' => ['date', 'required'],
        ];
    }

    public function prepareForValidation():void{
       // dd('dd($this->duration');
        $duration = (new DurationService())->convertToMinutes($this->duration);

        // //check for color format
        // if(str_contains((string)$duration, ':')){
        //     $durationParts = explode(":", $duration);
        //     $duration = ((Int)$durationParts[0] * 60) + (Int)$durationParts[1];
        // }

        // //check for decimal format
        // if (str_contaions((String)$duration, '.')){
        //     $duration = ($duration);
        // }

        //$this->duration = $duration;
        $this->merge([
            'user_id' => auth()->user()->id,
            'duration'=>$duration,
        ]);
        //dd($this->duration);
    }

}
