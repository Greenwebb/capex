<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                    <h4 class="mb-sm-0">Guarantors</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Guarantors</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <div class="alert alert-info" role="alert">
            List of all Guarantors/ Next of Kin with respective borrowers
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Gurantors</h5>
                    </div>
                    <div class="card-body">
                        <table id="guarantorTable" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name.</th>
                                    <th>Gender.</th>
                                    <th>Mobile</th>
                                    <th>Borrower</th>
                                    <th>Relationship</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($noks as $user)
                                    @if ($user->fname != null && $user->lname != null)
                                        <tr>
                                            <td>{{ $user->fname.' '.$user->lname }} </td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->phone ?? '--' }}</td>
                                            <td><a href="javascript:void(0);"><strong>{{ $user->gemail }}</strong></a></td>
                                            {{-- <td><a href="javascript:void(0);"><strong>{{ $user->user->fname.' '.$user->user->lname }}</strong></a></td> --}}
                                            <td>{{ $user->relation }}</td>
                                        </tr>
                                    @endif
                                @empty
                                <div class="intro-y col-span-12 md:col-span-6">
                                    <div class="box text-center">
                                        <p>No User Found</p>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
