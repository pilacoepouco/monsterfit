<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Administrador
 * 
 * @property int $usuario_idusuario
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Administrador extends Model
{
	protected $table = 'administrador';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'usuario_idusuario' => 'int'
	];

	protected $fillable = [
		'usuario_idusuario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario_idusuario');
	}
}
