<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id', //this value is in the pivot table, don't put this value in the fillable inside the model
            'slug' => 'nullable',
            'description' => 'nullable',
            'final_goal' => 'nullable',
            'area' => 'nullable',
            'cover_image' => 'nullable|image|max:800'
        ];
    }
}
