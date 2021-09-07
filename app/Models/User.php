<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $role
 * 
 * @property Collection|KomentarKb[] $komentar_kbs
 * @property Collection|KomentarKk[] $komentar_kks
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'role'
	];

	public function komentar_kbs()
	{
		return $this->hasMany(KomentarKb::class, 'id_user');
	}

	public function komentar_kks()
	{
		return $this->hasMany(KomentarKk::class, 'id_user');
	}
}
