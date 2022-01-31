<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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
            'project_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],
            'task_id' => ['required', 'numeric'],
            'duration' => ['numeric'],
            'date' => ['date', 'required'],
        ];
    }
    public function prepareForValidation():void
    {

        // $duration = (new DurationService())->convertToMinutes($this->duration);
        $duration = (new DurationService())->convertToMinutes($this->duration);

        $this->merge([
            'user_id' => auth()->user()->id,
            'duration' => $duration,
        ]);
    }
}
