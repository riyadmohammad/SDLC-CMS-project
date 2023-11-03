@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Profile' : 'Add Profile' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
                        <form id="socialsite" action="{{ route('profile-management.update')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label>Name</label>
                                    <input id="name" type="text" value="{{ !empty($editData->name)? $editData->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"> @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                                
                                <div class="form-group col-sm-4">
                                    <label>Email</label>
                                    <input id="email" type="text" value="{{ !empty($editData->email)? $editData->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email"> @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                                 
                                <div class="form-group col-sm-4">
                                    <label>Photo</label>
                                    <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                                <!-- <div class="form-group col-sm-6">
                                    <label>Faculty Description</label>
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror textarea " name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div> -->
                               
                               
                                
                            </div>
                           <center><button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ' : 'Save' }}</button></center> 
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
