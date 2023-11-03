@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update User' : 'Add User' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Info</li>
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
                        <a href="{{route('user-management.user.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View User Info</a>
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
                        <form method="post" action="{{(isset($editData))?(route('user-management.user.update',$editData->id)):route('user-management.user.store')}}" id="myForm">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" value="" class="name form-control " name="" placeholder="Default User Password:1234" disabled> @error('name')
                                            <span class="invalid-feedback" role="alert" >
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input id="name" type="text" value="{{ !empty($editData['name'])? $editData['name'] : old('name') }}" class="name form-control @error('name') is-invalid @enderror" name="name" placeholder="User Name"> @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input id="email" type="text" value="{{ !empty($editData['email'])? $editData['email'] : old('email') }}" class="email form-control @error('email') is-invalid @enderror" name="email" placeholder="Email"> @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
                                            <label class="control-label">Role</label>
                                            <select id="role" name="role_id" class="form-control select2 @error('role_id') is-invalid @enderror">
                                                <!-- <option value="">Select Type</option> -->
                                                <option value="">Select Role</option>
                                                @if(@$roles)
                                                @foreach($roles as $mn)
                                                <option value="{{ $mn->id }}" {{ $mn->id == @$editData['userRole']['role_id'] ? 'selected' : '' }}> {{ $mn->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div id="addextraRouteDiv"></div>
                                <div class="row">
                                    <div class="col-sm-5">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info btn-sm">{{(@$editData) ? 'Update ' : 'Save'}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
