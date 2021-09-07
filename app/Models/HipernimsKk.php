<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HipernimsKk
 * 
 * @property int $id_hipernim_kk
 * @property string|null $hipernim_kk
 * @property string|null $desc_hipernim_kk
 * 
 * @property Collection|RelationsKk[] $relations_kks
 *
 * @package App\Models
 */
class HipernimsKk extends Model
{
	protected $table = 'hipernims_kk';
	protected $primaryKey = 'id_hipernim_kk';
	public $timestamps = false;
	public $incrementing = true;

	protected $fillable = [
		'hipernim_kk',
		'desc_hipernim_kk'
	];

	public function relations_kks()
	{
		return $this->hasMany(RelationsKk::class, 'id_hipernim');
	}
}
