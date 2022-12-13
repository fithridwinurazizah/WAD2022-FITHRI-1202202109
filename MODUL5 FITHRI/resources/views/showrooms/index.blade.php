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
      <h1>My Show Room</h1>
      <p class="text-secondary">List Show Room Fithri - 1202202109</p>
      <div class="list-card">
        @foreach ($showrooms as  $row)
        <div class="card p-2 border border shadow-lg" style="width: 18rem">
          <img
          src="<?php echo $row['image']; ?>"
            alt=""
          />
          <div class="card-body">
            <h5 class="card-title"><?= $row['name'] ?></h5>
            <p class="card-text">
              <?= $row['deskripsi'] ?>
            </p>
            <a href="{{ route('showrooms.show', $row['id']) }}" class="btn btn-primary">Details</a>
            <a  href=<?= '/showrooms/destroy/' .
              $row['id'] ?>  class="btn btn-danger">Delete</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </main>
@endsection