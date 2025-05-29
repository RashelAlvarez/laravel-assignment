<?php

namespace App\Console\Commands;

use App\Services\comment\CommentService;
use Illuminate\Console\Command;

class FetchComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:comments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch comments from JsonPlaceholder API and store them in the database';
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        parent::__construct();
        $this->commentService = $commentService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->commentService->getComments();
            $this->info('Comments fetched successfully.');
        } catch (\Throwable $th) {
            $this->error('Error fetching comments: ' . $th->getMessage());
        }
    }
}
