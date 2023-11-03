@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Frontend Menu' : 'Add Frontend Menu' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Frontend Menu</li>
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
                        <a href="{{route('frontend-menu.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Menu</a>
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
                        <form method="post" action="{{(@$editData)?(route('frontend-menu.update',$editData->id)):route('frontend-menu.store')}}" id="myForm">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Menu Name</label>
                                            <input id="name" type="text" value="{{ !empty($editData['name'])? $editData['name'] : old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Menu name" required> @error('name')
                                            <span class="invalid-feedback" role="alert" >
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('parent') ? 'has-error' : '' }}">
                                            <label class="control-label">Menu Type</label>
                                            <select id="parent" name="parent" class="form-control">
                                                <!-- <option value="">Select Type</option> -->
                                                <option value="0" {{ @$editData->parent == '0' ? 'selected' : '' }}>Parent Menu</option>
                                                @foreach(@$menus as $mn)
                                                <option value="{{ $mn->id }}" {{ $mn->id == @$editData->parent ? 'selected' : '' }}> {{ $mn->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Sort</label>
                                            <input id="sort" type="text" value="{{ !empty($editData['sort'])? $editData['sort'] : old('sort') }}" class="form-control @error('sort') is-invalid @enderror" name="sort" placeholder="Menu sort"> @error('sort')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="label_st">Link Type</label>
                                            <select class="url_type select2 form-control @error('url_type') is-invalid @enderror" id="url_type" name="url_type">

                                                <!-- <option value=""  selected>Select Url Type</option> -->
                                                <option value="0" {{ !empty($editData->url_id) ? '' : 'selected' }}>No Link</option>
                                                <option value="1" {{ @$editData->urlLink->url_type == 1 ? 'selected' : '' }}>Internal Link(Only Developer)</option>
                                                
                                                <option value="2" {{ @$editData->urlLink->url_type == 2 ? 'selected' : '' }}>External Link</option>
                                                <option value="3" {{ @$editData->urlLink->url_type == 3 ? 'selected' : '' }}>Post Link</option>
                                                
                                            </select>
                                            @error('url_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 internal_route" id="internal_route"
                                    @if(@$editData['urlLink']['url_type'] == 1) @else style="display: none;" @endif>
                                        <div class="form-group">
                                            <label class="label_st">Internal Link</label>
                                            <select class="internal_route select2 form-control @error('internal_route') is-invalid @enderror" id="internalLink" name="internal_route">
                                                <option value="">Select Internal Link</option>
                                                @foreach(@$internal_link as $lin)
                                                <option value="{{ $lin->id }}" {{ $lin->id == @$editData['urlLink']['id'] ? 'selected' : '' }}>{{$lin['title']}} </option>
                                                @endforeach
                                                
                                            </select>
                                            @error('internal_route')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-4 external_route" id="external_route" @if(@$editData['urlLink']['url_type'] == 2) @else style="display: none;" @endif>
                                        <div class="form-group">
                                            <label class="control-label">External Route</label>
                                            <input id="externalLink" type="text" name="external_route" value="{{!empty(@$editData['urlLink']['url_type'] == 2)? $editData['urlLink']['url_link'] : old('external_route')}}" class="@error('external_route') is-invalid @enderror form-control" placeholder="Please give your url.">
                                            @error('external_route')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 post_route" id="post_rote" @if(@$editData['urlLink']['url_type'] == 3) @else style="display: none;" @endif>
                                        <div class="form-group">
                                            <label class="label_st">Post Route</label>
                                            <select class="post_route select2 form-control @error('post_route') is-invalid @enderror" id="postLink" name="post_id">
                                                <option value="">Select Post Route</option>
                                                @foreach(@$posts as $mn)
                                                <option value="{{ $mn->id }}" {{ $mn->id == @$editData['urlLink']['postMenu']['id'] ? 'selected' : '' }}>{{$mn['frontUrl']['title']}} </option>
                                                @endforeach
                                            </select>
                                            @error('pay_type')
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

    $(document).on('change', '.url_type', function() {
        var t = $(this).find('option:selected').text();
        var v = $(this).val();
        // alert(v);

        if (v == '1') {
            $('.internal_route').show();
            $('.external_route').hide();
            $('.post_route').hide();

        } else if (v == '2') {
            $('.internal_route').hide();
            $('.external_route').show();
            $('.post_route').hide();

        } else if (v == '3') {
            $('.internal_route').hide();
            $('.external_route').hide();
            $('.post_route').show();

        } else {
            $('.internal_route').hide();
            $('.external_route').hide();
            $('.post_route').hide();
        }


    });


});

</script>
<script type="text/javascript">
 $(document).on('click', '.btn', function() {
        var urlType = $('#url_type').val();
        var internalRoute = $('#internalLink').val();
        var externalRoute = $('#externalLink').val();
        var postRoute = $('#postLink').val();
        // alert(internalRoute);
        var count = 0;
        if(urlType == 1)
        {
            if(internalRoute == '')
            {
                $.notify("Please Select Internal Link.", {globalPosition: 'top right',className: 'error'});
                count = 1;
            }
        }
        if(urlType == 2)
        {
        if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(externalRoute)){
            } else {
                $.notify("Invalid External Link", {globalPosition: 'top right',className: 'error'});
                count = 1;
                }
        }
        if(urlType == 3)
        {
            if(postRoute == '')
            {
                $.notify("Please Select Post Link.", {globalPosition: 'top right',className: 'error'});
                count = 1;
            }
        
        }
        if(count == 1)
        {
            return false;
        }
        // return false;
        });

</script>
@endsection
