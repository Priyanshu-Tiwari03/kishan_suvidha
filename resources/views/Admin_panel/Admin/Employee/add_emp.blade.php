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
                <div class="col-xl-9 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Employee</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('admin.save_Employee')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Employee Name</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="1234 Main St">
                                            @error('name')
                                                 <p style="color: red">{{$message}}</p>
                                             @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                                            @error('email')
                                                 <p style="color: red">{{$message}}</p>
                                             @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror">
                                            @error('phone')
                                                 <p style="color: red">{{$message}}</p>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Job_Role</label>
                                            <select id="inputState" name="Job_Role" class="default-select form-control @error('Job_Role') is-invalid @enderror wide">
                                                <option selected disabled>Choose...</option>
                                                <option value="Cashier">Cashier</option>
                                                <option value="Chef">Chef</option>
                                                <option value="Waiter">Waiter</option>
                                            </select>
                                            @error('Job_Role')
                                                 <p style="color: red">{{$message}}</p>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                            @error('password')
                                                 <p style="color: red">{{$message}}</p>
                                             @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Password">
                                            @error('password_confirmation')
                                                 <p style="color: red">{{$message}}</p>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-5">
                                        <div class="form-group">
                                            <label class="text-label">Image<span class="required">*</span></label>
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Image" >
                                            @error('image')
                                                 <p style="color: red">{{$message}}</p>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 col-4 mx-auto">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            {{-- <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Vertical Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control @error('name') is-invalid @enderror" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control @error('name') is-invalid @enderror" placeholder="Password">
                                        </div>
                                    </div>
                                    <fieldset class="mb-3">
                                        <div class="row">
                                            <label class="col-form-label col-sm-3 pt-0">Radios</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios" value="option1" checked>
                                                    <label class="form-check-label">
                                                        First radio
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios" value="option2">
                                                    <label class="form-check-label">
                                                        Second radio
                                                    </label>
                                                </div>
                                                <div class="form-check disabled">
                                                    <input class="form-check-input" type="radio" name="gridRadios" value="option3" disabled>
                                                    <label class="form-check-label">
                                                        Third disabled radio
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="mb-3 row">
                                        <div class="col-sm-3">Checkbox</div>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    Example checkbox
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Sign in</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div> --}}
            
            </div>
    </div>
</div>    

@endsection

