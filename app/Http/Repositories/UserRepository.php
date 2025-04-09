<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
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
    public function delete(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'Utente cancellato con successo.'
        ], 200);
    }
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }
}
