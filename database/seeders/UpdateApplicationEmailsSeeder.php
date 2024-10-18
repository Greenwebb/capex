<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Application;
use App\Models\User;

class UpdateApplicationEmailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all applications that don't have an email set
        $applications = Application::whereNull('email')->get();

        foreach ($applications as $application) {
            // Find the user associated with the application
            $user = User::find($application->user_id);

            // If a user is found, update the application's email with the user's email
            if ($user) {
                $application->email = $user->email;
                $application->save();
            }
        }
    }
}
