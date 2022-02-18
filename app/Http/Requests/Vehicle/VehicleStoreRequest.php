<?php

namespace App\Http\Requests\Vehicle;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'year_date' => 'required | digits:4| integer|min:1900| max:' . (Carbon::now()->year),
            'make' => 'required | string | max:255',
            'model' => 'required | string | max:255',
            'avg_consume' => 'required | numeric',
            'photo' => 'nullable | mimetypes:image/png, image/jpg, image/jpeg | max:2048',
            'url_photo' => 'nullable | url'
        ];
    }
}
