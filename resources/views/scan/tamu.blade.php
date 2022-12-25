@extends('layouts.app', [
  'titlePage' => $form->qr_apar
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
              <h5 class="card-title">Informasi APAR - {{$form->qr_apar}}</h5>
                <div class="row g-3">
                    <div class="col-xs-12">
                        <label  class="form-label">Merk</label>
                        <input type="text" class="form-control" value="{{$apar->merk}}" disabled>
                    </div>
                    <div class="col-xs-12">
                        <label  class="form-label">Jenis APAR</label>
                        <input type="text" class="form-control" value="{{$apar->jenis}}" disabled>
                    </div>
                    <div class="col-xs-12">
                        <label  class="form-label">No. Lokasi</label>
                        <input type="text" class="form-control" value="{{$apar->id_lokasi}}" disabled>
                    </div>
                    <div class="col-xs-12">
                        <label  class="form-label">Lokasi</label>
                        <input type="text" class="form-control" value="{{$apar->lokasi}}" disabled>
                    </div>
                    <div class="col-xs-12">
                        <label  class="form-label">Tanggal Kadaluarsa</label>
                        <input type="text" class="form-control" value="{{$apar->exp_date}}" disabled>
                    </div>
                </div>
                <hr>
                <h5 class="card-title">Informasi Inspeksi APAR - {{$form->qr_apar}}</h5>
                <div class="row g-3">
                    <div class="col">
                        <label  class="form-label">Inspector</label>
                        <input type="text" class="form-control" value="{{$form->penneng}} - {{$form->nama}}" disabled>
                    </div>
                    <div class="col">
                        <label  class="form-label">Tanggal Inspeksi</label>
                        <input type="text" class="form-control" value="{{date('d-m-Y',strtotime($form->created_at))}}" disabled>
                    </div>
                </div>
                <div class="row mt-1 g-3">
                    <div class="col">
                        <label  class="form-label">Tuas</label>
                        <input type="text" class="form-control" value="{{$form->tuas}}" disabled>
                    </div>
                    <div class="col">
                        <label  class="form-label">Segel Tuas</label>
                        <input type="text" class="form-control" value="{{$form->segel_tuas}}" disabled>
                    </div>
                </div>
                <div class="row mt-1 g-3">
                    <div class="col">
                        <label  class="form-label">Pin</label>
                        <input type="text" class="form-control" value="{{$form->pin}}" disabled>
                    </div>
                    <div class="col">
                        <label  class="form-label">Selang</label>
                        <input type="text" class="form-control" value="{{$form->selang}}" disabled>
                    </div>
                </div>
                <div class="row mt-1 g-3">
                    <div class="col">
                        <label  class="form-label">Nozzle</label>
                        <input type="text" class="form-control" value="{{$form->nozzle}}" disabled>
                    </div>
                    <div class="col">
                        <label  class="form-label">Pressure</label>
                        <input type="text" class="form-control" value="{{$form->pressure}}" disabled>
                    </div>
                </div>
                <div class="row mt-1 g-3">
                    <div class="col">
                        <label  class="form-label">Tabung</label>
                        <input type="text" class="form-control" value="{{$form->tabung}}" disabled>
                    </div>
                    <div class="col">
                        <label  class="form-label">Barcode</label>
                        <input type="text" class="form-control" value="{{$form->barcode}}" disabled>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-xs-12">
                        <label  class="form-label">Keterangan</label>
                        <textare class="form-control" style="height: 80px" disabled>{{$form->keterangan}}</textarea>
                    </div>                    
                </div>
                <div class="row mt-3 g-3">
                    <div class="col-xs-12">
                        <a href="/tamu" class="btn btn-primary">Scan APAR lain</a>
                    </div>
                </div>
                
            </div>
          </div><!-- End Default Card -->
        </div>
      </div>
    </section>
    @endsection