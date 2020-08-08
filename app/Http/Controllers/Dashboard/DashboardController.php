<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Records;
use Alert;
use Carbon\Carbon;
use App\ListAim;
use App\ListPnp;
use App\ListKepimpinan;
use App\ListKeusahawanan;

class DashboardController extends Controller
{
    public function index(){
        $getRecord = Records::get();
        $jumlahRekod = Records::get()->count('id');
        $jumlahRekodDiterima = Records::get()->whereNotNull('tarikh_terima')->count('id');
        $rekodBulanIni = Records::whereMonth('tarikh', '=', Carbon::now()->month)->whereYear('tarikh', '=', Carbon::now()->year)->count('id');
        $rekodTahunIni = Records::whereYear('tarikh', '=', Carbon::now()->year)->count('id');

        return view('admin_content.index', compact('getRecord', 'jumlahRekod', 'jumlahRekodDiterima', 'rekodTahunIni', 'rekodBulanIni'));
    }
}
