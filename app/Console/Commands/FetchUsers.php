<?php

namespace App\Console\Commands;

use App\Services\user\UserService;
use Illuminate\Console\Command;

class FetchUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch users from JsonPlaceholder API and store them in the database';
    protected $userService;

    public function __construct(UserService $userService)
    {
        parent::__construct();
        $this->userService = $userService;
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->userService->getUsers();
            $this->info('Users fetched successfully.');
        } catch (\Throwable $th) {
            $this->error('Error fetching users: ' . $th->getMessage());
        }
    }
}
