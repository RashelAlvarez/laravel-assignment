<?php

namespace App\Services\comment;

use App\Models\Comment;
use App\Services\comment\CommentInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class CommentService implements CommentInterface
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = 'https://jsonplaceholder.typicode.com';
    }

    public function getComments()
    {
        try {
            $response = Http::get("{$this->apiUrl}/comments");
            if ($response->successful()) {
                $comments = $response->json();
                foreach ($comments as $key => $value) {
                    Comment::updateOrCreate(
                        ['id' => $value['id']],
                        [
                            'post_id' => $value['postId'],
                            'name' => $value['name'],
                            'email' => $value['email'],
                            'body' => $value['body'],
                        ]
                    );
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al obtener los comentarios de la API'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getCommentsById(int $id)
    {
        try {
            $response = Http::get("{$this->apiUrl}/comments/{$id}");
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al obtener el comentario', $id], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
