<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $idcliente
 * @property int|null $idade
 * @property int $usuario_idusuario
 * 
 * @property Usuario $usuario
 * @property Collection|Dietum[] $dieta
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'cliente';
	protected $primaryKey = 'idcliente';
	public $timestamps = false;

	protected $casts = [
		'idade' => 'int',
		'usuario_idusuario' => 'int'
	];

	protected $fillable = [
		'idade',
		'usuario_idusuario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario_idusuario');
	}

	public function dieta()
	{
		return $this->hasMany(Dietum::class, 'cliente_idcliente');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'cliente_idcliente');
	}
}
