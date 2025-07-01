<head>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="min-h-screen bg-gray-50 page-content">
    <!-- start page title -->
    <div class="flex flex-col justify-between items-center px-6 py-4 bg-white border-b border-gray-200 md:flex-row">
        <h4 class="mb-2 text-xl font-bold text-gray-800 md:mb-0">Borrower Information</h4>
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
                <li>/</li>
                <li><a href="{{ route('borrowers') }}" class="hover:underline">Borrowers</a></li>
                <li>/</li>
                <li class="text-gray-700">Borrower Information</li>
                    </ol>
        </nav>
    </div>
    <div class="container px-4 py-6 mx-auto">
        <div class="flex flex-col items-start mb-6 md:flex-row md:space-x-6">
            <div class="flex flex-row flex-wrap gap-2 items-center md:gap-4">
            @if ($user->photos->isNotEmpty())
                @foreach ($user->photos as $photo)
                    @php
                        $photoPath = $photo->source === 'admin'
                            ? url('public/storage/' . $photo->path)
                            : 'https://app.capexfinancialservices.org/' . $photo->path;
                    @endphp
                        <img src="{{ $photoPath }}" alt="user-img" class="object-cover w-24 h-24 rounded-lg border-2 border-gray-200 shadow" />
                @endforeach
            @else
                @php
                    $defaultImage = 'public/assets/images/user.png';
                    if ($user->gender === 'Female') {
                        $defaultImage = 'public/assets/images/girl.png';
                    } elseif ($user->gender === 'Male') {
                        $defaultImage = 'public/assets/images/boy.png';
                    }
                @endphp
                    <img src="{{ $defaultImage }}" alt="user-img" class="object-cover w-24 h-24 rounded-lg border-2 border-gray-200 shadow" />
            @endif
        </div>
            <div class="flex-1 mt-4 md:mt-0">
                <h2 class="mb-1 text-2xl font-semibold text-gray-800">{{ $user->fname.' '.$user->lname }}</h2>
                <div class="flex flex-wrap gap-2 mb-2 text-sm text-gray-500">
                    <span class="inline-flex items-center"><i class="mr-1 text-yellow-500 ri-card-line"></i><b>{{ $user->uuid }}</b></span>
                    <span class="inline-flex items-center"><i class="mr-1 text-yellow-500 ri-map-pin-user-line"></i>{{ $user->address ?? 'No Address' }}</span>
                            @if ($user->occupation || $user->jobTitle)
                        <span class="inline-flex items-center"><i class="mr-1 text-yellow-500 ri-building-line"></i>{{ $user->jobTitle ?? $user->occupation ?? 'No Occupation' }}</span>
                            @endif
                        </div>
                <div class="flex flex-wrap gap-2 text-xs text-gray-400">
                    <span><i class="mr-1 text-yellow-500 ri-card-line"></i><b>{{ $user->usource }}</b></span>
                            </div>
                        </div>
            <div class="flex flex-col mt-4 md:items-end md:ml-auto md:mt-0">
                <div class="flex space-x-6">
                    <div class="text-center">
                        <h4 class="text-lg font-bold text-blue-600">K{{ App\Models\Loans::customer_balance($user->id) }}</h4>
                        <p class="text-xs text-gray-500">Current Amount Owing</p>
                    </div>
                    <div class="text-center">
                        <h4 class="text-lg font-bold text-green-600">K{{ App\Models\Loans::customer_total_borrowed($user->id) }}</h4>
                        <p class="text-xs text-gray-500">Overall Total Amount Borrowed</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
            <!-- Basic & Personal Information -->
            <div class="p-6 bg-white rounded-lg shadow">
                <h5 class="mb-4 text-lg font-semibold text-gray-700">Basic & Personal Information</h5>
                <div class="space-y-2 text-sm">
                    <div><span class="font-semibold text-yellow-600">Full Name:</span> <span class="text-gray-700">{{ $user->fname.' '.$user->lname }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Date of Birth:</span> <span class="text-gray-700 uppercase">{{ $user->dob ?? 'Unknown' }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Gender:</span> <span class="text-gray-700 uppercase">{{ $user->gender ?? 'Unknown' }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Mobile:</span> <span class="text-gray-700">{{ $user->phone ?? 'Unknown' }}</span></div>
                    <div><span class="font-semibold text-yellow-600">E-mail:</span> <span class="text-gray-700">{{ $user->email ?? 'Unknown' }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Location:</span> <span class="text-gray-700">{{ $user->address ?? 'No Address' }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Joined Date:</span> <span class="text-gray-700">{{ $user->created_at->toFormattedDateString() }}</span></div>
                                                    </div>
                                                </div>
            <!-- Next of Kin -->
            <div class="p-6 bg-white rounded-lg shadow">
                <h5 class="mb-4 text-lg font-semibold text-gray-700">Next of Kin</h5>
                <div class="space-y-2 text-sm">
                    <div><span class="font-semibold text-yellow-600">Fullnames:</span> <span class="text-gray-700">{{ $user->nokfname.' '.$user->noklname ?? 'Unknown' }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Phone Number:</span> <span class="text-gray-700">{{ $user->nokphone ?? 'No Phone' }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Date of Birth:</span> <span class="text-gray-700">{{ $user->nokDob ?? 'No Record' }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Email Address:</span> <span class="text-gray-700">{{ $user->nokemail ?? 'No Email' }}</span></div>
                                            </div>
                                        </div>
            <!-- Employment Details -->
            <div class="p-6 bg-white rounded-lg shadow">
                <h5 class="mb-4 text-lg font-semibold text-gray-700">Employment Details</h5>
                <div class="space-y-2 text-sm">
                    <div><span class="font-semibold text-yellow-600">Employer:</span> <span class="text-gray-700">{{ $user->employer }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Job Title:</span> <span class="text-gray-700">{{ $user->jobTitle ?? $user->occupation }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Employer Contacts:</span> <span class="text-gray-700">{{ $user->address2 }} {{ $user->phone }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Employer Address:</span> <span class="text-gray-700">{{ $user->empaddress }}</span></div>
                    <div><span class="font-semibold text-yellow-600">Employer Email:</span> <span class="text-gray-700">{{ $user->empemail }}</span></div>
                                                </div>
                                            </div>
            <!-- Supporting Documents -->
            <div class="p-6 bg-white rounded-lg shadow">
                <h5 class="mb-4 text-lg font-semibold text-gray-700">Supporting Documents</h5>
                <div class="flex flex-wrap gap-4">
                                            @php
                                                function getFileUrl($upload) {
                                                    return $upload->source === 'admin'
                                                        ? url('public/' . Storage::url($upload->path))
                                                        : 'https://app.capexfinancialservices.org/public/' . Storage::url($upload->path);
                                                }
                                                function renderFileBlock($upload, $label, $user) {
                                                    return '
                                <a target="_blank" href="' . getFileUrl($upload) . '" class="block p-2 w-32 text-center bg-gray-50 rounded-lg border border-gray-300 border-dashed transition hover:bg-blue-50">
                                    <div class="flex flex-col justify-center items-center h-24">
                                        <svg class="mb-2 w-8 h-8 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                                        <span class="text-xs text-gray-700">' . $user->fname . ' ' . $user->lname . '\'s ' . $label . '</span>
                                                                                </div>
                                    <div class="mt-1 text-xs text-gray-400">' . $upload->created_at->toFormattedDateString() . '</div>
                                                        </a>';
                                                }
                                            @endphp
                                            @if ($user->uploads->where('name', 'nrc_file')->isNotEmpty())
                                                {!! renderFileBlock($user->uploads->where('name', 'nrc_file')->first(), 'NRC Front', $user) !!}
                                            @endif
                                            @if ($user->uploads->where('name', 'nrc_b_file')->isNotEmpty())
                                                {!! renderFileBlock($user->uploads->where('name', 'nrc_b_file')->first(), 'NRC Back', $user) !!}
                                            @endif
                                            @if ($user->uploads->where('name', 'tpin_file')->isNotEmpty())
                                                {!! renderFileBlock($user->uploads->where('name', 'tpin_file')->first(), 'TPIN', $user) !!}
                                            @endif
                                            @if ($user->uploads->where('name', 'payslip_file')->isNotEmpty())
                                                {!! renderFileBlock($user->uploads->where('name', 'payslip_file')->first(), 'Payslip', $user) !!}
                                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
