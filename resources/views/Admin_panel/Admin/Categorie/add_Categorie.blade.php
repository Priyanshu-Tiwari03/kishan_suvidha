@extends('Admin.deshboard')

@section('content')
<div class="content-body">    
    <div class="container-fluid">
        @if (Session::has('success'))
            <div id="success-message" class="row page-titles mx-0 alert alert-success">
                <div class="col-sm-6 p-md-0" style="margin-bottom: -1rem">
                    <h4><div class="alert alert-success">{{Session::get('success')}}</div></h4>
                </div>
            </div>
        @endif
        @if (Session::has('error'))
        <div class="col-sm-6 p-md-0" style="margin-bottom: -1rem">
            <h4><div class="alert alert-danger">{{Session::get('error')}}</div></h4>
        </div>
        @endif
        <div class="row">     
            <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">New Categorie</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('admin.save_Categorie')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name">
                                            @error('name')
                                                 <p style="color: red">{{$message}}</p>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control @error('Description') is-invalid @enderror" name="Description" rows="3"></textarea>
                                            @error('Description')
                                            <p style="color: red">{{$message}}</p>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="image" >
                                            @error('image')
                                                 <p style="color: red">{{$message}}</p>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Add categorie</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            
            </div>
        </div> 
    </div>
</div>  
@endsection