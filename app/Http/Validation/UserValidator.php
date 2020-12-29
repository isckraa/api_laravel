<?php

namespace App\Http\Validation;

class UserValidator {
    public function rules(): array
    {
        return array(
            'email' => ['required', 'email', 'string', 'unique:users', 'max:150', 'min:3'],
            'username' => ['required', 'string', 'max:150', 'min:3'],
            'password' => ['required', 'string', 'min:4'],
            'confirm_password' => ['required', 'same:password'],
            'terms' => ['required', 'boolean'],
        );
    }

    public function messages(): array
    {
        return array(
            'email.required' => 'L\'email est obligatoire.',
            'email.max' => 'L\'email ne doit pas dépasser 150 caractères.',
            'email.min' => 'L\'email doit contenir au moins 3 caractères.',
            'email.unique' => 'L\'email est déjà utilisé.',
            'username.required' => 'Le nom est obligatoire.',
            'username.max' => 'Le nom ne doit pas dépasser 150 caractères.',
            'username.min' => 'Le nom doit contenir au moin 3 caractères.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 4 caractères.',
            'confirm_password.required' => 'La confirmation du mot de passe est obligatoire',
            'confirm_password.same' => 'Les deux mots de passes ne sont pas identiques.',
            'terms.required' => 'L\'acceptation des conditions d\'utilisation est obligatoire.'
        );
    }
}
