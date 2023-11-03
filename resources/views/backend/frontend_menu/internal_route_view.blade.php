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
                        <a href="{{route('frontend-menu.internal.route.add')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> Add Link</a>
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
                                    <th>Route Name</th>
                                    <th>Url</th>
                                    <th width="80">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(@$internalRoutes)
                                @foreach($internalRoutes as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$p['title']}}</td>
                                    <td>{{$p['url_link']}}</td>

                                    <td style="">
                                        <a href="{{ route('frontend-menu.internal.route.edit',$p->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route="{{route('frontend-menu.internal.route.delete')}}" data-id="{{ $p->id }}"><i class="fas fa-trash"></i></a>
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

@endsection
