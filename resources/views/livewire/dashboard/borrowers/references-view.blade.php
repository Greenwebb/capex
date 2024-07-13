<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                    <h4 class="mb-sm-0">References</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">References</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <div class="alert alert-danger" role="alert">
            This is <strong>Datatable</strong> page in wihch we have used <b>jQuery</b> with cnd link!
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Next Of Kins</h5>
                    </div>
                    <div class="card-body">
                        <table id="fixed-header" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>HR Names</th>
                                    <th>HR Contact</th>
                                    <th>Supervisor Names</th>
                                    <th>Supervisor Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($refs as $user)
                                        <tr>
                                            <td>{{ $user->hrFname.' '.$user->hrLname }} </td>
                                            <td>{{ $user->hrContactNumber }}</td>
                                            <td>{{ $user->supervisorFirstName.' '.$user->supervisorLastName }}</td>
                                            <td><a href="javascript:void(0);"><strong>{{ $user->supervisorContactNumber }}</strong></a></td>
                                        </tr>
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
