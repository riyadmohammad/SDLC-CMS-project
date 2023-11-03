@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
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
                            <!-- <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a href="#" class="dropdown-item">Action</a>
                                    
                                </div>
                            </div> -->
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ !empty($user['image'])? asset('public/upload/image/'.$user['image']) : asset('public/backend/dist/img/avatar5.png') }}">
                                </div>
                                <h3 class="profile-username text-center">{{$user['name']}}</h3>
                                <!-- <p class="text-muted text-center">Admin</p> -->
                                <ul class="list-group list-group-unbordered mb-2">
                                    <li class="list-group-item">
                                        <b>Name: </b> <a class="">{{$user['name']}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email: </b> <a class="">{{$user['email']}}</a>
                                    </li>
                                    
                                </ul>
                                <!-- <a href="#" class="btn btn-primary btn-block"><b>Edit</b></a> -->
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
