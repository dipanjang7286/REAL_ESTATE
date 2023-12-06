@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Add Property Type</h6>

                                <form class="forms-sample" action="{{ route('store.propertyType') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="type_name" class="form-label">Property Type</label>
                                        <input type="text"
                                            class="form-control @error('type_name') is-invalid @enderror"
                                            id="type_name" name="type_name">
                                        @error('type_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="type_icon" class="form-label">Property Type Icon</label>
                                        <input type="text"
                                            class="form-control @error('type_icon') is-invalid @enderror"
                                            id="type_icon" name="type_icon">
                                        @error('type_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary me-2">Add Property Type</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
