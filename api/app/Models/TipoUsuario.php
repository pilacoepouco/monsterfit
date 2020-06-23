<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoUsuario
 * 
 * @property int $idtipo_usuario
 * @property string|null $tipo
 * 
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class TipoUsuario extends Model
{
	protected $table = 'tipo_usuario';
	protected $primaryKey = 'idtipo_usuario';
	public $timestamps = false;

	protected $fillable = [
		'tipo'
	];

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'tipo_usuario_idtipo_usuario');
	}
}
