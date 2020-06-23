<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dieta
 * 
 * @property int $iddieta
 * @property float|null $proteinas
 * @property float|null $carboidrato
 * @property float|null $gordura
 * @property float|null $calorias_totais
 * @property Carbon|null $data_inicio
 * @property Carbon|null $data_fim
 * @property int $nutricionista_idNutricionista
 * @property int $cliente_idcliente
 * 
 * @property Cliente $cliente
 * @property Nutricionistum $nutricionistum
 * @property Collection|Resultado[] $resultados
 *
 * @package App\Models
 */
class Dieta extends Model
{
	protected $table = 'dieta';
	protected $primaryKey = 'iddieta';
	public $timestamps = false;

	protected $casts = [
		'proteinas' => 'float',
		'carboidrato' => 'float',
		'gordura' => 'float',
		'calorias_totais' => 'float',
		'nutricionista_idNutricionista' => 'int',
		'cliente_idcliente' => 'int'
	];

	protected $dates = [
		'data_inicio',
		'data_fim'
	];

	protected $fillable = [
		'proteinas',
		'carboidrato',
		'gordura',
		'calorias_totais',
		'data_inicio',
		'data_fim',
		'nutricionista_idNutricionista',
		'cliente_idcliente'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'cliente_idcliente');
	}

	public function nutricionistum()
	{
		return $this->belongsTo(Nutricionistum::class, 'nutricionista_idNutricionista');
	}

	public function resultados()
	{
		return $this->hasMany(Resultado::class, 'dieta_iddieta');
	}
}
