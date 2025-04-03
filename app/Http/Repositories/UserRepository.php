<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * Crea un nuovo utente.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function create(array $data): User
    {
        // Hash della password prima di salvare
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        // Crea e restituisce l'utente
        return User::create($data);
    }
}
