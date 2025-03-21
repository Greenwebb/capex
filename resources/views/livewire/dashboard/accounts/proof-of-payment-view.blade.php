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
                                <td class="px-4 py-2">{{ $proof->id }}</td><td class="px-4 py-2">
                                    {{ \Illuminate\Support\Str::limit($this->getUserInfo($proof->user_id), 15, '...') }}
                                </td>
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
                                    <!-- Action buttons with improved design -->
                                    <td class="px-4 py-2">
                                        <div class="flex items-center gap-2">
                                            <!-- View Button -->
                                            <a href="{{ 'https://app.capexfinancialservices.org/public/storage/' . ($proof->document_paths[0] ?? 'default.pdf') }}"
                                            target="_blank"
                                            class="inline-flex items-center justify-center p-2 rounded-full transition-all duration-200 hover:bg-blue-100 group"
                                            title="View this proof of payment">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                    class="text-blue-500 group-hover:text-blue-600" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                </svg>
                                            </a>

                                            <!-- Accept Button -->
                                            <button wire:click="acceptProof({{ $proof->id }})"
                                                    class="inline-flex items-center justify-center p-2 rounded-full transition-all duration-200 hover:bg-green-100 group"
                                                    title="Accept this payment proof">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                    class="text-green-500 group-hover:text-green-600" viewBox="0 0 16 16">
                                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                                </svg>
                                            </button>

                                            <!-- Decline Button -->
                                            <button wire:click="declineProof({{ $proof->id }})"
                                                    class="inline-flex items-center justify-center p-2 rounded-full transition-all duration-200 hover:bg-amber-100 group"
                                                    title="Decline this payment proof">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                    class="text-amber-500 group-hover:text-amber-600" viewBox="0 0 16 16">
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </button>

                                            <!-- Delete Button -->
                                            <button wire:click="removeProof({{ $proof->id }})"
                                                    class="inline-flex items-center justify-center p-2 rounded-full transition-all duration-200 hover:bg-red-100 group"
                                                    title="Remove this payment proof">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                    class="text-red-500 group-hover:text-red-600" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
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
