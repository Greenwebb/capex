
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
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
        <!-- end page title -->
        <table class="table align-middle table-nowrap" id="proofTable">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Payment Method</th>
                    <th class="px-4 py-2">Payment Method</th>
                    {{-- <th class="px-4 py-2">Status</th> --}}
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paymentProofs as $proof)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $proof->id }}</td>
                        <td class="px-4 py-2">{{ $this->getUserInfo($proof->user_id) }}</td>
                        <td class="px-4 py-2">{{ $proof->amount }}</td>
                        <td class="px-4 py-2">{{ $proof->method }}</td>
                        <td class="px-4 py-2">{{ $proof->details ?? 'No Details Available'}}</td>
                        <td class="px-4 py-2">
                        {{-- @dd($proof->document_paths[0]) --}}
                         <span class="px-2 py-1 rounded-full text-light {{ $proof->status == 'accepted' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($proof->status) }}
                            </span> 
                        </td>
                        <td class="px-4 py-2 space-x-4">
                            <a href="{{ 'https://app.capexfinancialservices.org/storage/app/public/' . $proof->document_paths[0] }}" target="_blank" class="px-4 py-1 text-white rounded bg-info">Proof</a>
                        
                            <button wire:click="acceptProof({{ $proof->id }})" class="px-4 py-1 text-white rounded bg-success">Accept</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $paymentProofs->links() }}
    </div>
</div>
