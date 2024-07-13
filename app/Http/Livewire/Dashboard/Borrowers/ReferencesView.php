<?php

namespace App\Http\Livewire\Dashboard\Borrowers;

use Livewire\Component;
use App\Models\NextOfKing;
use App\Models\References;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ReferencesView extends Component
{
    public $user_role, $permissions, $assigned_role;
    public $createModal = true;
    public $editModal = false;
    public $name, $fname, $lname, $phone, $address, $occupation, $nrc, $dob, $profile_photo_path, $gender, $loan_status, $basic_pay, $email;
    public $hold = '';
    public $style = '';

    public function render()
    {

        // $this->authorize('view loan relatives');
        $this->user_role = Role::pluck('name')->toArray();
        $this->permissions = Permission::get();
        $refs = References::get();

        return view('livewire.dashboard.borrowers.references-view',[
            'refs' => $refs
        ])->layout('layouts.main');
    }
}
