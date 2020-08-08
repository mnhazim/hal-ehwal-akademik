@extends('admin_asset.master')

@section('top-header')
@include('sweetalert::alert')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url({{ asset('store/bg.jpeg') }}); background-size: cover;background-position: top top;">
<span class="mask bg-gradient-default opacity-6"></span>
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Rekod</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $jumlahRekod }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Aktiviti Diterima</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $jumlahRekodDiterima }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Aktiviti Bulan Ini</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $rekodBulanIni }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Aktiviti Tahun Ini</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $rekodTahunIni }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop


@section('content')
      <div class="row mt-5">
      <div class="col col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow border-0">
         <div class="card-header bg-default border-0">
            <div class="row align-items-center">
               <div class="col">
                  <h3 class="mb-0 text-white">Rekod</h3>
               </div>
               
               <div class="col text-right">
                  <a href="/admin/records/add" class="btn btn-sm btn-primary">+ Tambah Rekod</a>
                </div>
            </div>
         </div>
         <div class="table-responsive">
            <table class="table align-items-center table-flush">
               <thead class="thead-light">
                  <tr>
                    <th>Bill</th>
                    <th scope="col">Bil. Permohonan</th>
                    <th scope="col">Kod Subjek</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Tarikh Cipta</th>
                    <th></th>
                  </tr>
               </thead>
               <tbody>
               @php $bil = 1; @endphp
               @foreach($getRecord as $record)
                <tr>
                <td>{{ $bil++ }}</td>
                    <td scope="col">{{ $record->bill_permohonan }}</td>
                    <td scope="col">{{ $record->kod_subjek }}</td>
                    <td scope="col">{{ $record->kelas }}</td>
                    <td scope="col">{{ $record->nama }}</td>
                    <td scope="col">{{ $record->kategori }}</td>
                    <td scope="col">{{ $record->created_at }}</td>
                    <td><a href="/admin/records/detail/{{ $record->id }}" class="btn btn-icon-only btn-danger rounded-circle rejectrequest">
                     <span class="btn-inner--icon"><i class="ni ni-bold-right"></i></span>
               </a></td></tr>
               @endforeach
               </tbody>
            </table>
         </div>
         <div class="card-footer py-4">
            <nav aria-label="...">
               <ul class="pagination justify-content-end mb-0">
               </ul>
            </nav>
         </div>
      </div>
   </div>
      </div>
@stop