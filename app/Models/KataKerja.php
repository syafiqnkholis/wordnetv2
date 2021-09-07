<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KataKerja
 * 
 * @property int $id_kk
 * @property string|null $nama_kk
 * @property string|null $desc_kk
 * @property int|null $id_kategori
 * 
 * @property Kategori|null $kategori
 * @property Collection|KomentarKk[] $komentar_kks
 * @property Collection|RelationsKk[] $relations_kks
 *
 * @package App\Models
 */
class KataKerja extends Model
{
	protected $table = 'kata_kerjas';
	protected $primaryKey = 'id_kk';
	public $timestamps = false;
	public $incrementing = true;

	protected $casts = [
		'id_kategori' => 'int'
	];

	protected $fillable = [
		'nama_kk',
		'desc_kk',
		'id_kategori'
	];

	public function kategori()
	{
		return $this->belongsTo(Kategori::class, 'id_kategori');
	}

	public function komentar_kks()
	{
		return $this->hasMany(KomentarKk::class, 'id_kk');
	}

	public function relations()
	{
		return $this->hasMany(RelationsKk::class, 'id_kk');
	}
}
