@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Internal Link' : 'Add Internal Link' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Internal Link</li>
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
                        <a href="{{route('frontend-menu.internal.route.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Internal Link</a>
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
                        <form method="post" action="{{(@$editData)?(route('frontend-menu.internal.route.update',$editData->id)):route('frontend-menu.internal.route.store')}}" id="myForm">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input id="title" type="text" value="{{ !empty($editData['title'])? $editData['title'] : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title"> @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">URL(Route Name)</label>
                                            <input id="" type="text" name="url_link" value="{{!empty($editData['url_link'])? $editData['url_link'] : old('url_link')}}" class="@error('url_link') is-invalid @enderror form-control" placeholder="Route Name.">
                                            @error('url_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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
