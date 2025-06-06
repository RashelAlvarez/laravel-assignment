<?php

namespace App\Jobs;

use App\Services\Comment\CommentCountInterface;
use App\Services\Comment\CommentCountService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CommentsPerUserJob implements ShouldQueue
{
    use Queueable;
    protected $commentCountService;
    protected $uuid;

    /**
     * Create a new job instance.
     */
    public function __construct(CommentCountInterface $commentCountService)
    {
        $this->commentCountService = $commentCountService;
        $this->uuid = Str::uuid();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $userCommentCounts = $this->commentCountService->getCommentCounts();
        if (empty($userCommentCounts)) {
            Log::warning('No se encontraron comentarios para exportar.');
        }
        $timestamp = now()->toIso8601String();

        foreach ($userCommentCounts as $user) {
            Log::channel('single')->info("{$timestamp} - CommentsPerUserJob[{$this->uuid}] Processed comment counts for user_id={$user['user_id']}: total={$user['comment_count']}");
        }

        #Log::info('User comment counts calculated successfully.', ['counts' => $userCommentCounts]);
        Storage::disk('local')->put('user_comment_counts.json', json_encode($userCommentCounts));
    }
}
