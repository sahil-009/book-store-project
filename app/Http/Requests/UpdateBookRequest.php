<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
        $bookId = $this->route('book');
        
        return [
            'title' => ['sometimes', 'string', 'max:255'],
            'isbn' => ['sometimes', 'string', 'unique:books,isbn,' . $bookId],
            'description' => ['nullable', 'string'],
            'published_year' => ['sometimes', 'integer', 'min:1000', 'max:' . date('Y')],
            'author_id' => ['sometimes', 'exists:authors,id'],
        ];
    }
}
