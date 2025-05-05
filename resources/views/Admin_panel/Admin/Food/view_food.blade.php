@extends('Admin.deshboard')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your business dashboard template</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        @if (Session::has('success'))
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><div class="alert alert-success">{{Session::get('success')}}</div></h4>
                </div>
            </div>
        </div>  
         @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Food Items</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:50px;">
                                            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>ID.</th>
                                        <th>TITLE</th>
                                        <th>CATEGORIE</th>
                                        <th>TAGE</th>
                                        <th>PRICE</th>
                                        <th>WEIGHT</th>
                                        <th>IMAGE</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data )
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td><strong>{{$data->id}}</strong></td>
                                        <td><div class="d-flex align-items-center"><span class="w-space-no">{{$data->title}}</span></div></td>
                                        <td>{{$data->categorie}}</td>
                                        <td>{{$data->tags}}</td>
                                        <td>{{$data->price}}</td>
                                        <td>{{$data->weight}}</td>
                                        <td><img src="{{ asset('food_image/' . $data->image) }}" class="rounded" width="50" alt="pizza"> </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('admin.update_Food',$data->id)}}"  class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('admin.delete_Food',$data->id)}}" id="toastr-success-top-right" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


