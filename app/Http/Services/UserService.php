<?php

namespace App\Http\Services;

use App\Models\User;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    // Dichiarazione della repository per gestire l'accesso ai dati
    protected $userRepository;

    /**
     * Costruttore della classe UserService.
     * Laravel utilizza Dependency Injection per passare automaticamente UserRepository.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Crea un nuovo utente nel database.
     *
     * @param array $data - I dati dell'utente ricevuti dalla richiesta HTTP.
     * @return \App\Models\User - L'oggetto User appena creato.
     */
    public function create(array $data)
    {
        // Passa i dati alla Repository per gestire la creazione dell'utente
        return $this->userRepository->create($data);
    }

    public function delete(User $user)
    {
        return $this->userRepository->delete($user);
    }

    public function update(Request $request, User $user)
    {
        $user = $this->userRepository->update($request, $user);
        return $user;
    }
}
