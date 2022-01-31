<?php

namespace App\Http\Requests;

use App\Services\DurationService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TimeEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
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
            'task_id' => ['required', 'numeric'],
            'duration' => ['numeric'],
            'date' => ['required', 'date'],
            'user_id' => ['required'],
        ];
    }
    public function prepareForValidation(): void{
        $duration = $this->duration;

        $duration = (new DurationService())->convertToMinutes($duration);
        //then update request to duration
        $this->merge([
            'user_id' => Auth::user()->id,
            'duration' =>$duration,
        ]);
    }
}
