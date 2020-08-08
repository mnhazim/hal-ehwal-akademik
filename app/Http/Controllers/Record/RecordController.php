<?php

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Records;
use Alert;
use App\ListAim;
use App\ListPnp;
use App\ListKepimpinan;
use App\ListKeusahawanan;

class RecordController extends Controller
{
    public function index(){

    }

    public function details($id){
        $record = Records::findOrFail($id);

        $pnpId = (array) json_decode($record->pnp, true);
        $aimId = (array) json_decode($record->aim, true);
        $kepimpinanId = (array) json_decode($record->kepimpinan, true);
        $keusahawananId = (array) json_decode($record->keusahawanan, true);

        $listpnp = ListPnp::whereIn('id', $pnpId)->get();
        $listaim = ListAim::whereIn('id', $aimId)->get();
        $listkepimpinan = ListKepimpinan::whereIn('id', $kepimpinanId)->get();
        $listkeusahawanan = ListKeusahawanan::whereIn('id', $keusahawananId)->get();


        $listkepimpinan = ListKepimpinan::all();
        $listkeusahawanan = ListKeusahawanan::all();

        return view('admin_content.detailrecord', compact('record', 'listpnp', 'listaim', 'listkepimpinan', 'listkeusahawanan'));

    }
    
    public function preAdd(){
        $user = User::find(Auth::user()->id);
        $listpnp = ListPnp::all();
        $listaim = ListAim::all();
        $listkepimpinan = ListKepimpinan::all();
        $listkeusahawanan = ListKeusahawanan::all();

        return view('admin_content.addrecord', compact('listpnp', 'listaim', 'listkepimpinan', 'listkeusahawanan'));
    }

    public function addRecord(Request $request){
        $validator = Validator::make($request->all(), [
            'tarikhterima' => 'required|date',
            'bilpermohonan' => 'required|string',
            'kodsubjek' => 'required|string',
            'namaaktiviti' => 'required|string',
            'kelas' => 'required|string',
            'kategoriaktiviti' =>'required|string',
        ]);

        if ($validator->fails()) {
            Alert::error('Fatal', 'Data tidak dapat dimasukkan. cuba lagi');
            return redirect('/admin');
        }

        $record = new Records;
        $record->tarikh_terima_permohonan = $request->tarikhterima;
        $record->bill_permohonan = $request->bilpermohonan;
        $record->kod_subjek = $request->kodsubjek;
        $record->kelas = $request->kelas;
        $record->nama = $request->namaaktiviti;
        $record->kategori = $request->kategoriaktiviti;
        $record->pnp = json_encode($request->pnp);
        $record->aim = json_encode($request->aim);
        $record->kepimpinan = json_encode($request->kepimpinan);
        $record->keusahawanan = json_encode($request->keusahawanan);
        $record->tarikh = $request->tarikh;
        $record->bil_peserta = $request->bilpeserta;
        $record->jumlah_peg_pengiring = $request->jumlahpegawai;
        $record->tempat = $request->tempat;
        $record->kp_notel = $request->ketuaproject;
        $record->anggaran_kos = $request->anggarankos;
        $record->kos_diluluskan = $request->kosdiluluskan;
        $record->catatan = $request->catatan;
        $record->tarikh_terima = $request->laporanaktiviti_tarikhterima;
        $record->save();

        Alert::success('Berjaya', 'Data berjaya ditambah.');
        return redirect('/admin');
    }

    public function preUpdate($id){

        $record = Records::findOrFail($id);

        $aimId = (array) json_decode($record->aim, true);
        $pnpId = (array) json_decode($record->pnp, true);
        $kepimpinanId = (array) json_decode($record->kepimpinan, true);
        $keusahawananId = (array) json_decode($record->keusahawanan, true);
        
        $listpnp = ListPnp::all();
        $listaim = ListAim::all();
        $listkepimpinan = ListKepimpinan::all();
        $listkeusahawanan = ListKeusahawanan::all();

        
        $aimId = json_decode($record->aim);
        return view('admin_content.updaterecord', compact('record', 'listpnp', 'listaim', 'listkepimpinan', 'listkeusahawanan', 'aimId', 'pnpId', 'kepimpinanId', 'keusahawananId'));
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'tarikhterima' => 'required|date',
            'id' => 'required|integer|exists:records,id',
            'bilpermohonan' => 'required|string',
            'kodsubjek' => 'required|string',
            'namaaktiviti' => 'required|string',
            'kelas' => 'required|string',
            'kategoriaktiviti' =>'required|string',
        ]);

        if ($validator->fails()) {
            Alert::error('Fatal', 'Data tidak dapat dimasukkan. cuba lagi');
            return redirect('/admin');
        }


        $record = Records::findOrFail($request->id);
        $record->tarikh_terima_permohonan = $request->tarikhterima;
        $record->bill_permohonan = $request->bilpermohonan;
        $record->kod_subjek = $request->kodsubjek;
        $record->kelas = $request->kelas;
        $record->nama = $request->namaaktiviti;
        $record->kategori = $request->kategoriaktiviti;
        $record->pnp = json_encode($request->pnp);
        $record->aim = json_encode($request->aim);
        $record->kepimpinan = json_encode($request->kepimpinan);
        $record->keusahawanan = json_encode($request->keusahawanan);
        $record->tarikh = $request->tarikh;
        $record->bil_peserta = $request->bilpeserta;
        $record->jumlah_peg_pengiring = $request->jumlahpegawai;
        $record->tempat = $request->tempat;
        $record->kp_notel = $request->ketuaproject;
        $record->anggaran_kos = $request->anggarankos;
        $record->kos_diluluskan = $request->kosdiluluskan;
        $record->catatan = $request->catatan;
        $record->tarikh_terima = $request->laporanaktiviti_tarikhterima;
        if(!$record->save()){
            Alert::error('Fatal', 'Data tidak dapat dikemaskini. cuba lagi');
            return redirect('/admin');
        }
        

        Alert::success('Berjaya', 'Data berjaya dikemaskini.');
        return redirect('/admin');
    }

    public function delete(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:records,id',
        ]);

        if ($validator->fails()) {
            Alert::error('Fatal', 'Tidak Berjaya. Sila cuba lagi');
            return redirect('/admin');
        }

        $getRecord = Records::findOrFail($request->id);
        $getRecord->delete();

        Alert::success('Berjaya', 'Data berjaya dipadam.');
        return redirect('/admin');

    }
}
