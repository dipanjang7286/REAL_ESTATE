@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <div>
                                <img class="wd-100 ht-100 rounded-circle"
                                    src="{{ !empty($profileData->profile_image) ? url('upload/admin_image/' . $profileData->profile_image) : url('upload/no_image.jpg') }}"
                                    alt="profile">
                                <span class="h4 ms-3">{{ $profileData->name }}</span>
                            </div>

                        </div>

                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">User Name :</label>
                            <p class="text-muted">{{ $profileData->username }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email :</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone :</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address :</label>
                            <p class="tex t-muted">{{ $profileData->address }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="#" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="#" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="#" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Update Admin Password</h6>

                                <form class="forms-sample" action="{{route('admin.update.password')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="old_password" class="form-label">Old Password</label>
                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password">
                                        @error('old_password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password">
                                        @error('new_password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                        @error('new_password_confirmation')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Change Password</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection


