<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class ResizeImageRequest extends FormRequest
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
        $regex = 'regex:/^d+(\.\d+)?%?$/'; // e.g. 50, 50%, 50.123, 50.123%

        $rules = [
            'image' => ['required'],
            'w' => ['required', $regex],
            'h' => $regex,
            'album_id' => 'exists:App/Models/Album,id'
        ];

        // https://laravel.com/docs/10.x/requests#retrieving-input
        // you access the request object directly through $this, NOT through $this->request
        // dd($this->all(), $this->input(), $this->request, $this->request->all());

        // dd($this->post('image'), $this->input('image'), $this->all()['image'], $this->image); 
            // they're all equivalent ONLY if the image is an URL. to get the uploaded image i need one of the last 2 versions apparently
        $image = $this->all()['image'] ?? false;
        if($image && $image instanceof UploadedFile) {
            $rules['image'][] = 'image';
        } else {
            $rules['image'][] = 'url';
        }
        
        return $rules;
    }
}
