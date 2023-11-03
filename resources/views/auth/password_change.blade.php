@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Change Password' : 'Add Change Password' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
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
                        <!-- <a href="{{route('menu-management.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Menu</a> -->
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
                        <form action="{{ route('profile-management.password.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" autocomplete="off" value="{{ !empty($editData->old_password)? $editData->old_password : old('old_password') }}">
                                    @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {!! Session::has('msg') ? Session::get("msg") : '' !!}
                                </div>
                                <div class="form-group col-sm-4">
                                </div>
                                <div class="form-group col-sm-4">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>New Password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" autocomplete="off" value="{{ !empty($editData->new_password)? $editData->new_password : old('new_password') }}">
                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-sm-4">
                                </div>
                                <div class="form-group col-sm-4">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" autocomplete="off" value="{{ !empty($editData->confirm_password)? $editData->confirm_password : old('confirm_password') }}">
                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                

                            </div>

                           <center> <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{'Update' }}</button> </center>
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
