<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
        ];
    }

    public function messages() {
        return [];
    }

    public function attributes() {
        return [
            'firstname' => 'first name',
            'lastname' => 'last name',
        ];
    }

}
