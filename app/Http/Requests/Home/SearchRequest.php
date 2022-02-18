<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'vehicle_id' => 'required | exists:vehicles,id',
            'pointALatitude' => 'required | numeric | between:-90,90',
            'pointALongitude' => 'required | numeric | between:-180,180',
            'pointBLatitude' => 'required | numeric | between:-90,90',
            'pointBLongitude' => 'required | numeric | between:-180,180',
        ];
    }
}
