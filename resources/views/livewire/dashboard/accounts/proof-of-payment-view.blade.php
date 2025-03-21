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
                                    <a href="{{ 'https://app.capexfinancialservices.org/storage/' . ($proof->document_paths[0] ?? 'default.pdf') }}" target="_blank"
                                        class="px-4 py-1 text-white rounded" style="background: #17a2b8;">
                                        View Proof
                                    </a>
                                    <button wire:click="acceptProof({{ $proof->id }})"
                                        class="px-4 py-1 text-white rounded" style="background: #28a745;">
                                        Accept
                                    </button>
                                    <button wire:click="declineProof({{ $proof->id }})"
                                        class="px-4 py-1 text-white rounded" style="background: #ffc107;">
                                        Decline
                                    </button>
                                    <button wire:click="removeProof({{ $proof->id }})"
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
</div>
