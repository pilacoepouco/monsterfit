<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Restaurante
 * 
 * @property int $idrestaurante
 * @property string|null $cnpj
 * @property string|null $logotipo
 * @property Carbon|null $horario_abertura
 * @property Carbon|null $horario_fechamento
 * @property int $usuario_idusuario
 * 
 * @property Usuario $usuario
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Restaurante extends Model
{
	protected $table = 'restaurante';
	protected $primaryKey = 'idrestaurante';
	public $timestamps = false;

	protected $casts = [
		'usuario_idusuario' => 'int'
	];

	protected $dates = [
		'horario_abertura',
		'horario_fechamento'
	];

	protected $fillable = [
		'cnpj',
		'logotipo',
		'horario_abertura',
		'horario_fechamento',
		'usuario_idusuario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario_idusuario');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'restaurante_idrestaurante');
	}
}
