@extends('layouts.app', [
    'activePage' => 'Form',
    'titlePage' => __('Form Inspection'),
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
                <div class="row">
                    <h5 class="card-title">Form Inspeksi APAR</h5>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#petunjuk">
                        Baca petunjuk inspeksi
                    </button>
                </div>
                <div class="modal fade" id="petunjuk" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Petunjuk inspeksi APAR</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                1. Pastikan APAR tidak terhalang dan dalam kondisi siap digunakan </br>
                                2. Pastikan APAR tidak mengalami kerusakan fisik, korosi, karat, atau cacat lainnya </br>
                                3. Periksa tanggal kadaluarsa </br>
                                4. Pastikan pressure dalam batas hijau </br>
                                5. Pastikan APAR terdapat petunjuk pemakaian APAR dan tanda APAR </br>
                                6. Bersihkan APAR apabila APAR dalam keadan kotor & berdebu</br>
                                7. APAR jenis powder harus dibolak-balik sebanyak 3 - 5 kali
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
                            </div>
                        </div>
                    </div>
                </div><!-- End Vertically centered Modal-->
                <br>
                <form method="post" action="/form/store" onSubmit="return confirm('Pastikan data terisi dengan benar. \nKetuk Oke untuk menyimpan.');">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputInspector" class="col-sm-2 col-form-label">Inspector</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputInspector" value="{{auth()->user()->nama}} ({{auth()->user()->penneng}})" readonly>
                            <input type="hidden" value="{{auth()->user()->id}}" name="id_user">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputAPAR" class="col-sm-2 col-form-label">Identitas APAR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAPAR" value="{{$apar->qr_apar}}" readonly>
                            <input type="hidden" value ="{{$apar->id}}" name="id_apar">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputLokasi" class="col-sm-2 col-form-label">Lokasi APAR</label>
                        <div class="col-sm-10">
                            <input type="text" name="lokasi" class="form-control" id="inputLokasi" value="{{$lokasi}}">                            
                        </div>
                    </div>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Keadaan Tuas:</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tuas" id="tuasOK" value="OK" checked>
                                <label class="form-check-label" for="tuasOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tuas" id="tuasNG" value="NG">
                                <label class="form-check-label" for="tuasNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Keadaan Segel Tuas:</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="segel_tuas" id="segel_tuasOK" value="OK" checked>
                                <label class="form-check-label" for="segel_tuasOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="segel_tuas" id="segel_tuasNG" value="NG">
                                <label class="form-check-label" for="segel_tuasNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Keadaan Pin:</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pin" id="pinOK" value="OK" checked>
                                <label class="form-check-label" for="pinOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pin" id="pinNG" value="NG">
                                <label class="form-check-label" for="pinNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Keadaan Selang:</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="selang" id="selangOK" value="OK" checked>
                                <label class="form-check-label" for="selangOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="selang" id="selangNG" value="NG">
                                <label class="form-check-label" for="selangNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Keadaan Nozzle:</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nozzle" id="nozzleOK" value="OK" checked>
                                <label class="form-check-label" for="nozzleOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nozzle" id="nozzleNG" value="NG">
                                <label class="form-check-label" for="nozzleNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Pressure APAR:</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pressure" id="pressureOK" value="OK" checked>
                                <label class="form-check-label" for="pressureOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pressure" id="pressureNG" value="NG">
                                <label class="form-check-label" for="pressureNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Keadaan Tabung:</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tabung" id="tabungOK" value="OK" checked>
                                <label class="form-check-label" for="tabungOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tabung" id="tabungNG" value="NG">
                                <label class="form-check-label" for="tabungNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Keadaan QRCode</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="barcode" id="barcodeOK" value="OK" checked>
                                <label class="form-check-label" for="barcodeOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="barcode" id="barcodeNG" value="NG">
                                <label class="form-check-label" for="barcodeNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <!-- <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status Pengecekan</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusOK" value="OK" checked>
                                <label class="form-check-label" for="statusOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusNG" value="NG">
                                <label class="form-check-label" for="statusNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset> -->
                    <input type="hidden" name="status" value="OK">
                    
                    <div class="row mb-3">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan tambahan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px" name="keterangan" id="keterangan"></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
          </div><!-- End Default Card -->
        </div>
      </div>
    </section>   
    @endsection
    @section('script')
        <script>
            $(window).on('load',function(){
                $('#petunjuk').modal('show');
            });
        </script>
    @endsection