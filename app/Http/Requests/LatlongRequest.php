<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LatlongRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'lat' => 'required',
            'long' => 'required',
            'datetime' => 'required',
            'person_id' => 'required',
        ];
    }

    public function messages() {
        return [];
    }

    public function attributes() {
        return [
            'lat' => 'latitude',
            'long' => 'longitude',
            'datetime' => 'date time',
            'person_id' => 'fullname',
        ];
    }

}
