<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ClientRequest extends FormRequest
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
    // public function up()
    // {
    //     Schema::create('clients', function (Blueprint $table) {
    //       $table->id();
    //       $table->string('name');
    //       $table->string('code');
    //       $table->text('address')->nullable();
    //       $table->string('phone')->nullable();
    //       $table->timestamps();
    //     });
    // }
    public function rules()
    {
        return [
            'name' => ['required'],
            'code' => ['required','numeric'],
            'address' => ['text'],
            'phone' => ['numeric'],
        ];
    }
}
