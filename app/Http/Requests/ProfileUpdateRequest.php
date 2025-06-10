<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{

    protected function prepareForValidation(): void
    {
        if ($this->bio === null) {
            $this->merge([
                'bio' => '',
            ]);
        }

        // if ($this->profile_pic === null) {
        //     $this->merge([
        //         'profile_pic' => 'profile_pics/default.png',
        //     ]);
        // }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'bio' => ['string'],
            'profile_pic' => ['image', 'mimes:jpeg,png,jpg', 'max:2048']
        ];
    }
}
