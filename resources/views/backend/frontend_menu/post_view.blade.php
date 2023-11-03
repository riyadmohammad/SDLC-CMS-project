@extends('backend.layouts.app')
@section('content')
<style type="text/css">
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 24px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #2196F3;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}

</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Post Menu' : 'Add Post Menu' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Post Menu</li>
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
                        <a href="{{route('frontend-menu.post.add')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> Add Menu</a>
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
                                    <th>Title</th>
                                    <th>URL(Kebab Case)</th>
                                    <th>Cover Image</th>
                                    <th>Page Image</th>
                                    <th width="80">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($posts)
                                @foreach($posts as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$p['frontUrl']['title']}}</td>
                                    <td>{{$p['frontUrl']['url_link']}}</td>
                                    <td width="30">@if($p['cover_image'])<img src="{{asset('public/upload/image/'.$p['cover_image'])}}" width="100px" height="40px">
                                        <center>
                                            <label class="switch" style="margin-top: 50px;">
                                                <input type="checkbox" class="changeStatus" name="status" data-token="{{ csrf_token() }}" data-img="1" data-id="{{$p['id']}}" data-tabName="post_menus" id="coverStatus{{$p['id']}}" value="{{$p['cover_image_status']}}" <?php if($p['cover_image_status']=='1' ){echo "checked" ;}?>>
                                                <span class="slider round"></span>
                                            </label></center>
                                        @else
                                        No Image Found
                                        @endif
                                    </td>
                                    <td width="30">@if($p['page_image'])<img src="{{asset('public/upload/image/'.$p['page_image'])}}" width="100px" height="80px">
                                        <center>
                                            <label class="switch" style="margin-top: 10px;">
                                                <input type="checkbox" class="changeStatus" name="status" data-token="{{ csrf_token() }}" data-img="2" data-id="{{$p['id']}}" data-tabName="post_menus" id="pageStatus{{$p['id']}}" value="{{$p['page_image_status']}}" <?php if($p['page_image_status']=='1' ){echo "checked" ;}?>>
                                                <span class="slider round"></span>
                                            </label></center>
                                        @else
                                        No Image Found
                                        @endif
                                    </td>
                                    <td style="">
                                        <a href="{{ route('frontend-menu.post.edit',$p->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{route('frontend-menu.post.delete')}}" data-id="{{ $p->id }}"><i class="fas fa-trash"></i></a>
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
<script>
$(document).ready(function() {
    $(document).on('click', '.changeStatus', function() {
        var id = ($(this).data("id"));
        var img = ($(this).data("img"));
        var tabName = $(this).data("tabname");
        var _token = $(this).data("token");
        if (img == 1) {
            if ($("#coverStatus" + id).val() == '1') {
                var status = 0;
            } else {
                var status = 1;
            }

        } else {
            if ($("#pageStatus" + id).val() == '1') {
                var status = 0;
            } else {
                var status = 1;
            }

        }


        $.ajax({
            url: "{{route('frontend-menu.post.image.status')}}",
            type: 'Post',
            data: { 'id': id, 'img': img, 'status': status, 'tablename': tabName, '_token': _token },
            success: function(data) {
                $('.notifyjs-corner').html('');
                if (data == 1) {
                    $.notify("Active", { globalPosition: 'top right', className: 'success' });
                } else {
                    $.notify("Inactive", { globalPosition: 'top right', className: 'error' });
                }

                if (img == 1) {
                    $('#coverStatus' + id).val(status);

                } else {
                    $('#pageStatus' + id).val(status);

                }

            }
        });
    });
});

</script>
@endsection
