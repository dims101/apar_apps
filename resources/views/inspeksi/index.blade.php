@extends('layouts.app', [
  'activePage' => 'inspeksi', 
  'titlePage' => __('Data Inspeksi APAR')
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
              <h5 class="card-title">Data Inspeksi APAR</h5>
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
                <div class="row">
                    <table class="table table-sm table-bordered table-hover datatable ">                        
                        <thead class="table-primary">
                            <tr>
                                <th>ID APAR</th>
                                <th>Lokasi</th>
                                <th>Inspector</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($form as $f)
                            <tr
                                data-bs-toggle="modal" data-bs-target="#modalInspeksi" 
                                data-bs-id="{{$f->id}}"
                                data-bs-qr="{{$f->qr_apar}}"
                                data-bs-tanggal="{{date('d-m-Y',strtotime($f->created_at))}}"
                                data-bs-il="{{$f->id_lokasi}}"
                                data-bs-lokasi="{{$f->lokasi}}"
                                data-bs-tuas="{{$f->tuas}}"
                                data-bs-segel="{{$f->segel_tuas}}"
                                data-bs-pin="{{$f->pin}}"
                                data-bs-selang="{{$f->selang}}"
                                data-bs-nozzle="{{$f->nozzle}}"
                                data-bs-pressure="{{$f->pressure}}"
                                data-bs-tabung="{{$f->tabung}}"
                                data-bs-barcode="{{$f->barcode}}"
                                data-bs-keterangan="{{$f->keterangan}}"
                                data-bs-inspector="{{$f->nama}} - {{$f->penneng}}"
                            >
                                <td>{{$f->qr_apar}}</td>
                                <td>{{$f->lokasi}}</td>
                                <td>{{$f->nama}}</td>
                                <td>{{date('d-m-Y',strtotime($f->created_at))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>
          </div><!-- End Default Card -->
        </div>
      </div>
    </section>
    <div class="modal fade" id="modalInspeksi" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form inspeksi APAR  </h5>          
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">            
                    <form class="row g-3" action="/inspeksi/update" method="post" onSubmit="return confirm('Pastikan data terisi dengan benar. \nKetuk Oke untuk menyimpan.');">  
                        @csrf           
                        @method('put')           
                        <div class="row g-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="hidden" name="id" class="id">
                                    <input type="text" name="qr_apar" class="form-control identitas" id="identitas" placeholder="Masukan identitas APAR" readonly>
                                    <label for="identitas">Identitas APAR</label>
                                </div>                            
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="created_at" class="form-control identitas" id="tanggal" placeholder="Tanggal Inspeksi" readonly>
                                    <label for="tanggal">Tanggal Inspeksi</label>
                                </div>                            
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="id_lokasi" class="form-control identitas" id="id_lokasi" placeholder="No. lokasi APAR" readonly>
                                    <label for="id_lokasi">No. lokasi APAR</label>
                                </div>                            
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="lokasi" class="form-control identitas" id="lokasi" placeholder="Lokasi APAR" readonly>
                                    <label for="lokasi">Lokasi APAR</label>
                                </div>                            
                            </div>
                        </div>
                        <br>
                        <div class="row g-3 containter">
                            <h5>Hasil inspeksi</h5>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="tuas" class="form-control identitas" id="tuas" placeholder="Tuas" required>
                                    <label for="tuas">Tuas</label>
                                </div>                            
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="segel_tuas" class="form-control identitas" id="segel_tuas" placeholder="Segel Tuas" required>
                                    <label for="segel_tuas">Segel Tuas</label>
                                </div>                            
                            </div>
                        </div>                        
                        <div class="row g-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="pin" class="form-control identitas" id="pin" placeholder="Pin" required>
                                    <label for="pin">Pin</label>
                                </div>                            
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="selang" class="form-control identitas" id="selang" placeholder="Selang" required>
                                    <label for="selang">Selang</label>
                                </div>                            
                            </div>
                        </div>                        
                        <div class="row g-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="pressure" class="form-control identitas" id="pressure" placeholder="Pressure" required>
                                    <label for="Pressure">Pressure</label>
                                </div>                            
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="tabung" class="form-control identitas" id="tabung" placeholder="Tabung" required>
                                    <label for="tabung">Tabung</label>
                                </div>                            
                            </div>
                        </div> 
                        <div class="row g-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="barcode" class="form-control identitas" id="barcode" placeholder="QRCode" required>
                                    <label for="barcode">QRCode</label>
                                </div>                            
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="nozzle" class="form-control identitas" id="nozzle" placeholder="Nozzle" requre>
                                    <label for="nozzle">Nozzle</label>
                                </div>                            
                            </div>
                        </div>                       
                        <div class="row g-3 containter">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" style="height: 80px" name="keterangan" id="keterangan"></textarea>                          
                            </div>
                            <div class="col-sm12">
                                <div class="form-floating">
                                    <input type="text" name="inspector" class="form-control identitas" id="inspector" placeholder="Inspector" readonly>
                                    <label for="inspector">Inspector</label>
                                </div>                            
                            </div>
                        </div>                       
                        <hr>
                        <div class="text-center">
                            @if(auth()->user()->level == 'Admin')
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            @endif
                            </form>
                            <form class="d-inline" action="/inspeksi/delete" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" class="id2">
                                @if(auth()->user()->level == 'Admin')
                                <button type="submit" class="btn btn-danger" onClick="return confirm('Yakin untuk menghapus?');">Hapus</button>
                                @endif
                            </form>
                            <!-- Tombol buat memo -->
                            
                        </div>
                    
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
                </div> -->
                </div>
            </div>
        </div><!-- End Vertically centered Modal-->
    @endsection
    @section('script')
    <script>
        var modalInspeksi = document.getElementById('modalInspeksi')
        modalInspeksi.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-bs-id')
        var id2 = button.getAttribute('data-bs-id')
        var tanggal = button.getAttribute('data-bs-tanggal')
        var il = button.getAttribute('data-bs-il')
        var lokasi = button.getAttribute('data-bs-lokasi')
        var qr = button.getAttribute('data-bs-qr')
        var tuas = button.getAttribute('data-bs-tuas')
        var segel = button.getAttribute('data-bs-segel')
        var pin = button.getAttribute('data-bs-pin')
        var selang = button.getAttribute('data-bs-selang')
        var nozzle = button.getAttribute('data-bs-nozzle')
        var pressure = button.getAttribute('data-bs-pressure')
        var tabung = button.getAttribute('data-bs-tabung')
        var barcode = button.getAttribute('data-bs-barcode')
        var inspector = button.getAttribute('data-bs-inspector')
        var keterangan = button.getAttribute('data-bs-keterangan')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = modalInspeksi.querySelector('.modal-title')
        var inputId = modalInspeksi.querySelector('.modal-body .id')
        var inputId2 = modalInspeksi.querySelector('.modal-body .id2')
        var inputTanggal = modalInspeksi.querySelector('.modal-body #tanggal')
        var inputIl = modalInspeksi.querySelector('.modal-body #id_lokasi')
        var inputLokasi = modalInspeksi.querySelector('.modal-body #lokasi')
        var inputIdentitas = modalInspeksi.querySelector('.modal-body #identitas')
        var inputTuas = modalInspeksi.querySelector('.modal-body #tuas')
        var inputSegel = modalInspeksi.querySelector('.modal-body #segel_tuas')
        var inputPin = modalInspeksi.querySelector('.modal-body #pin')
        var inputSelang = modalInspeksi.querySelector('.modal-body #selang')
        var inputNozzle = modalInspeksi.querySelector('.modal-body #nozzle')
        var inputPressure = modalInspeksi.querySelector('.modal-body #pressure')
        var inputTabung = modalInspeksi.querySelector('.modal-body #tabung')
        var inputBarcode = modalInspeksi.querySelector('.modal-body #barcode')
        var inputInspector = modalInspeksi.querySelector('.modal-body #inspector')
        var inputKeterangan = modalInspeksi.querySelector('.modal-body #keterangan')

        modalTitle.textContent = 'Data inspeksi APAR ' + qr 
        inputId.value = id
        inputId2.value = id2
        inputTanggal.value = tanggal
        inputIl.value = il
        inputLokasi.value = lokasi
        inputIdentitas.value = qr
        inputTuas.value = tuas
        inputSegel.value = segel
        inputPin.value = pin
        inputSelang.value = selang
        inputNozzle.value = nozzle
        inputPressure.value = pressure
        inputTabung.value = tabung
        inputBarcode.value = barcode
        inputInspector.value = inspector
        inputKeterangan.value = keterangan
        })
    </script>
    @endsection