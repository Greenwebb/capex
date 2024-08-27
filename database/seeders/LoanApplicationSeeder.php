<?php
namespace Database\Seeders;

use App\Models\Application;
use App\Models\ApplicationStage;
use App\Models\LoanStatus;
use App\Models\ServiceCharge;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'fname' => 'John',
            'lname' => 'Doe',
            'email' => 'georgemunganga@gmail.com',
            'phone' => '0772147755',
            'password' => bcrypt('capex+1234'),
        ])->assignRole('user');

        $app = Application::create([
            'lname' => 'John',
            'fname' => 'Doe',
            'email' => 'georgemunganga@gmail.com',
            'phone' => '0772147755',
            'gender' => 'male',
            'type' => 'Normal',
            'repayment_plan' => 1,
            'amount' => 5000,
            'status' => 2,
            'user_id' => $user->id,
            'can_change' => 1,
            'complete' => 1,
            'nationality' => 'zambian',
            'continue' => 0,
            'is_assigned' => 0,
            'loan_product_id' => 1,
            'loan_child_type_id' => 1,
            'loan_type_id' => 1,
            'days_late' => 10
        ]);

        ApplicationStage::create([
            'application_id' => $app->id,
            'loan_status_id' => 1,
            'state' => 'current',
            'status' => 'verification',
            'stage' => 'processing',
            'prev_status' => 'current',
            'curr_status' => '',
            'position'=>1
        ]);
    }
}


