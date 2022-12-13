@extends('layout')
@section('content')
<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('root') }}"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('showrooms.index') }}">My Cars</a>
          </li>
        </ul>
      </div>
      @isset($name)
      <div class="dropdown ms-3">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ $name }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('profile', $name) }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Log Out</a></li>
            </ul>
        </div>
        @endisset
        <a class='btn btn-light' href='{{ route('login') }}' style="@isset($name) display: none; @endisset">
        Login
      </a>
    </div>
  </nav>
  <main class="main">
    <div class="container">
      <div class="row mt-5">
        <div class="col d-flex justify-content-center align-items-center">
          <div class="container">
            <h1>Selamat Datang di Show Room Fithri</h1>
            <p class="text-secondary">
              At lacus vitae nulla sagittis scelerisque nisl. Pellentesque
              duis cursus vestibulum, facilisi ac, sed faucibus.
            </p>
            <a href="pages/ListCar-Fithri.php" class="btn btn-primary"
              >My Cars</a
            >
            <div class="d-flex mt-5">
              <img src="/logo-ead.png" alt="" width="100"/>
              <p class="ms-5">Fithri_1202202109</p>
            </div>
          </div>
        </div>
        <div class="col">
          <img
            src="https://www.mercedes-benz.co.id/passengercars/mercedes-benz-cars/models/gle/coupe-c167/explore/highlights/_jcr_content/contentgallerycontainer/par/contentgallery/par/contentgallerytile_58586423/image.MQ6.8.20200922100836.jpeg"
            alt="" width="550"
            class="img-fluid"
          />
        </div>
      </div>
    </div>
  </main>
@endsection