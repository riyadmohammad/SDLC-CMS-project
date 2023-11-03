@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Menu' : 'Add Menu' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Menu</li>
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
                        <a href="{{route('menu-management.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Menu</a>
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
                        <form method="post" action="{{(@$editData)?(route('menu-management.update',$editData->id)):route('menu-management.store')}}" id="myForm">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Menu Name</label>
                                            <input id="name" type="text" value="{{ !empty($editData->name)? $editData->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Menu Name"> @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('parent') ? 'has-error' : '' }}">
                                            <label class="control-label">Menu Type</label>
                                            <select id="parent" name="parent" class="form-control">
                                                <!-- <option value="">Select Type</option> -->
                                                <option value="0" {{ @$editData->parent == '0' ? 'selected' : '' }}>Parent Menu</option>
                                                @foreach(@$parent_menu as $mn)
                                                <option value="{{ $mn->id }}" {{ $mn->id == @$editData->parent ? 'selected' : '' }}> {{ $mn->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">URL(Route Name)</label>
                                            <input type="text" id="route" name="route" value="{{!empty($editData->route)? $editData->route : old('route')}}" class="@error('route') is-invalid @enderror form-control" placeholder="Enter Route Name">
                                            @error('route')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="" selected>Select Status</option>
                                                <option value="1" {{@$editData['status'] == '1'? 'Selected': ''}}>Active</option>
                                                <option value="0" {{@$editData['status'] == '0'? 'Selected': ''}}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="control-label">Sort Order</label>
                                            <input type="number" id="sort" value="{{ !empty($editData->sort)? $editData->sort : old('sort') }}" name="sort" class="form-control" placeholder="Enter Sort Number">
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-3">
                                        <div class="form-group {{ $errors->has('icon_id') ? 'has-error' : '' }}">
                                            <label class="control-label">Icon</label>
                                            <select id="icon_id" name="icon_id" class="form-control">
                                                <option value="">Select Icon</option>
                                                @foreach(@$icons as $in)
                                                <option data-icon="{{ $in->name }}" value="{{ $in->name }}" {{ $in->id == @$editData->icon_id ? 'selected' : '' }}>{{$in->name}}<i class="nav-icon {{$in->name}}"></i></option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Icon</label>
                                            <select id="icon_id" name="icon_id" class="form-control select2 {{ $errors->has('icon_id') ? 'has-error' : '' }}" style="width: 100%; colo">
                                                <option value="">Select Icon</option>
                                                @foreach(@$icons as $in)
                                                <option data-icon="{{ $in->name }}" value="{{ $in->id }}" {{ $in->id == @$editData->icon_id ? 'selected' : '' }}>{{$in->name}}<i class="nav-icon {{$in->name}}"></i></option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!-- <input type="text" id="setMyTag" /> -->
                                    </div>
                                    <script>
                                        $(function() {
                                         $("#icon_id").change(function() {

                                                 var con = $('#icon_id').find(":selected").val();
                                                 // alert(con);
                                            });
                                                        });

                                            </script>

                                    <!-- Multiple Option -->
                                    <!--  <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Multiple</label>
                                            <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                                <option>Alabama</option>
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                                <div id="addextraRouteDiv"></div>
                                <div class="row">
                                    <div class="col-sm-5">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info btn-sm">{{(@$editData) ? 'Update ' : 'Create'}}</button>
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
