@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Post' : 'Add Post' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Menu Post</li>
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
                        <a href="{{route('frontend-menu.post.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Post</a>
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
                        <form method="post" action="{{(@$editData)?(route('frontend-menu.post.update',$editData->id)):route('frontend-menu.post.store')}}" enctype="multipart/form-data" id="myForm">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input id="title" type="text" value="{{ !empty($editData['frontUrl']['title'])? $editData['frontUrl']['title'] : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" required> @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">URL(Route Name)</label>
                                            <input id="url_link" type="text" name="url_link" value="{{!empty($editData['frontUrl']['url_link'])? $editData['frontUrl']['url_link'] : old('url_link')}}" class="@error('url_link') is-invalid @enderror form-control" placeholder="Do not write anything here.">
                                            @error('url_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Cover Image</label>
                                        <input type="file" class="form-control filer_input_single @error('cover_image') is-invalid @enderror" name="cover_image"> @error('cover_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                                    </div>
                                    
                                    <div class="form-group col-sm-4">
                                        <label>Page Photo</label>
                                        <input type="file" class="form-control filer_input_single @error('page_image') is-invalid @enderror" name="page_image"> @error('page_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea id="summernote" name="description">{{ !empty($editData->description)? $editData->description : old('description') }} </textarea>
                                            @error('address')
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
<script type="text/javascript">
$(function() {
    $('#title').on('keyup', function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#url_link").val(Text);
    });
});

</script>
@endsection
