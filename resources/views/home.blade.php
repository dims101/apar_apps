@extends('layouts.app', [
  'activePage' => 'dashboard', 
  'titlePage' => __('Panel Admin')
  ])

  @section('content')

    <!-- <div class="pagetitle">
      <h1>Dashboard</h1>
    </div> -->
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row align-items-top">
        <div class="col-sm-12">
            <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dashboard</h5>
              <p>Ringkasan inspeksi bulan ini:</p>
                <div class="alert alert-primary">
                    Total APAR : {{$data['total']}} tabung
                </div>
                <div class="alert alert-success">
                    APAR diperiksa : {{$data['sudah']}} tabung
                </div>
                <div class="alert alert-info">
                    APAR belum diperiksa : {{$data['belum']}} tabung
                </div>
                <div class="alert alert-warning">
                    APAR mendekati kadaluarsa : {{$data['warning']}} tabung
                </div>
                <div class="alert alert-danger">
                    APAR kadaluarsa : {{$data['expired']}} tabung
                </div>
                <hr class="dropdown-divider">   
                <div class="d-grid gap-2 mt-3">
                    <a href="/scan" class="btn btn-primary">Mulai inspeksi <i class="ri-share-forward-line"></i></a>
                </div>
                
            </div>
          </div><!-- End Default Card -->
        </div>
      </div>
    </section>
    @endsection