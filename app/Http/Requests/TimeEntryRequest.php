<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Services\DurationService;

// TODO 4. create artisan make:request TimeEntry
class TimeEntryRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        // TODO 5. from timeEntryController valdation
        return [
            'project_id' => ['required', 'numeric'],
            'task_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],
            'duration' => ['numeric'],
            'date' => ['required', 'date']
        ];
    }

    // TODO 6. prepareForVAlidation Method
    public function prepareForValidation(): void {
       $duration = (new DurationService())->convertToMinutes($this->duration);

       $this->merge([
           'user_id' => auth()->user()->id,
           'duration' => $duration
       ]);
    }
}
