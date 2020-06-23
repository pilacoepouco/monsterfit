<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $idusuario
 * @property string|null $nome
 * @property Carbon|null $data_registro
 * @property int|null $status
 * @property string|null $telefone
 * @property string|null $endereco
 * @property string|null $senha
 * @property int $tipo_usuario_idtipo_usuario
 * 
 * @property TipoUsuario $tipo_usuario
 * @property Administrador $administrador
 * @property Collection|Cliente[] $clientes
 * @property Collection|Nutricionistum[] $nutricionista
 * @property Collection|Restaurante[] $restaurantes
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'idusuario';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'tipo_usuario_idtipo_usuario' => 'int'
	];

	protected $dates = [
		'data_registro'
	];

	protected $fillable = [
		'nome',
		'data_registro',
		'status',
		'telefone',
		'endereco',
		'senha',
		'tipo_usuario_idtipo_usuario'
	];

	public function tipo_usuario()
	{
		return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_idtipo_usuario');
	}

	public function administrador()
	{
		return $this->hasOne(Administrador::class, 'usuario_idusuario');
	}

	public function clientes()
	{
		return $this->hasMany(Cliente::class, 'usuario_idusuario');
	}

	public function nutricionista()
	{
		return $this->hasMany(Nutricionistum::class, 'usuario_idusuario');
	}

	public function restaurantes()
	{
		return $this->hasMany(Restaurante::class, 'usuario_idusuario');
	}
}
