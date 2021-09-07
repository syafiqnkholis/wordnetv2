<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KataBenda
 * 
 * @property int $id_kb
 * @property string|null $nama_kb
 * @property string|null $desc_kb
 * @property int|null $id_kategori
 * 
 * @property Kategori|null $kategori
 * @property Collection|KomentarKb[] $komentar_kbs
 * @property Collection|Relation[] $relations
 *
 * @package App\Models
 */
class KataBenda extends Model
{
	protected $table = 'kata_bendas';
	protected $primaryKey = 'id_kb';
	public $timestamps = false;
	public $incrementing = true;

	protected $casts = [
		'id_kategori' => 'int'
	];

	protected $fillable = [
		'nama_kb',
		'desc_kb',
		'id_kategori'
	];

	public function kategori()
	{
		return $this->belongsTo(Kategori::class, 'id_kategori');
	}

	public function komentar_kbs()
	{
		return $this->hasMany(KomentarKb::class, 'id_kb');
	}

	public function relations()
	{
		return $this->hasMany(Relation::class, 'id_kb');
	}
}
