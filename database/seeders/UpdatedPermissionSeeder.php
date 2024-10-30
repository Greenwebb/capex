<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UpdatedPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Deleting 'review loan' permission and syncing roles
        $permissionToDelete = Permission::where('name', 'review loan')
        ->where('name', 'review loan')
        ->where('name', 'view loan history')
        ->where('name', 'view loan statements')
        ->where('name', 'view system settings')
        ->where('name', 'change system settings')
        ->where('name', 'view loan history')
        ->where('name', 'make payments')
        ->where('name', 'disburse funds')
        ->where('name', 'withdraw funds')
        ->where('name', 'view pending')
        ->where('name', 'make repayments')
        ->where('name', 'make proof payment')
        ->first();
        if ($permissionToDelete) {
            $permissionToDelete->delete();
        }
        
        // Assign roles if needed
        $role1 = Role::findByName('admin');
        $role4 = Role::findByName('operations manager');
        $role3 = Role::findByName('loan officer');

        // Sync roles to a permission (if permission still exists after deletion check)
        if ($permissionToDelete) {
            $permissionToDelete->syncRoles([$role1, $role4, $role3]);
        }

        // Creating permissions
        Permission::firstOrCreate(['name' => 'asses loans', 'group' => 'loan', 'permission' => 'Asses/Review Loans', 'description' => 'Asses/Review Loans']);
        Permission::firstOrCreate(['name' => 'approve loans', 'group' => 'loan', 'permission' => 'Approve Loans', 'description' => 'Approve Loans']);
        Permission::firstOrCreate(['name' => 'open loans', 'group' => 'loan', 'permission' => 'Open Loans', 'description' => 'Open Loans']);
        Permission::firstOrCreate(['name' => 'closed loans', 'group' => 'loan', 'permission' => 'Closed Loans', 'description' => 'Closed Loans']);
        Permission::firstOrCreate(['name' => 'due loans', 'group' => 'loan', 'permission' => 'Due Loans', 'description' => 'Due Loans']);
        Permission::firstOrCreate(['name' => 'missed repayments', 'group' => 'loan', 'permission' => 'Missed Repayments', 'description' => 'Due Loans']);
        Permission::firstOrCreate(['name' => 'arrears', 'group' => 'loan', 'permission' => 'Loans in Arrears', 'description' => 'Due Loans']);
        Permission::firstOrCreate(['name' => 'no repayments', 'group' => 'loan', 'permission' => 'No Repayments', 'description' => 'Due Loans']);
        Permission::firstOrCreate(['name' => 'principal outstanding', 'group' => 'loan', 'permission' => 'Principal Outstanding', 'description' => 'Due Loans']);
        Permission::firstOrCreate(['name' => 'past maturity date', 'group' => 'loan', 'permission' => 'Past Maturity Date', 'description' => 'Due Loans']);
        Permission::firstOrCreate(['name' => 'late loans', 'group' => 'loan', 'permission' => 'Late Loans', 'description' => 'Due Loans']);
        
        Permission::firstOrCreate(['name' => 'make repayments','group'=>'accounts','permission'=>'make repayments', 'description' => 'Make payments to repay loans'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'make proof payment','group'=>'accounts','permission'=>'make repayments', 'description' => 'Make payments to repay loans'])->syncRoles([$role1]);
        
    }
}
