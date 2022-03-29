<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            //validation
            'property_name' => 'required|string|max:255',
            'property_price' => 'required',
            'property_location' => 'required|string|max:255',
            'property_type' => 'required',
            'property_area' => 'required',
            'property_garage' => 'required',
            'property_status' => 'required',
            'property_beds' => 'required',
            'property_baths' => 'required',
            'property_thumbnail' => 'required',
            'property_description' => 'required',
            'amenities' => 'required'
        ];
    }
    // public function messages()
    // {
    //     return [
    //         //
    //     ];
    // }
}
