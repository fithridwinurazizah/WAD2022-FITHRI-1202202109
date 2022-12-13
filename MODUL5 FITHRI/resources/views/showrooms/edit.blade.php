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
    <a class="btn btn-light" href='{{ route('showrooms.create') }}'>Add Car</a>
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
  </div>
</nav>
  <main>
    <div class="container">
        <h1>{{ $showroom->name }}</h1>
      <p>{{ $showroom->name }}</p>
      <div class="row">
        <div class="col">
          <div
            class="container d-flex justify-content-center align-items-center flex-column"
          >
          <img  src="/{{ $showroom->image }}" alt="" class="img-fluid">
          </div>
        </div>
        <div class="col">
        <div class="mb-3">
            <form action="{{ route('edit', $showroom->id) }}" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                <label for="nama_mobil" class="form-label">Nama Mobil</label>
                <input type="text" id="nama_mobil" class="form-control" name="nama_mobil" value="{{ $showroom->name }}" />
        </div>
        <div class="mb-3">
          <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
          <input type="text" id="nama_pemilik" class="form-control" name="nama_pemilik" value="{{ $showroom->owner }}"/>
        </div>
        <div class="mb-3">
          <label for="merk" class="form-label">Merk</label>
          <input type="text" id="merk" class="form-control" name="merk" value="{{ $showroom->brand }}"/>
        </div>
        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal Beli</label>
          <input type="date" id="tanggal" class="form-control" name="tanggal" value="{{ $showroom->purchase_date }}"/>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label> 
          <textarea
            name="deskripsi"
            id="deskripsi"
            class="form-control"
          >{{ $showroom->description }} </textarea>
          <div class="mb-3 mt-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
          </div>
          <label class="mt-3 mb-3" for="status">Status Pembayaran</label>
          <div class="mb-3">
              <input class="form-check-input" type="radio" name="status[]" id="status" value="lunas"
              @if ($showroom->status  == "Lunas")
              checked
              @endif
               />
              <label class="form-check-label" for="status">
                  Lunas
              </label>
              <input class="form-check-input" type="radio" name="status[]" id="status2" value="belum lunas"  
              @if ( $showroom->status  == 'Belum Lunas')
                  checked
              @endif
              >
              <label class="form-check-label" for="status2">
                  Belum Lunas
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
</main>
@endsection