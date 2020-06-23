<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nutricionista
 * 
 * @property int $idNutricionista
 * @property string|null $CRM
 * @property int $usuario_idusuario
 * 
 * @property Usuario $usuario
 * @property Collection|Dietum[] $dieta
 *
 * @package App\Models
 */
class Nutricionista extends Model
{
	protected $table = 'nutricionista';
	protected $primaryKey = 'idNutricionista';
	public $timestamps = false;

	protected $casts = [
		'usuario_idusuario' => 'int'
	];

	protected $fillable = [
		'CRM',
		'usuario_idusuario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario_idusuario');
	}

	public function dieta()
	{
		return $this->hasMany(Dietum::class, 'nutricionista_idNutricionista');
	}
}
