<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
          'title' => ['required','unique:movies'],
          'image_url' => ['required', 'active_url'],
          'published_year' => 'required',
          'description' => 'required',
          'is_showing' => 'required',
          'genre' => 'required',
        ];
    }
}
