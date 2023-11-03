@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User Role</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Role</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h5 class="card-title">Monthly Recap Report</h5> -->
                        <!-- <a href="{{route('user-management.role.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> Add Role</a> -->

                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#model_add"></i> Add Role</button>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role Name</th>
                                    <th>Role Functionality</th>
                                    <th width="80">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(@$roles)

                                @foreach($roles as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$m->name}}</td>
                                    <td>{{$m->functionality}}</td>
                                    <td style="">
                                        <button type="button" class=" btn btn-primary btn-flat btn-sm edit_btn" data-name="{{ $m->name }}" data-id="{{ $m->id }}"><i class="fas fa-edit"></i></button>
                                        | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{route('user-management.role.delete')}}" data-id="{{ $m->id }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                              
                              @endif
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="model_add">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Add New Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('user-management.role.store')}}" id="myForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>User Role</label>
                        <input id="name" type="text" value="{{ !empty($editData->name)? $editData->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Role Name" required> @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="model_update">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Update Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('user-management.role.update')}}" id="myForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Role Name</label>
                        <input id="icon_name" type="text" value="{{  old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Role Name" required> @error('name')
                        
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                    <input id="icon_id" type="hidden" value="" class="form-control " name="id">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Update Role</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).on('click', '.edit_btn', function() {
    $("#model_update").modal('show');
    var nam = $(this).data('name');
    var id = $(this).data('id');
    $('#icon_name').attr('value', nam);
    // alert(id);
    $('#icon_id').attr('value', id);
});

</script>


@endsection
