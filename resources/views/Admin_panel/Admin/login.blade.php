<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Responsive Login and Signup Form </title>
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    }
    .container {
    max-width: 100%;
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #4070f4;
    column-gap: 30px;
  }
  .form {
    position: absolute;
    max-width: 430px;
    width: 100%;
    padding: 30px;
    border-radius: 6px;
    background: #FFF;
  }
  .form.signup {
    opacity: 0;
    pointer-events: none;
  }
  .forms.show-signup .form.signup {
    opacity: 1;
    pointer-events: auto;
  }
  .forms.show-signup .form.login {
    opacity: 0;
    pointer-events: none;
  }
  header {
    font-size: 28px;
    font-weight: 600;
    color: #232836;
    text-align: center;
  }
  form {
    margin-top: 30px;
  }
  .form .field {
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 20px;
    border-radius: 6px;
  }
  .field input,
  .field button {
    height: 100%;
    width: 100%;
    border: none;
    font-size: 16px;
    font-weight: 400;
    border-radius: 6px;
  }
  .field input {
    outline: none;
    padding: 0 15px;
    border: 1px solid#CACACA;
  }
  .field input:focus {
    border-bottom-width: 2px;
  }
  .eye-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-size: 18px;
    color: #8b8b8b;
    cursor: pointer;
    padding: 5px;
  }
  .field button {
    color: #fff;
    background-color: #0171d3;
    transition: all 0.3s ease;
    cursor: pointer;
  }
  .field button:hover {
    background-color: #016dcb;
  }
  .form-link {
    text-align: center;
    margin-top: 10px;
  }
  .form-link span,
  .form-link a {
    font-size: 14px;
    font-weight: 400;
    color: #232836;
  }
  .form a {
    color: #0171d3;
    text-decoration: none;
  }
  .form-content a:hover {
    text-decoration: underline;
  }
  @media screen and (max-width: 400px) {
    .form {
      padding: 20px 10px;
    }
  }
    </style>
</head>
<body>
  <section class="container forms">
    <div class="form login">
      <div class="form-content">
        @if (Session::has('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

        @if (Session::has('error'))
          <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        <header>Admin Login</header>
        <form action="{{ route('admin.authenticate') }}" method="POST">
            @csrf
          <div class="field input-field">
            <input type="text" value="{{old('email')}}" placeholder="Email" name="email" class="input @error('email') is-invalid @enderror ">
            @error('email')
                <p class="invalid-feedback" style="color:red">{{$message}} </p>
            @enderror
          </div>
          <br>
          <div class="field input-field">
            <input type="password" placeholder="Password" name="password" class="password @error('password') is-invalid @enderror">
            <i class='bx bx-hide eye-icon'></i>
            @error('password')
            <br>
            <p class="invalid-feedback"  style="color:red">{{$message}} </p>
            <br>
            @enderror
          </div>
          <br>
          <div class="field button-field">
            <button name="login" type="submit">Login</button>
          </div>
        </form>   
  </section>
</body>
</html>

