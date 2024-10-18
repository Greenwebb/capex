<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Application;

class UpdateApplicationUserId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:application-userid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update application user_id based on matching emails between applications and users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch all applications
        $applications = Application::all();
        $updatedCount = 0;

        // Loop through each application
        foreach ($applications as $application) {
            // Find the user with the same email as the application's email
            $user = User::where('email', $application->email)->first();

            // If a matching user is found, update the user_id of the application
            if ($user) {
                // Update user_id if it's different
                if ($application->email === $user->email) {
                    $application->user_id = $user->id;
                    $application->save();
                    $updatedCount++;
                    $this->info("Updated Application ID: {$application->id} with User ID: {$user->id}");
                }
            } else {
                $this->warn("No user found for Application ID: {$application->id} with email: {$application->email}");
            }
        }

        $this->info("Total applications updated: {$updatedCount}");

        return 0;
    }
}

