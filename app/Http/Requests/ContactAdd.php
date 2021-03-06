<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContactAdd extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $contactId = $this->contact_id;

        return [
            'contact_id' => [
                'required',
                'integer',
                Rule::unique( 'contact_user' )->where( function ( $query ) use ( $contactId ) {
                    return $query->where( 'contact_id', $contactId )
                                 ->where( 'user_id', Auth::user()->id );
                } )
            ]
        ];
    }
}
