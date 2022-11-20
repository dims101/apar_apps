@extends('layouts.app', [
  'activePage' => 'akun', 
  'titlePage' => __('Akun Pengguna')
  ])

  @section('content')

    <!-- <div class="pagetitle">
      <h1>Dashboard</h1>
    </div> -->
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row align-items-top">
        <div class="{{auth()->user()->level == 'Admin' ? 'col-sm-6' : 'col-sm-12'}}">
            <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Akun Pengguna</h5>
                <!-- alert with icon -->
                @if (Session::has('message'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        {{Session::get('message')}}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
              <!-- Vertical Form -->
              <form class="row g-3" action="/akun/{{$user->id}}" method="post" onSubmit="return confirm('Pastikan data terisi dengan benar. \nKetuk Oke untuk menyimpan.');">
                @csrf
                @method('put')
                <div class="col-12">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="{{$user->nama}}" required>
                </div>
                <div class="col-12">
                  <label for="penneng" class="form-label">No. Penneng</label>
                  <input type="text" class="form-control" id="penneng" name="penneng" value="{{$user->penneng}}" required>
                </div>
                <div class="col-12">
                  <label for="dept" class="form-label">Departemen</label>
                  <input type="text" class="form-control" id="dept" name="dept" value="{{$user->dept}}" required>
                </div>
                <div class="col-12">
                  <label for="group" class="form-label">Group</label>
                  <input type="text" class="form-control" id="group" name="group" value="{{$user->group}}" required>
                </div>                 
                <div class="col-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-12">
                  <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                </div>
              </form><!-- Vertical Form -->
              
            </div>
          </div><!-- End Default Card -->
        </div>
        @if(auth()->user()->level == 'Admin')
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pengguna</h5>
                    @if (Session::has('admin'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    <div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            {{Session::get('admin')}}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <br>
                    <table class="table table-sm table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No. Penneng</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alluser as $a)
                            <tr>
                                <td>{{$a->nama}}</td>
                                <td>{{$a->penneng}}</td>
                                <td>
                                    <form class="d-inline" action="/akun/makeadmin/{{$a->id}}" method="post">
                                        @csrf
                                        @method('put')
                                        @if($a->level == 'Admin')
                                        <button class="btn btn-sm btn-secondary" disabled>Administrator</button>
                                        @else
                                        <button class="btn btn-sm btn-success" type="submit">Jadikan Admin</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        @endif
    </section>

    @endsection