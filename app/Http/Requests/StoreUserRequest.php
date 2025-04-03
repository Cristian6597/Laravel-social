<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determina se l'utente è autorizzato a fare questa richiesta.
     */
    /*  public function authorize(): bool
    {
        // Controlla se l'utente autenticato ha il permesso 'users:create'
        return $this->user()?->tokenCan('users:create') ?? false;
    } */

    /**
     * Ottiene le regole di validazione per questa richiesta.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
