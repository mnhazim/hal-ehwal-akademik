<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $tarikh_terima_permohonan
 * @property string $bill_permohonan
 * @property string $kod_subjeck
 * @property string $kelas
 * @property string $nama
 * @property string $kategori
 * @property string $pnp
 * @property string $aim
 * @property string $kepimpinan
 * @property string $keusahawanan
 * @property string $tarikh
 * @property int $bil_peserta
 * @property int $jumlah_peg_pengiring
 * @property string $tempat
 * @property string $kp_notel
 * @property float $anggaran_kos
 * @property float $kos_diluluskan
 * @property string $catatan
 * @property string $tarikh_terima
 * @property string $created_at
 * @property string $updated_at
 */
class Records extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['tarikh_terima_permohonan', 'bill_permohonan', 'kod_subjeck', 'kelas', 'nama', 'kategori', 'pnp', 'aim', 'kepimpinan', 'keusahawanan', 'tarikh', 'bil_peserta', 'jumlah_peg_pengiring', 'tempat', 'kp_notel', 'anggaran_kos', 'kos_diluluskan', 'catatan', 'tarikh_terima', 'created_at', 'updated_at'];

}
