<?php

namespace App\Console\Commands;

use App\Jobs\CommentsPerUserJob;
use App\Services\Comment\CommentCountInterface;
use App\Services\Comment\CommentCountService;
use Illuminate\Console\Command;

class ExecuteCommentsPerUserJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'execute:comments-per-user-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the CommentsPerUserJob to calculate comment counts per user and store them in a JSON file';
    protected $commentCountService;

    public function __construct(CommentCountInterface $commentCountService)
    {
        parent::__construct();
        $this->commentCountService = $commentCountService;
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        if (!$this->commentCountService) {
            return $this->error('CommentCountService is not available.');
        } else {
            CommentsPerUserJob::dispatch($this->commentCountService);
            $this->info('CommentsPerUserJob has been dispatched successfully.');
        }
    }
}
