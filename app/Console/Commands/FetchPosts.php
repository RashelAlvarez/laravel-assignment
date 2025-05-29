<?php

namespace App\Console\Commands;

use App\Services\post\PostService;
use Illuminate\Console\Command;

class FetchPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from JsonPlaceholder API and store them in the database';
    protected $postService;

    public function __construct(PostService $postService)
    {
        parent::__construct();
        $this->postService = $postService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        try {
            $posts = $this->postService->getPosts();
            $this->info('Posts fetched successfully.');
        } catch (\Throwable $th) {
            $this->error('Error fetching posts: ' . $th->getMessage());
        }
    }
}
