<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        // dd([
        //     'has_file' => $this->hasFile('thumbnail'),
        //     'mime' => $this->hasFile('thumbnail') ? $this->file('thumbnail')->getMimeType() : null,
        //     'extension' => $this->hasFile('thumbnail') ? $this->file('thumbnail')->getClientOriginalExtension() : null,
        //     'valid' => $this->hasFile('thumbnail') ? $this->file('thumbnail')->isValid() : false,
        // ]);        
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'thumbnail.required' => 'Vui lòng chọn ảnh, đồ ngu!',
    //         'thumbnail.image' => 'File phải là ảnh, không phải rác!',
    //         'thumbnail.mimes' => 'Chỉ hỗ trợ jpeg, png, jpg, gif, svg, webp, kiểm tra lại đi con cặc!',
    //         'thumbnail.max' => 'Ảnh quá lớn, tối đa 2MB thôi!',
    //     ];
    // }
}
