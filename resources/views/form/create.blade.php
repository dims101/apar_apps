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
              <h5 class="card-title">Form Inspeksi APAR</h5>
              <p>Lakukan pengecekan APAR kemudian isi checksheet dibawah.</p>
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

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Keadaan Tuas:</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tuas" id="tuasOK" value="1" checked>
                                <label class="form-check-label" for="tuasOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tuas" id="tuasNG" value="0">
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
                                <input class="form-check-input" type="radio" name="segel_tuas" id="segel_tuasOK" value="1" checked>
                                <label class="form-check-label" for="segel_tuasOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="segel_tuas" id="segel_tuasNG" value="0">
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
                                <input class="form-check-input" type="radio" name="pin" id="pinOK" value="1" checked>
                                <label class="form-check-label" for="pinOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pin" id="pinNG" value="0">
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
                                <input class="form-check-input" type="radio" name="selang" id="selangOK" value="1" checked>
                                <label class="form-check-label" for="selangOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="selang" id="selangNG" value="0">
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
                                <input class="form-check-input" type="radio" name="nozzle" id="nozzleOK" value="1" checked>
                                <label class="form-check-label" for="nozzleOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nozzle" id="nozzleNG" value="0">
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
                                <input class="form-check-input" type="radio" name="pressure" id="pressureOK" value="1" checked>
                                <label class="form-check-label" for="pressureOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pressure" id="pressureNG" value="0">
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
                                <input class="form-check-input" type="radio" name="tabung" id="tabungOK" value="1" checked>
                                <label class="form-check-label" for="tabungOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tabung" id="tabungNG" value="0">
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
                                <input class="form-check-input" type="radio" name="barcode" id="barcodeOK" value="1" checked>
                                <label class="form-check-label" for="barcodeOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="barcode" id="barcodeNG" value="0">
                                <label class="form-check-label" for="barcodeNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status Pengecekan</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusOK" value="1" checked>
                                <label class="form-check-label" for="statusOK">
                                    OK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusNG" value="0">
                                <label class="form-check-label" for="statusNG">
                                    NG
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    
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