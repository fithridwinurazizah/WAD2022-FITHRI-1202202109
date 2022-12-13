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
    <div class="container  p-3">
      <h1 class="text-center">Profile</h1>
      <form method="POST" action="{{ route('profileUpdate' )}}">
        @csrf <!-- {{ csrf_field() }} -->
      <table style='width: 100%;'>
        <tbody>
          <tr>
            <td><label for="email" class="form-label">Email</label></td>
            <td><input type="text" name="email" id="email" class="form-control border border-0" value='<?= $row[
              'email'
            ] ?>' readonly></td>
          </tr>
          <tr>
            <td><label for="nama" class="form-label">Nama</label></td>
            <td><input type="text" name="nama" id="nama" class="form-control rounded-3 border border-dark" value="<?= $row[
              'name'
            ] ?>"></td>
          </tr>
          <tr>
            <td><label for="no" class="form-label">Nomor Handphone</label></td>
            <td><input type="text" name="no" id="no" class="form-control rounded-3 border border-dark" value="<?= $row[
              'no_hp'
            ] ?>"></td>
          </tr>
        </tbody>
      </table>
      <hr>
      <table style='width: 100%'>
      <tbody>
        <tr>
          <td><label for="password" class="form-label">Kata Sandi</label></td>
          <td><input type="password" name="password" id="password" class="form-control rounded-3 border border-dark" placeholder="Kata Sandi" required></td>
        </tr>
        <tr>
          <td><label for="password2" class="form-label">Konfirmasi Kata Sandi</label></td>
          <td><input type="password" name="password2" id="password2" class="form-control rounded-3 border border-dark" placeholder="Konfirmasi Kata Sandi" required></td>
        </tr>
        <tr>
          <td><label for="navbar" class="form-label">Warna Navbar</label></td>
          <td>
            <select class="form-select l rounded-3 border border-dark" aria-label="Default select example" name="navbar">
              <option selected>Open this select menu</option>
              <option value="1">Red</option>
              <option value="2">Blue</option>
              <option value="3">Green</option>
            </select>
          </td>
        </tr>
      </tbody>
      </table>
      <div class="d-grid gap-2 d-md-flex justify-content-center">
        <button class="btn btn-primary me-md-2 px-5 mt-3" type="submit" name="profile">Update</button>
    </div>
    </form>
  </main>
@endsection