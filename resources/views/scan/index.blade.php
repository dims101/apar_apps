@extends('layouts.app', [
    'activePage' => 'scan',
    'titlePage' => __('Scan QR APAR'),
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
                        <h5 class="card-title">Scan QRCode APAR</h5>
                        <div id="reader"></div>
                        <input type="hidden" name="result" id="result">
                    </div>
                </div><!-- End Default Card -->
            </div>
        </div>
    </section>
    <!-- HTML5 QRSCAN -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>    
    <script>
        function onScanSuccess(decodedText, decodedResult) {
                $('#result').val(decodedText);
                let id = decodedText;         
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    
                    $.ajax({    
                        @if(Auth::check())                  
                        url: "{{ route('validasi') }}",
                        @else
                        url: "{{ route('validasiTamu') }}",
                        @endif
                        type: 'POST',            
                        data: {
                            _methode : "POST",
                            _token: CSRF_TOKEN, 
                            qr_code : id
                        },            
                        success: function (response) { 
                            console.log(response);
                            if(response.status == 1){
                                alert(response.message);
                                let qs = response.id;
                                @if(Auth::check())
                                    window.location.href = '/form/' + qs;
                                @else                                    
                                    window.location.href = '/tamu/' + qs;
                                @endif
                            }else{
                                alert(response.message);
                            }
                            
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                            alert(XMLHttpRequest);
                            alert(textStatus);
                        }
                    });   
                // }).catch(error => {
                //     alert('something wrong');
                // });
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 2,
                qrbox: {
                    width: 150,
                    height: 150
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
