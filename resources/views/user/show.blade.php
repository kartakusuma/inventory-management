@extends('main')

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('users') }}">Users</a></li>
              <li class="breadcrumb-item active">Detail</li>
          </ol>
          </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="../../dist/img/user4-128x128.jpg"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">{{ $user->email }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Name</b> <a class="float-right">{{ $user->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                </li>
              </ul>

              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-block"><b>Edit</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection