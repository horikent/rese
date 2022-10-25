<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date'=>'required',
            'time'=>'required',
            'number'=>'required',
        ];
    }
    
    public function messages()
    {
    return [
        'name.required' => '名前は必須項目です',
        'date.required' => '日付は必須項目です',
        'time.required' => '日付は必須項目です',
    ];
    }
}
