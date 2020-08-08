@extends('admin_asset.master')

@section('top-header')
@include('sweetalert::alert')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
        </div>
      </div>
    </div>
@stop


@section('content')
<div class="row">
   <div class="col-xl-12 order-xl-1">
      <form action="/admin/records/update" method="post">
         @csrf
         <input type="hidden" name="id" value="{{ $record->id }}" >
         <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                  <div class="col-8">
                     <h3 class="mb-0">Hasil Aktiviti-Penilaian Prestasi(PI)</h3>
                  </div>
                  <div class="col-4 text-right">
                     <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <h6 class="heading-small text-muted mb-4">Anjuran</h6>
               <div class="pl-lg-4">
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Tarikh Terima Permohonan</label>
                           <input type="date" value="{{\Carbon\Carbon::parse($record->tarikh_terima_permohonan)->format('Y-m-d') }}" name="tarikhterima" class="form-control form-control-alternative" placeholder="Tarikh Terima Permohonan.." autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Bil. Permohonan</label>
                           <input type="number" step=1 value="{{ $record->bill_permohonan }}" name="bilpermohonan" step=1 class="form-control form-control-alternative" placeholder="Bil. Permohonan.." autocomplete="off" required>
                        </div>
                     </div>
                     
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Kod Subjek</label>
                           <input type="text" value="{{ $record->kod_subjek }}" name="kodsubjek" step=1 class="form-control form-control-alternative" placeholder="Kod Subjek.." autocomplete="off" required>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="form-group">
                           <label class="form-control-label">Nama Activiti</label>
                           <input type="text"  name="namaaktiviti" value="{{ $record->nama }}" class="form-control form-control-alternative" placeholder="Nama Aktiviti.. " autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Kelas</label>
                           <input type="text" value="{{ $record->kelas }}" name="kelas" class="form-control form-control-alternative" placeholder="Kelas.." autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-control-label">Kategori Aktiviti</label>
                           <input type="text" id="" name="kategoriaktiviti" value="{{ $record->kategori }}" class="form-control form-control-alternative" placeholder="Kategori Aktiviti.." autocomplete="off" required>
                        </div>
                     </div>
                     </div>
                     <div class="row">
                     
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-control-label">Pengajaran & Pembelajaran</label>
                           <!-- Table  -->
                        <table class="table table-bordered">
                        <!-- Table head -->
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Kod</th>
                              <th>Pengajaran & Pembelajaran</th>
                           </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody>
                           @foreach($listpnp as $pnp)
                           <tr>
                              <th scope="row">
                              <!-- Default unchecked -->
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" name="pnp[]" value="{{ $pnp->id }}" {{ (in_array($pnp->id, $pnpId, false)) ? 'checked' : '' }} class="custom-control-input" id="tablePnp{{ $pnp->id }}">
                                 <label class="custom-control-label" for="tablePnp{{ $pnp->id }}"></label>
                              </div>
                              </th>
                              <td>{{ $pnp->code }}</td>
                              <td>{{ $pnp->title }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <!-- Table body -->
                        </table>
                        <!-- Table  -->
                        </div>
                     </div>

                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-control-label">Akademia, Industri & Masyarakat</label>
                           <!-- Table  -->
                        <table class="table table-bordered">
                        <!-- Table head -->
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Kod</th>
                              <th>Akademia, Industri & Masyarakat</th>
                           </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody>
                           @foreach($listaim as $aim)
                           <tr>
                              <th scope="row">
                              <!-- Default unchecked -->
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" name="aim[]" value="{{ $aim->id }}" {{ (in_array($aim->id, $aimId, false)) ? 'checked' : '' }} class="custom-control-input" id="tableAim{{ $aim->id }}">
                                 <label class="custom-control-label" for="tableAim{{ $aim->id }}"></label>
                              </div>
                              </th>
                              <td>{{ $aim->code }}</td>
                              <td>{{ $aim->title }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <!-- Table body -->
                        </table>
                        <!-- Table  -->
                        </div>
                     </div>

                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-control-label">Kepimpian</label>
                           <!-- Table  -->
                        <table class="table table-bordered">
                        <!-- Table head -->
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Kod</th>
                              <th>Kepimpian</th>
                           </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody>
                           @foreach($listkepimpinan as $kepimpinan)
                           <tr>
                              <th scope="row">
                              <!-- Default unchecked -->
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" name="kepimpinan[]" value="{{ $kepimpinan->id }}" {{ (in_array($kepimpinan->id, $kepimpinanId, false)) ? 'checked' : '' }} class="custom-control-input" id="tableKepimpinan{{ $kepimpinan->id }}">
                                 <label class="custom-control-label" for="tableKepimpinan{{ $kepimpinan->id }}"></label>
                              </div>
                              </th>
                              <td>{{ $kepimpinan->code }}</td>
                              <td>{{ $kepimpinan->title }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <!-- Table body -->
                        </table>
                        <!-- Table  -->
                        </div>
                     </div>

                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-control-label">Keusahawanan</label>
                           <!-- Table  -->
                        <table class="table table-bordered">
                        <!-- Table head -->
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Kod</th>
                              <th>Keusahawanan</th>
                           </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody>
                           @foreach($listkeusahawanan as $keusahawanan)
                           <tr>
                              <th scope="row">
                              <!-- Default unchecked -->
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" name="keusahawanan[]" value="{{ $keusahawanan->id }}" {{ (in_array($keusahawanan->id, $keusahawananId, false)) ? 'checked' : '' }} class="custom-control-input" id="tableKeusahawanan{{ $keusahawanan->id }}">
                                 <label class="custom-control-label" for="tableKeusahawanan{{ $keusahawanan->id }}"></label>
                              </div>
                              </th>
                              <td>{{ $keusahawanan->code }}</td>
                              <td>{{ $keusahawanan->title }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <!-- Table body -->
                        </table>
                        <!-- Table  -->
                        </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Tarikh</label>
                           <input type="date" id="" name="tarikh" value="{{\Carbon\Carbon::parse($record->tarikh)->format('Y-m-d') }}" class="form-control form-control-alternative" placeholder="Tarikh.." autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Bil. Peserta</label>
                           <input type="number" step=1 id="" name="bilpeserta" value="{{ $record->bil_peserta }}" class="form-control form-control-alternative" placeholder="Bil. Peserta" autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Jumlah Pegawai Pengiring</label>
                           <input type="number" step=1 id="" name="jumlahpegawai" value="{{ $record->jumlah_peg_pengiring }}" class="form-control form-control-alternative" placeholder="Jumlah Pegawai Pengiring" autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Tempat</label>
                           <input type="text" id="" name="tempat" value="{{ $record->tempat }}" class="form-control form-control-alternative" placeholder="Tempat.." autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Ketua Project / No. Telefon Bimbit</label>
                           <input type="text" id="" name="ketuaproject" value="{{ $record->kp_notel }}" class="form-control form-control-alternative" placeholder="Ketua Project / No. Telefon Bimbit.." autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Anggaran Kos (RM)</label>
                           <input type="number" step=0.01 id="" name="anggarankos" value="{{ $record->anggaran_kos }}" class="form-control form-control-alternative" placeholder="Anggaran Kos.." autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Kos Yang Diluluskan (RM)</label>
                           <input type="number" step=0.01 id="" name="kosdiluluskan" value="{{ $record->kos_diluluskan }}" class="form-control form-control-alternative" placeholder="Kos Yang Diluluskan.." autocomplete="off" required>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label class="form-control-label">Pindaan Tarikh / Pindaan Tempat / Batal Program</label>
                           <textarea rows="4" name="catatan" class="form-control form-control-alternative" placeholder="Pindaan Tarikh / Pindaan Tempat / Batal Program ...">{{ $record->catatan }}</textarea>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label class="form-control-label">Laporan Aktiviti / Tarikh Terima</label>
                           <input type="date" id="" name="laporanaktiviti_tarikhterima" value="{{\Carbon\Carbon::parse($record->tarikh_terima)->format('Y-m-d') }}" class="form-control form-control-alternative" placeholder="Laporan Aktiviti / Tarikh Terima.." autocomplete="off" required>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>
   </form>
</div>
      
@stop
