@extends('layout.owner')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Dashoard</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- btn tambah user --}}
                <a href="{{ route ('user.create') }}" class="btn btn-primary mb-4">Tambah Data</a>
                <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Table Data Admin</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{-- data user --}}
                        @foreach ($data as $d )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->password }}</td>
                                <td>{{ $d->role }}</td>
                                <td>
                                    {{-- btn edit user --}}
                                    <a href="{{route('edit.user',['id'=> $d->id])}}" class="btn btn-primary"><i class="fas fa-pen"> edit</i></a>
                            {{-- btn Hapus user --}}
                            <a href="" class="btn btn-danger me-1" data-bs-toggle="modal" data-bs-target="#ModalHapusUser{{ $d->id }}"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                            </tr>
                             <!-- Modal Hapus User -->
                        <div class="modal fade" id="ModalHapusUser{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <p>Apakah Kamu Yakin Ingin Menghapus Data User <b>{{ $d->name }}</b></p>
                                </div>
                                <form action="{{ route('user.delete',['id' =>$d->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                    </div>
                                 </form>

                            </div>
                            </div>
                        </div>
                        {{-- Akhir Modal Hapus User --}}

                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
