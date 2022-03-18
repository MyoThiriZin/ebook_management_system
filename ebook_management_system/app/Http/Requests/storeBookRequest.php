<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeBookRequest extends FormRequest
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
            "name" => ["required"],
            "file" => ["required"],
            "duration" => ["required"],
            "description" => ["required"],
            "author_id" => ["required"],
            "category_id" => ["required"],
        ];

    }
    
    public function validated()
    {
        return array_merge(parent::validated(), [
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
