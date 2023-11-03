@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Menu Permission' : 'Add Menu Permission' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Permission</li>
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
                        <!-- <a href="{{route('frontend-menu.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Menu</a> -->
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
                        <form method="post" action="{{route('menu-management.permission.store')}}" id="myForm">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('parent') ? 'has-error' : '' }}">
                                            <label class="control-label">Role</label>
                                            <select id="role" name="role" class="role form-control select2">
                                                <!-- <option value="">Select Type</option> -->
                                                <option value="">Select Role Name</option>
                                                @foreach(@$roles as $mn)
                                                <option value="{{ $mn->id }}" {{ $mn->id == @$editData->parent ? 'selected' : '' }}> {{ $mn->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('parent') ? 'has-error' : '' }}">
                                            <label class="control-label">Parent Menu</label>
                                            <select id="parent" name="parent" class="form-control select2 parent">
                                                <option value="">Select Menu</option>
                                                @foreach(@$menu as $mn)
                                                <option value="{{ $mn->id }}" {{ $mn->id == @$editData->parent ? 'selected' : '' }}> {{ $mn->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('parent') ? 'has-error' : '' }}">
                                            <label class="control-label">Sub Menu</label>
                                            <select id="sub" name="sub[]" class="sub form-control  select2bs4 " multiple="multiple" data-placeholder="Select Parent Menu" style="width: 100%;">
                                                <!-- <option value="0">Select Menu</option> -->
                                                <!--  @foreach(@$menu as $mn)
                                                <option value="{{ $mn->id }}" {{ $mn->id == @$editData->parent ? 'selected' : '' }}> {{ $mn->name }}</option>
                                                @endforeach -->
                                            </select>
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
    $(document).on('change', '.role ', function() {
        $('.parent').html();
        $('.sub').html('');
    });
    $(document).on('change', '.parent ', function() {
        var parent = $('.parent').val();
        var role = $('.role').val();
        $('.sub').html('');
        if (role == '') {
            $.notify("User Role can not be empty!", { globalPosition: 'top right', className: 'error' });
            return false;
        }
        $.ajax({
            url: "{{route('menu-management.permission.get.menu')}}",
            type: "GET",
            data: { parent: parent, role: role },
            success: function(data) {
                var html = '';
                var count = 0;
                // html += '<option value="' + k.id + '" >' + k.name + '</option>';
                // html += '<option value="' + v.menu.id + '" selected>' + v.menu.name + '</option>';
                // if (data.permission_menu.length != 0) {

                $.each(data['menu'], function(ke, k) {

                    $.each(data['permission_menu'], function(key, v) {
                        if (k.id == v.menu.id) {
                            // html += '<option value="' + v.menu.id + '" selected>' + v.menu.name + '</option>';
                            count = 1;
                        }
                    });
                    if (count == 0) {
                        html += '<option value="' + k.id + '" >' + k.name + '</option>';
                    } else {
                        html += '<option value="' + k.id + '" selected>' + k.name + '</option>';
                        count = 0;
                    }
                });
                $('.sub').html(html);
            }
        });
    });
});

</script>
@endsection
