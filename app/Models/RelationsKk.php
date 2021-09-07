<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RelationsKk
 * 
 * @property int $id
 * @property int|null $id_kk
 * @property int|null $id_hipernim
 * @property int|null $kedalaman
 * 
 * @property HipernimsKk|null $hipernims_kk
 * @property KataKerja|null $kata_kerja
 *
 * @package App\Models
 */
class RelationsKk extends Model
{
	protected $table = 'relations_kk';
	public $timestamps = false;
	public $incrementing = true;

	protected $casts = [
		'id_kk' => 'int',
		'id_hipernim' => 'int',
		'kedalaman' => 'int'
	];

	protected $fillable = [
		'id_kk',
		'id_hipernim',
		'kedalaman'
	];

	public function hipernims_kk()
	{
		return $this->belongsTo(HipernimsKk::class, 'id_hipernim');
	}

	public function kata_kerja()
	{
		return $this->belongsTo(KataKerja::class, 'id_kk');
	}
}
