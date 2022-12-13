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
                <h1>Login</h1>
                <form action="{{ Route('loginAction') }}" method="post" class="mb-3">
                    @csrf <!-- {{ csrf_field() }} -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Email"
                        @isset($email)
                        value="{{ $email }}">
                        @endisset
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
                        @isset($password)
                        value="{{ $password }}">
                        @endisset
                        />
                    </div>
                    <div class="mb-3">
                        <input 
                        type="checkbox" 
                        name="remember" 
                        id="remember" 
                        value="true" 
                        @isset($email)
                        checked
                        @endisset/>
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                        <!-- <div class="alert alert-danger text-center mt-3">
                            Password tidak sama
                        </div> -->
                    </div>
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <button type="submit" class="btn btn-primary login">Login</button>
                </form>
                <p>Anda Belum Punya Akun? <a href="{{ Route('register')}}">Daftar</a></p>
            </div>
        </div>
    </div>
</section>
@endsection