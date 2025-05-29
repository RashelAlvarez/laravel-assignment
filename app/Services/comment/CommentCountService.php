<?php

namespace App\Services\Comment;

use App\Models\User;
use App\Models\Post;

class CommentCountService implements CommentCountInterface
{

    public function getCommentCounts(): array
    {
        $userCommentCounts = [];
        $users = User::all();

        foreach ($users as $user) {
            $commentCount = Post::where('user_id', $user->id)
                ->withCount('comments')
                ->get()
                ->sum('comments_count');
            $userCommentCounts[] = [
                'user_id' => $user->id,
                'name' => $user->name,
                'comment_count' => $commentCount,
            ];
        }
        return $userCommentCounts;
    }
}
