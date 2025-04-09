<div wire:ignore.self class="modal fade" id="kt_modal_decline_warning" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="border-0 shadow-lg modal-content">
            <form wire:submit.prevent="rejectOnly">
                @csrf
                <input type="hidden" wire:model="loan_id" name="application_id">
                <div class="py-3 modal-header bg-danger" id="kt_modal_add_customer_header">
                    <h2 class="m-0 text-white fw-bold">Decline Loan Request</h2>
                    <button wire:click="$emit('closeModal')" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                <div class="py-4 modal-body">
                    <div class="mb-4 settings">
                        <div wire:loading.remove wire:target="rejectOnly">
                            <div class="mb-4 alert alert-warning d-flex align-items-center" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="flex-shrink-0 bi bi-exclamation-triangle-fill me-3" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                <div>
                                    When the loan is declined, it will not continue being processed and will be set as a Denied Loan. Are you sure you want to decline this loan application? If you have any doubts or need further assistance, feel free to ask for help.
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold" for="denied_status">Denied Status</label>
                                <select class="form-select" wire:model="picked_status" id="denied_status">
                                    <option value="">Select a status</option>
                                    @foreach ($denied_status as $status)
                                        <option value="{{$status->name}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold" for="reason">State your reason</label>
                                <textarea class="form-control" wire:model="reason" id="reason" rows="4" placeholder="Please provide a detailed reason for declining this loan request."></textarea>
                            </div>
                            <div class="gap-2 d-flex justify-content-end">
                                <button wire:click="$emit('closeModal')" type="button" class="btn btn-light">Cancel</button>
                                <button type="submit" class="btn btn-danger">Decline Loan</button>
                            </div>
                        </div>
                        
                        <div wire:loading wire:target="rejectOnly" class="text-center">
                            <div class="gap-3 d-flex justify-content-center align-items-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="m-0">Sending feedback to borrower, please wait...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>