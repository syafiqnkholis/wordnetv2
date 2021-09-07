<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Relation
 * 
 * @property int $id
 * @property int|null $id_kb
 * @property int|null $id_hipernim
 * @property int|null $kedalaman
 * 
 * @property Hipernim|null $hipernim
 * @property KataBenda|null $kata_benda
 *
 * @package App\Models
 */
class Relation extends Model
{
	protected $table = 'relations';
	public $timestamps = false;
	public $incrementing = true;

	protected $casts = [
		'id_kb' => 'int',
		'id_hipernim' => 'int',
		'kedalaman' => 'int'
	];

	protected $fillable = [
		'id_kb',
		'id_hipernim',
		'kedalaman'
	];

	public function hipernim()
	{
		return $this->belongsTo(Hipernim::class, 'id_hipernim');
	}

	public function kata_benda()
	{
		return $this->belongsTo(KataBenda::class, 'id_kb');
	}
}
