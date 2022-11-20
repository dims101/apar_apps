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
                                <tr class="{{$today > $a->warn_date ? 'table-warning' :''}} {{$today > $a->exp_date ? 'table-danger text-weight-bold' :''}}"
                                    data-bs-toggle="modal" data-bs-target="#edit" 
                                    data-bs-qr="{{$a->qr_apar}}"
                                    data-bs-merk="{{$a->merk}}"
                                    data-bs-jenis="{{$a->jenis}}"
                                    data-bs-lokasi="{{$a->lokasi}}"
                                    data-bs-exp="{{$a->exp_date}}"
                                    data-bs-il="{{$a->id_lokasi}}"
                                    data-bs-id="{{$a->id}}"
                                >
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
                                <input type="text" name="qr_apar" class="form-control identitas" id="identitas" placeholder="Masukan identitas APAR" required>
                                <label for="identitas">Masukan identitas APAR</label>
                            </div>
                            <div class="validasi d-block">
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
                                <input type="text" name="id_lokasi" class="form-control" id="id_lokasi" placeholder="Masukan No. lokasi APAR" required>
                                <label for="id_lokasi">Masukan No. lokasi APAR</label>
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

        <div class="modal fade" id="edit" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">   
                    <div class="container">
                        Untuk mengedit APAR silahkan isi data APAR pada form dibawah.                        
                    </div>           
                    <hr>                            
                    <form class="row g-3" action="/apar/edit" method="post" onSubmit="return confirm('Pastikan data terisi dengan benar. \nKetuk Oke untuk menyimpan.');">  
                        @csrf           
                        @method('put')           
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="qr_apar" class="form-control identitas" id="identitas" placeholder="Masukan identitas APAR" required>
                                <label for="identitas">Masukan identitas APAR</label>
                                <input type="hidden" name="id" id="id2">
                            </div>                            
                        </div>
                        <div class="validasi d-block">
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
                            <div class="form-floating">
                                <input type="text" name="id_lokasi" class="form-control" id="id_lokasi" placeholder="Masukan No. lokasi APAR" required>
                                <label for="id_lokasi">Masukan No. lokasi APAR</label>
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
                            </form>
                            <form class="d-inline" action="/apar/delete" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" id="id">
                                <button type="submit" class="btn btn-danger" onClick="return confirm('Yakin untuk menghapus?');">Hapus</button>
                            </form>
                        </div>
                    
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
                </div> -->
                </div>
            </div>
        </div><!-- End Vertically centered Modal-->

        <div class="modal fade" id="popup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Perhatian!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">   
                    <div class="container">
                        Mohon segera buat memo untuk APAR yang mendekati kadaluwarsa/sudah kadaluwarsa.
                    </div>         
                    <hr>                  
                    <div class="container">
                        <h6>Identitas dan lokasi APAR:</h6>
                        <ol class="list-group list-group-numbered list-group-flush">
                            @foreach($expired as $e)
                            <li class="list-group-item">{{$e->qr_apar}} <i class="bx bxs-right-arrow-square"> </i> {{$e->lokasi}}</li>
                            @endforeach
                        </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
                </div>
                </div>
            </div>
        </div><!-- End Vertically centered Modal-->
    </section>
    @endsection
    @section('script')
    <script>
        var modalEdit = document.getElementById('edit')
        modalEdit.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var qr = button.getAttribute('data-bs-qr')
        var merk = button.getAttribute('data-bs-merk')
        var jenis = button.getAttribute('data-bs-jenis')
        var lokasi = button.getAttribute('data-bs-lokasi')
        var exp = button.getAttribute('data-bs-exp')
        var il = button.getAttribute('data-bs-il')
        var id = button.getAttribute('data-bs-id')
        var id2 = button.getAttribute('data-bs-id')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = modalEdit.querySelector('.modal-title')
        var inputIdentitas = modalEdit.querySelector('.modal-body #identitas')
        var inputMerk = modalEdit.querySelector('.modal-body #merk')
        var inputJenis = modalEdit.querySelector('.modal-body #jenis')
        var inputLokasi = modalEdit.querySelector('.modal-body #lokasi')
        var inputExp = modalEdit.querySelector('.modal-body #exp_date')
        var inputIl = modalEdit.querySelector('.modal-body #id_lokasi')
        var inputId = modalEdit.querySelector('.modal-body #id')
        var inputId2 = modalEdit.querySelector('.modal-body #id2')

        modalTitle.textContent = 'Edit data ' + qr
        inputIdentitas.value = qr
        inputMerk.value = merk
        inputJenis.value = jenis
        inputLokasi.value = lokasi
        inputExp.value = exp
        inputIl.value = il
        inputId.value = id
        inputId2.value = id2
        })
    </script>
    <script>
        $(document).ready(function(){

        $(".identitas").focusout(function(){
            var qr_apar = $(this).val().trim();
            // alert(qr_apar);
            if(qr_apar != ''){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/cekid',
                    type: 'post',
                    data: {
                            _methode : "POST",
                            _token: CSRF_TOKEN, 
                            qr_apar : qr_apar
                        },  
                    success: function(response){
                        
                        if(response.status == 1){
                            $(".identitas").addClass("is-valid").removeClass('is-invalid');
                            $(".validasi").addClass('valid-feedback').removeClass('invalid-feedback');
                            $('.validasi').text(response.message);
                        } else {
                            $(".identitas").addClass("is-invalid").removeClass('is-valid');
                            $(".validasi").addClass('invalid-feedback').removeClass('valid-feedback');
                            $('.validasi').text(response.message);
                        }
                    }
                });
            }else{
                $('.identitas').removeClass('is-valid').removeClass('is-invalid');
                $('.validasi').text("");
            }

            });

        });
    </script>
    <script>
            $(window).on('load',function(){
                var data = {{count($expired)}};
                if(data > 0){
                    $('#popup').modal('show');
                }
            });
            $("#edit").on("hidden.bs.modal", function () {
                $('.identitas').removeClass('is-valid').removeClass('is-invalid');
                $('.validasi').text("");
            });
            $("#tambah").on("hidden.bs.modal", function () {
                $('.identitas').removeClass('is-valid').removeClass('is-invalid');
                $('.validasi').text("");
            });
        </script>
    @endsection