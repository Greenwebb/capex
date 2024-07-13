<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Classes\Exports\GuarantorExport;
use App\Models\Application;
use App\Models\NextOfKing;
use App\Models\References;
use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class GuarantorsView extends Component
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
        $roles = Role::orderBy('id','DESC')->paginate(5);

        $noks = NextOfKing::get();
        $refs = References::get();

        return view('livewire.dashboard.loans.guarantors-view',[
            'noks' => $noks,
            'refs' => $refs
        ])->layout('layouts.main');
    }
    public function exportGuarantors(){
        return Excel::download(new GuarantorExport, 'Guarantors.xlsx');
    }
}
