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
<div class="row mt-5">
      <div class="col col-xl-12 mx-auto mb-5 mb-xl-0">
      <div class="card shadow border-0">
         <div class="card-header bg-primary border-0">
            <div class="row align-items-center">
               <div class="col">
                  <h3 class="mb-0 text-white">{{ $record->bill_permohonan . ' - ' . $record->nama }}</h3>
               </div>
            </div>
         </div>
         <div class="table-responsive">
            <table class="table align-items-center table-flush">
               <thead class="thead-light">
                  <tr>
                    <th scope="col" width="30%">Tarikh Terima Permohonan</th>
                    <td>{{ \Carbon\Carbon::parse($record->tarikh_terima_permohonan)->format('d/m/Y') }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Bil. Permohonan</th>
                    <td>{{ $record->bill_permohonan }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Kod Subjek</th>
                    <td>{{ $record->kod_subjek }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Kelas</th>
                    <td>{{ $record->kelas }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Nama Aktiviti</th>
                    <td>{{ $record->nama }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Kategori</th>
                    <td>{{ $record->kategori }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Pengajaran & Pembelajaran</th>
                    <td>
                    <ul class="list-group">
                      @if(count($listpnp) > 0)
                        @foreach($listpnp as $pnp)
                          <li>{{ $pnp->title }}</li>
                        @endforeach
                      @endif
                    </ul>
                    </td>
                  </tr>
                  <tr>
                    <th scope="col">Akademia, Industri & Masyarakat</th>
                    <td>
                    <ul class="list-group">
                      @if(count($listaim) > 0)
                        @foreach($listaim as $aim)
                          <li>{{ $aim->title }}</li>
                        @endforeach
                      @endif
                    </ul>
                    </td>
                  </tr>
                  <tr>
                    <th scope="col">Kepimpinan</th>
                    <td>
                    <ul class="list-group">
                      @if(count($listkepimpinan) > 0)
                        @foreach($listkepimpinan as $kepimpinan)
                          <li>{{ $kepimpinan->title }}</li>
                        @endforeach
                      @endif
                    </ul>
                    </td>
                  </tr>
                  <tr>
                    <th scope="col">Keusahawanan</th>
                    <td style="word-wrap: break-word">
                    <ul class="list-group">
                      @if(count($listkeusahawanan) > 0)
                        @foreach($listkeusahawanan as $keusahawanan)
                          <li>{{ $keusahawanan->title }}</li>
                        @endforeach
                      @endif
                    </ul>
                    </td>
                  </tr>
                  <tr>
                    <th scope="col">Tarikh</th>
                    <td>{{ \Carbon\Carbon::parse($record->tarikh)->format('d/m/Y') }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Bil. Peserta</th>
                    <td>{{ $record->bil_peserta }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Jumlah Pegawai Pengiring</th>
                    <td>{{ $record->jumlah_peg_pengiring }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Tempat</th>
                    <td>{{ $record->tempat }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Ketua Projek / No. Telefon Bimbit</th>
                    <td>{{ $record->kp_notel }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Anggaran Kos (RM)</th>
                    <td>{{ $record->anggaran_kos }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Kos Yang Diluluskan (RM)</th>
                    <td>{{ $record->kos_diluluskan }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Pindaan Tarikh / Pindaan Tempat / Batal Program</th>
                    <td>{{ $record->catatan }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Laporan Aktiviti / Tarikh Terima</th>
                    <td>{{ \Carbon\Carbon::parse($record->tarikh_terima)->format('d/m/Y') }}</td>
                  </tr>
               </thead>
               <tbody>
               </tbody>
            </table>
         </div>
         <div class="card-footer py-4">
          <button class='btn btn-default' onclick="window.location.href='/admin'">Kembali</button>
          <button class='btn btn-danger removeRecord' id="{{ $record->id }}">Padam</button>
          <a class='btn btn-info' href="/admin/records/update/{{ $record->id }}">Kemaskini</a>
         </div>
      </div>
   </div>
      </div>
@stop


@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
$( document ).ready(function() {
    $(".removeRecord").click(function(){
    var id = $(this).attr("id");
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
      title: 'Padam Data ini ?',
      text: "Data tidak akan dapat dikembalikan semula!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, padam data ini!',
      cancelButtonText: 'Tidak, Batal!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        redirect('/admin/records/delete', {
            "_token": "{{ csrf_token() }}",
            id:id
          },
        );
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Batal',
          'Batal',
          'error'
        )
      }
    })
  }); 
  
  function redirect(url, data) {
    var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = url;
    for (var name in data) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = data[name];
        form.appendChild(input);
    }
    form.submit();
}
});
</script>





@stop