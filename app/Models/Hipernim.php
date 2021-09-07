<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hipernim
 * 
 * @property int $id_hipernim
 * @property string|null $hipernim
 * @property string|null $desc_hipernim
 * 
 * @property Collection|Relation[] $relations
 *
 * @package App\Models
 */
class Hipernim extends Model
{
	protected $table = 'hipernims';
	protected $primaryKey = 'id_hipernim';
	public $timestamps = false;
	public $incrementing = true;


	protected $fillable = [
		'hipernim',
		'desc_hipernim'
	];

	public function relations()
	{
		return $this->hasMany(Relation::class, 'id_hipernim');
	}
}
