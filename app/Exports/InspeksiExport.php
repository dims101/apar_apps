<?php

namespace App\Exports;

use App\Form;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InspeksiExport implements FromCollection, WithHeadings
{
    protected $tanggal;

    function __construct($tanggalEkspor) {
            $this->tanggalEkspor = $tanggalEkspor;
    }
    /**
    * @return \Illuminate\Support\Collection

    */
    public function headings(): array
    {
        return [
            'Identitas APAR',
            'No. Lokasi',
            'Lokasi APAR',
            'Tuas',
            'Segel Tuas',
            'Pin',
            'Selang',
            'Pressure',
            'Tabung',
            'Nozzle',
            'Barcode',
            'Keterangan',
            'Tanggal Inspeksi',
            'Inspektor',
        ];
    }
    public function collection()
    {
        $tanggal = new Carbon($this->tanggalEkspor);
        
       return Form::select(
            'apars.qr_apar',
            'apars.id_lokasi',
            'apars.lokasi',
            'forms.tuas',
            'forms.segel_tuas',
            'forms.pin',
            'forms.selang',
            'forms.pressure',
            'forms.tabung',
            'forms.nozzle',
            'forms.barcode',
            'forms.keterangan',
            'forms.created_at',
            'users.nama')
        ->leftjoin('apars','forms.id_apar','=','apars.id')
        ->leftjoin('users','forms.id_user','=','users.id')
        ->whereMonth('forms.created_at',$tanggal->month)
        ->whereYear('forms.created_at',$tanggal->year)
        ->get();
    }
}
