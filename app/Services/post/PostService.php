<?php

namespace App\Services\post;

use App\Services\post\PostInterface;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use Illuminate\Http\Response;

class PostService implements PostInterface
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = 'https://jsonplaceholder.typicode.com';
    }
    public function getPosts()
    {
        try {
            $response = Http::get("{$this->apiUrl}/posts");
            if ($response->successful()) {
                $posts = $response->json();
                foreach ($posts as $post) {
                    Post::updateOrCreate(
                        ['id' => $post['id']],
                        [
                            'user_id' => $post['userId'],
                            'title' => $post['title'],
                            'body' => $post['body'],
                        ]
                    );
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al obtener los posts de la API'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPostById(int $id): mixed
    {
        try {
            $response = Http::get("{$this->apiUrl}/posts/{$id}");
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al obtener el post', $id], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getPostsByUserId(int $userId): mixed
    {
        try {
            $response = Http::get("{$this->apiUrl}/posts?userId={$userId}");
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al obtener los posts del usuario', $userId], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
