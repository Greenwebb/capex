<?php

namespace App\Traits;

use App\Mail\LoanApplication;
use App\Mail\LoanEquiry;
use App\Models\Application;
use App\Models\User;
use App\Notifications\LoanRemainder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Mail\ContactEmail;
use App\Mail\SharedForms;
use App\Mail\YourAccount;
use App\Notifications\LoanRequestAccepted;
use App\Notifications\LoanRequestDeclined;
use App\Notifications\NewLoanEmail;
use Illuminate\Support\Facades\Log;

trait EmailTrait{

    // This method sends a contact message from the "Contact Us" page
    public function send_new_account_info($details, $user){
        try {
            // Create a new instance of YourAccount Mailable with details
            $info = new YourAccount($details);

            // Send the email
            Mail::to($user->email)->send($info);

            return true; // If email sent successfully
        } catch (\Throwable $th) {
            // Log the error for debugging
            Log::error('Error sending new account info email: ' . $th->getMessage());
            return false; // Return false if email fails to send
        }
    }

    // This email send a contact message from contact us page /////////////
    public function send_contact_email($details){
        try {
            // dispatch(new SendLoanRequestEmailJob($details));
            $contact_email = new ContactEmail($details);
            Mail::to($this->emailData['to'])->send($contact_email);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    // This email notifies the administrator about a new loan request //////////////////
    public function send_loan_email($data){
        $admin = User::first();
        $me = auth()->user();
        try {
            Notification::send($admin, new NewLoanEmail($data));
            return true;
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }

    }

    // This email notifies the customer email that their application for a loan has been sumbitted //////
    public function send_loan_feedback_email($data){
        try {
            $contact_email = new LoanApplication($data);
            Mail::to($data['to'])->send($contact_email);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


    // This email sends details to the administrator for prospect customer loan enqury
    public function send_loan_enquiry($data){
        $admin = User::first();
        try {
            Mail::to($admin->email)->send(new LoanEquiry($data));
        } catch (\Throwable $th) {
            return $th;
        }
    }


    // This email send a contact message from contact us page /////////////
    public function send_loan_remainder($data, $user){
        try {
            Notification::send($user, new LoanRemainder($data));
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    // This email send a attachement of Preaproval Forms /////////////
    public function send_pre_approval_forms($email){
        try {
            $data = Application::currentApplication();
            $forms = new SharedForms($data);
            Mail::to($email)->cc(auth()->user()->email)->send($forms);
            return true;
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    // Approval Process loans
    public function send_loan_processing_notification($data){
        $borrower = User::first();
        $me = auth()->user();
        try {
            Notification::send($borrower, new LoanRequestAccepted($data));
            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }
    public function send_loan_accepted_notification($data){
        $borrower = User::where('id', $data['user_id'])->first();
        $me = auth()->user();
        try {
            Notification::send($borrower, new LoanRequestAccepted($data));
            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }

    public function send_loan_declined_notification($data){
        $borrower = User::where('id', $data['user_id'])->first();
        $me = auth()->user();
        try {
            Notification::send($borrower, new LoanRequestDeclined($data));
            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }

}
