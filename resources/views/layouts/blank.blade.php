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
              
            </div>
          </div><!-- End Default Card -->
        </div>
      </div>
    </section>
    @endsection