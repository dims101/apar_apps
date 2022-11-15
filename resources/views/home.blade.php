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
                <div class="alert alert-info">
                    Total APAR :
                </div>
                <div class="alert alert-success">
                    APAR diperiksa :
                </div>
                <div class="alert alert-warning">
                    APAR mendekati kadaluarsa :
                </div>
                <div class="alert alert-danger">
                    APAR kadaluarsa :
                </div>
                <hr class="dropdown-divider">   
                <div class="d-grid gap-2 mt-3">
                    <a href="#" class="btn btn-primary">Mulai inspeksi <i class="ri-share-forward-line"></i></a>
                </div>
                
            </div>
          </div><!-- End Default Card -->
        </div>
      </div>
    </section>
    @endsection