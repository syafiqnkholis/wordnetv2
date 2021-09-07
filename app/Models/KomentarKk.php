<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KomentarKk
 * 
 * @property int $id_komentar_kk
 * @property string|null $komentar_kk
 * @property string|null $desc_kk
 * @property int|null $id_kk
 * @property int|null $id_user
 * 
 * @property KataKerja|null $kata_kerja
 * @property User|null $user
 *
 * @package App\Models
 */
class KomentarKk extends Model
{
	protected $table = 'komentar_kk';
	protected $primaryKey = 'id_komentar_kk';
	public $timestamps = false;
	public $incrementing = true;

	protected $casts = [
		'id_kk' => 'int',
		'id_user' => 'int'
	];

	protected $fillable = [
		'komentar_kk',
		'desc_kk',
		'id_kk',
		'id_user'
	];

	public function kata_kerja()
	{
		return $this->belongsTo(KataKerja::class, 'id_kk');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
