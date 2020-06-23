<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resultado
 * 
 * @property int $idResultado
 * @property int|null $semana
 * @property float|null $peso
 * @property float|null $bf
 * @property int $dieta_iddieta
 * 
 * @property Dietum $dietum
 *
 * @package App\Models
 */
class Resultado extends Model
{
	protected $table = 'resultado';
	protected $primaryKey = 'idResultado';
	public $timestamps = false;

	protected $casts = [
		'semana' => 'int',
		'peso' => 'float',
		'bf' => 'float',
		'dieta_iddieta' => 'int'
	];

	protected $fillable = [
		'semana',
		'peso',
		'bf',
		'dieta_iddieta'
	];

	public function dietum()
	{
		return $this->belongsTo(Dietum::class, 'dieta_iddieta');
	}
}
