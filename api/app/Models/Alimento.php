<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Alimento
 * 
 * @property int $idalimento
 * @property string|null $nome
 * @property float|null $proteinas
 * @property float|null $carboidrato
 * @property float|null $gordura
 * @property float|null $calorias_totais
 * @property float|null $gramas
 * 
 * @property Collection|Produto[] $produtos
 *
 * @package App\Models
 */
class Alimento extends Model
{
	protected $table = 'alimento';
	protected $primaryKey = 'idalimento';
	public $timestamps = false;

	protected $casts = [
		'proteinas' => 'float',
		'carboidrato' => 'float',
		'gordura' => 'float',
		'calorias_totais' => 'float',
		'gramas' => 'float'
	];

	protected $fillable = [
		'nome',
		'proteinas',
		'carboidrato',
		'gordura',
		'calorias_totais',
		'gramas'
	];

	public function produtos()
	{
		return $this->belongsToMany(Produto::class, 'produto_has_alimento', 'alimento_idalimento', 'produto_idproduto')
					->withPivot('quantidade', 'produto_has_alimentocol');
	}
}
