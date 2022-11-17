@extends('layouts.app', [
  'activePage' => 'inventori', 
  'titlePage' => __('Inventori APAR')
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
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title">Inventori APAR</h5>                    
                            </div>
                            <div class="col text-end">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">
                                    <i class="bx bxs-plus-circle"></i> Tambah
                                </button> </br>                                
                            </div>
                        </div>

                        <table class="table table-sm table-bordered table-hover datatable ">
                            <thead class="table-primary">
                                <tr>
                                    <th>ID APAR</th>
                                    <th>Lokasi</th>
                                    <th>Warning Date</th>
                                    <th>Expired Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($apar as $a)
                                <tr class="{{$a->warn_date < $today ? 'table-warning' :''}} {{$a->exp_date < $today ? 'table-danger text-weight-bold' :''}}">
                                    <td>{{$a->qr_apar}}</td>
                                    <td>{{$a->lokasi}}</td>
                                    <td>{{date('d-m-Y',strtotime($a->warn_date))}}</td>
                                    <td>{{date('d-m-Y',strtotime($a->exp_date))}}</td>
                                </tr>       
                                @endforeach         
                            </tbody>
                        </table>
                    </div>
                </div><!-- End Default Card -->
            </div>
      </div>
      <div class="modal fade" id="tambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah APAR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">   
                    <div class="container">
                        Untuk menambah APAR silahkan isi data APAR pada form dibawah.                        
                    </div>           
                    <hr>                            
                    <form class="row g-3" action="/apar/store" method="post" onSubmit="return confirm('Pastikan data terisi dengan benar. \nKetuk Oke untuk menyimpan.');">  
                        @csrf                      
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="qr_apar" class="form-control" id="identitasApar" placeholder="Masukan identitas APAR" required>
                                <label for="identitasApar">Masukan identitas APAR</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="merk" class="form-control" id="merk" placeholder="Masukan merk APAR" required>
                                <label for="merk">Masukan merk APAR</label>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="jenis" class="form-control" id="jenis" placeholder="Masukan jenis APAR" required>
                                <label for="jenis">Masukan jenis APAR</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukan lokasi APAR" required>
                                <label for="lokasi">Masukan lokasi APAR</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="exp_date" class="col-form-label">Expired date</label>
                            <div class="col-sm-12">
                                <input id="exp_date" name="exp_date" type="date" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
                </div> -->
            </div>
        </div>
    </div><!-- End Vertically centered Modal-->
    </section>
    @endsection