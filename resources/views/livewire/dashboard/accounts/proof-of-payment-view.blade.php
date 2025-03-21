<div>
    <div class="page-content">
        <div class="container-fluid">
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

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

            <!-- Flash Messages using SweetAlert -->
            @if(session()->has('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: "{{ session('success') }}",
                        confirmButtonColor: '#3085d6',
                    });
                </script>
            @endif

            @if(session()->has('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "{{ session('error') }}",
                        confirmButtonColor: '#d33',
                    });
                </script>
            @endif

            @if(session()->has('warning'))
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: "{{ session('warning') }}",
                        confirmButtonColor: '#ffc107',
                    });
                </script>
            @endif

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
                                <td class="px-4 py-2">K{{ number_format($proof->amount, 2) }}</td>
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
                                    <a title="View this proof of payment request" href="{{ 'https://app.capexfinancialservices.org/public/storage/' . ($proof->document_paths[0] ?? 'default.pdf') }}" target="_blank"
                                        class="px-4 py-1 text-white rounded flex items-center justify-center gap-2" style="background: #17a2b8;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                                            <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5M5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z"/>
                                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                                          </svg>
                                        {{-- <span>View Proof</span> --}}
                                    </a>

                                    <button title="Accept this proof of payment request" wire:click="acceptProof({{ $proof->id }})"
                                        class="px-4 py-1 text-white rounded flex items-center justify-center gap-2" style="background: #28a745;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z"/>
                                          </svg>
                                        {{-- <span>Accept</span> --}}
                                    </button>

                                    <button title="Decline this proof of payment request" wire:click="declineProof({{ $proof->id }})"
                                        class="px-4 py-1 text-white rounded flex items-center justify-center gap-2" style="background: #ffc107;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-slash-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708"/>
                                          </svg>
                                        {{-- <span>Decline</span> --}}
                                    </button>

                                    <button title="Remove this proof of payment request" wire:click="removeProof({{ $proof->id }})"
                                        class="px-4 py-1 text-white rounded flex items-center justify-center gap-2" style="background: #dc3545;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                          </svg>
                                        {{-- <span>Delete</span> --}}
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
</div>
