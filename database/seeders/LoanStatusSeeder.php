<?php

namespace Database\Seeders;

use App\Models\LoanChildType;
use App\Models\LoanStatus;
use App\Models\LoanType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;

        for ($i = 1; $i < 4; $i++) { 
            LoanStatus::create([
                'loan_product_id' => 1,
                'status_id' => $i,
                'stage' => 'processing',
                'step' => $i + 1,
            ]);
        
            $count += 1; // Increment by 1 in each iteration
        }
        
        for ($i=1; $i < 5; $i++) { 
            LoanStatus::create(
                [
                    'loan_product_id' => 1,
                    'status_id' => $i + $count,
                    'stage' => 'open',
                    'step' => $i + 1,
                ]
            );
            $count += 1;
        }

        for ($i=1; $i < 9; $i++) { 
            LoanStatus::create(
                [
                    'loan_product_id' => 1,
                    'status_id' => $i + $count,
                    'stage' => 'defaulted',
                    'step' => $i + 1,
                ]
            );
            $count += 1;
        }

        for ($i=1; $i < 6; $i++) { 
            LoanStatus::create(
                [
                    'loan_product_id' => 1,
                    'status_id' => $i + $count,
                    'stage' => 'denied',
                    'step' => $i + 1,
                ]
            );
            $count += 1;
        }

        for ($i=1; $i < 4; $i++) { 
            LoanStatus::create(
                [
                    'loan_product_id' => 1,
                    'status_id' => $i + $count,
                    'stage' => 'Not Taken Up',
                    'step' => $i + 1,
                ]
            );
        }


        LoanType::create([
            'name' => 'Personal',
            'type_name' => 'Personal',
        ]);

        LoanType::create(
        [
            'name' => 'Business',
            'type_name' => 'Business',
        ]);

        LoanChildType::create([
            'name' => 'Auto Loan',
            'type_name' => 'Auto Loan',
            'loan_type_id' => 1,
        ]);

        LoanChildType::create([
            'name' => 'House Mortage Loan',
            'type_name' => 'House Mortage Loan',
            'loan_type_id' => 1,
        ]);

        LoanChildType::create([
            'name' => 'MOU',
            'type_name' => 'MOU',
            'loan_type_id' => 2,
        ]);
    }
}
