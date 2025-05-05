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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>
                </ol>
            </div>
        </div>

        @if (Session::has('success'))
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4><div class="alert alert-success">{{Session::get('success')}}</div></h4>
                    </div>
                </div>
            </div>  
      @endif

        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Food</h4>
                    </div>
                    <div class="card-body">
                        <div id="smartwizard" class="form-wizard order-create">
                            <ul class="nav nav-wizard">
                                <li><a class="nav-link" href="#wizard_Service"> 
                                    <span>1</span> 
                                </a></li>
                                <li><a class="nav-link" href="#wizard_Time">
                                    <span>2</span>
                                </a></li>
                                <li><a class="nav-link" href="#wizard_Payment">
                                    <span>3</span>
                                </a></li>
                            </ul>
                            <form action="{{route('admin.save_Food')}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content mt-3" >
                                    <div id="wizard_Service" class="tab-pane" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Food Title<span class="required">*</span></label>
                                                    <input type="text" name="foodtitle" class="form-control @error('foodtitle') is-invalid @enderror" placeholder="Food Name">
                                                    @error('foodtitle')
                                                    <p style="color: red">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Categorie<span class="required">*</span></label>
                                                    <select id="inputState" name="sub_categorie_name" class="default-select form-control @error('sub_categorie_name') is-invalid @enderror wide">
                                                        <option selected disabled>Choose...</option>
                                                        @foreach ($SubCategorie as $SubCategorie)
                                                            <option value="{{$SubCategorie->name}}">{{$SubCategorie->name}}</option>
                                                        @endforeach
        
                                                    </select>
                                                    @error('sub_categorie_name')
                                                         <p style="color: red">{{$message}}</p>
                                                     @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Tags<span class="required @error('Tags') is-invalid @enderror">*</span></label>
                                                    <input type="text" class="form-control" name="Tags" placeholder="Tags" >
                                                    @error('Tags')
                                                    <p style="color: red">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Price<span class="required @error('Price') is-invalid @enderror">*</span></label>
                                                    <input type="number" name="Price" class="form-control"  >
                                                    @error('Price')
                                                    <p style="color: red">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label">Ingredient<span class="required @error('ingredient') is-invalid @enderror">*</span></label>
                                                    <input type="text" name="ingredient" class="form-control" >
                                                    @error('ingredient')
                                                    <p style="color: red">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wizard_Time" class="tab-pane" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Weight<span class="required">*</span></label>
                                                    <input type="text" name="Weight" class="form-control" placeholder="Weight" >
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Dimensions<span class="required">*</span></label>
                                                    <input type="text" name="Dimensions" class="form-control" placeholder="20 × 30 × 40 cm" >
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Description<span class="required">*</span></label>
                                                    <textarea class="form-control" name="Description" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wizard_Payment" class="tab-pane" role="tabpanel">
                                        <div class="row emial-setup">
                                            <div class="row">

                                                <div class="col-lg-6 mt-5">
                                                    <div class="form-group">
                                                        <label for="mailclient13" class="mailclinet mailclinet-drive">
                                                            <input type="radio" name="emailclient" id="mailclient13">
                                                            <span class="mail-icon">
                                                                <i class="mdi mdi-google-drive" aria-hidden="true"></i>
                                                            </span>
                                                            <span class="mail-text">I'm using Drive</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-lg-6 mt-5 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Image<span class="required">*</span></label>
                                                        <input type="file" name="Image" class="form-control" placeholder="Image" >
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            
                                                <div class="d-flex justify-content-center form-group">
                                                    <input type="submit" class="btn btn-primary" id="toastr-success-top-right" value="add Food">
                                                </div>
                                        
                                        </div>
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
@endsection



