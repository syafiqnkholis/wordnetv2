<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KomentarKb
 * 
 * @property int $id_komentar_kb
 * @property string|null $komentar_kb
 * @property string|null $desc_kb
 * @property int|null $id_kb
 * @property int|null $id_user
 * 
 * @property KataBenda|null $kata_benda
 * @property User|null $user
 *
 * @package App\Models
 */
class KomentarKb extends Model
{
	protected $table = 'komentar_kb';
	protected $primaryKey = 'id_komentar_kb';
	public $timestamps = false;
	public $incrementing = true;

	protected $casts = [
		'id_kb' => 'int',
		'id_user' => 'int'
	];

	protected $fillable = [
		'komentar_kb',
		'desc_kb',
		'id_kb',
		'id_user'
	];

	public function kata_benda()
	{
		return $this->belongsTo(KataBenda::class, 'id_kb');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
