<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="bg-transparent page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Proof of Payments</h4>
                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Proof of Payments</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flash Message Notifications -->
            <div id="flash-message" class="alert d-none"></div>

            <!-- Proof of Payments Table -->
            <div class="table-responsive">
                <table class="table align-middle table-nowrap">
                    <thead>
                        <tr style="background: #f3f4f6; text-align: left;">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">User</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Payment Method</th>
                            <th class="px-4 py-2">Details</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paymentProofs as $proof)
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td class="px-4 py-2">{{ $proof->id }}</td>
                                <td class="px-4 py-2">{{ $this->getUserInfo($proof->user_id) }}</td>
                                <td class="px-4 py-2">${{ number_format($proof->amount, 2) }}</td>
                                <td class="px-4 py-2">{{ $proof->method }}</td>
                                <td class="px-4 py-2">{{ $proof->details ?? 'No Details Available' }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-3 py-1 text-sm font-medium rounded-full"
                                        style="background-color: {{ $proof->status == 'accepted' ? '#d1fae5' : ($proof->status == 'pending' ? '#fef3c7' : '#fee2e2') }};
                                        color: {{ $proof->status == 'accepted' ? '#065f46' : ($proof->status == 'pending' ? '#92400e' : '#b91c1c') }};">
                                        {{ ucfirst($proof->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ asset('storage/' . ($proof->document_paths[0] ?? 'default.pdf')) }}" target="_blank"
                                        class="px-4 py-1 text-white rounded" style="background: #17a2b8;">
                                        View Proof
                                    </a>
                                    <button onclick="confirmAction('Accept', {{ $proof->id }})"
                                        class="px-4 py-1 text-white rounded" style="background: #28a745;">
                                        Accept
                                    </button>
                                    <button onclick="confirmAction('Decline', {{ $proof->id }})"
                                        class="px-4 py-1 text-white rounded" style="background: #ffc107;">
                                        Decline
                                    </button>
                                    <button onclick="confirmAction('Delete', {{ $proof->id }})"
                                        class="px-4 py-1 text-white rounded" style="background: #dc3545;">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $paymentProofs->links() }}
            </div>
        </div>
    </div>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmAction(action, proofId) {
            let actionText = action.toLowerCase();
            let actionColor = action === 'Accept' ? '#28a745' : (action === 'Decline' ? '#ffc107' : '#dc3545');
            let actionFunction = action === 'Accept' ? 'acceptProof' : (action === 'Decline' ? 'declineProof' : 'removeProof');

            Swal.fire({
                title: `Are you sure?`,
                text: `You are about to ${actionText} this proof of payment.`,
                icon: action === 'Delete' ? 'warning' : 'info',
                showCancelButton: true,
                confirmButtonColor: actionColor,
                cancelButtonColor: '#6c757d',
                confirmButtonText: `Yes, ${actionText} it!`
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit(actionFunction, proofId);
                }
            });
        }

        window.addEventListener('notify', event => {
            Swal.fire({
                position: 'top-end',
                icon: event.detail.type,
                title: event.detail.message,
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>

</div>
