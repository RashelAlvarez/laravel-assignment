<?php

namespace App\Services\user;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserService implements UserInterface
{
    protected $apiUrl;
    public function __construct()
    {
        $this->apiUrl = 'https://jsonplaceholder.typicode.com';
    }

    public function getUsers()
    {
        try {
            $response = Http::get("{$this->apiUrl}/users");
            if ($response->successful()) {
                $users = $response->json();
                foreach ($users as $key => $value) {
                    User::updateOrCreate(
                        ['id' => $value['id']],
                        [
                            'name' => $value['name'],
                            'username' => $value['username'],
                            'email' => $value['email'],
                            'address' => json_encode($value['address']),
                            'phone' => $value['phone'],
                            'website' => $value['website'],
                            'company' => json_encode($value['company']),
                        ]
                    );
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al obtener los usuarios de la API'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getUserById(int $id)
    {
        try {
            $response = Http::get("{$this->apiUrl}/users/{$id}");
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al obtener el usuario', $id], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
