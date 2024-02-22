@extends('layout.owner')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Back</a></li>
              <li class="breadcrumb-item active">Data Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('user.update',['id' => $data->id]) }}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Ubah Data Admin</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputName">Nama</label>
                              <input type="text" value="{{ $data->name }}" name="name"  class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                              @error('nama')
                                    <small>{{ $message }}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" value="{{ $data->email }}" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" value="{{ $data->password }}" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            @error('password')
                                <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Level</label>
                            <input type="text" value="{{ $data->role }}" name="role" class="form-control" id="exampleInputPassword1" placeholder="Level">
                            @error('role')
                                <small>{{ $message }}</small>
                            @enderror
                          </div>


                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </form>
                    </div>
            </form>
              <!-- /.card -->
    <!-- /.content -->
  </div>
@endsection
