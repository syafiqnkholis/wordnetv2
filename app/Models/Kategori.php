<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kategori
 * 
 * @property int $id_kategori
 * @property string|null $nama_kategori
 * 
 * @property Collection|KataBenda[] $kata_bendas
 * @property Collection|KataKerja[] $kata_kerjas
 *
 * @package App\Models
 */
class Kategori extends Model
{
	protected $table = 'kategori';
	protected $primaryKey = 'id_kategori';
	public $timestamps = false;
	public $incrementing = true;

	protected $fillable = [
		'nama_kategori'
	];

	public function kata_bendas()
	{
		return $this->hasMany(KataBenda::class, 'id_kategori');
	}

	public function kata_kerjas()
	{
		return $this->hasMany(KataKerja::class, 'id_kategori');
	}
}
