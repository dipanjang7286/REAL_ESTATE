@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ul class="breadcrumb">
                <a href="{{route('add.propertyType')}}" class="btn btn-outline-info">Add Property Type</a>
            </ul>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Type</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Property Type</th>
                                        <th>Property Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($type as $key => $value)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->type_name}}</td>
                                            <td>{{$value->type_icon}}</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary">Edit</a>
                                                <a href="#" class="btn btn-outline-danger">Delete</a>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

<script>
    let table = new DataTable('#myTable');
</script>
