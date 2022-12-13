@extends('layout')
@section('content')
<section>
    <div class="row">
        <div class="col">
          <img
            src="https://img-ik.cars.co.za/news-site-za/images/2022/11/vw-t-cross-detail.jpg"
            alt=""
            id="bg"
            width="100%"
            style="height:100vh;"
          />
        </div>
        <div class="col d-flex justify-conten-center align-items-center">
          <div class="container p-3">
            <h1>Register</h1>
            <form action="{{ Route('register')}}" method="post" class="mb-3" autocomplete='off'>
              @csrf <!-- {{ csrf_field() }} -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Email"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input
                  type="text"
                  class="form-control"
                  id="nama"
                  name="nama"
                  placeholder="Nama"
                />
              </div>
              <div class="mb-3">
                <label for="no" class="form-label">Nomor Handphone</label>
                <input
                  type="text"
                  class="form-control"
                  id="no"
                  name="no"
                  placeholder="088xxxxxxxx"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Password"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="password2" class="form-label"
                  >Konfirmasi Password</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="password2"
                  name="password2"
                  placeholder="Konfirmasi Password"
                  required
                />
              </div>
              @if($errors->any())
                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">{{$error}}</div>
                @endforeach
              @endif
  
              <button type="submit" class="btn btn-primary mt-3 login">
                Register
              </button>
            </form>
            <p>Anda Sudah Punya Akun? <a href="{{ route('login') }}">Login</a></p>
          </div>
        </div>
      </div>
</section>
@endsection