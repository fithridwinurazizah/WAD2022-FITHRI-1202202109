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
    <div class="container mt-5">
      <h1>Tambah Mobil</h1>
      <p>Tambah Mobil Baru Anda Ke List Show Room</p>
      <form action="/showrooms" method="post" class="mt-5" enctype="multipart/form-data">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="mb-3">
          <label for="nama_mobil" class="form-label">Nama Mobil</label>
          <input type="text" id="nama_mobil" class="form-control" name="nama_mobil"/>
        </div>
        <div class="mb-3">
          <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
          <input type="text" id="nama_pemilik" class="form-control" name="nama_pemilik"/>
        </div>
        <div class="mb-3">
          <label for="merk" class="form-label">Merk</label>
          <input type="text" id="merk" class="form-control" name="merk"/>
        </div>
        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal Beli</label>
          <input type="date" id="tanggal" class="form-control" name="tanggal"/>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea
            name="deskripsi"
            id="deskripsi"
            class="form-control"
          ></textarea>
          <div class="mb-3 mt-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" />
          </div>
          <label class="mt-3 mb-3" for="status">Status Pembayaran</label>
          <div class="mb-3">
              <input class="form-check-input" type="radio" name="status[]" id="status" value="lunas">
              <label class="form-check-label" for="status">
                  Lunas
              </label>
              <input class="form-check-input" type="radio" name="status[]" id="status2" value="belum lunas">
              <label class="form-check-label" for="status2">
               Belum Lunas
              </label>
            </div>
          <button type="submit" class="btn btn-primary">Selesai</button>
      </form>
    </div>
  </main>
@endsection