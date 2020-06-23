<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProdutoHasAlimento
 * 
 * @property int $produto_idproduto
 * @property int $alimento_idalimento
 * @property int|null $quantidade
 * @property string|null $produto_has_alimentocol
 * 
 * @property Alimento $alimento
 * @property Produto $produto
 *
 * @package App\Models
 */
class ProdutoHasAlimento extends Model
{
	protected $table = 'produto_has_alimento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'produto_idproduto' => 'int',
		'alimento_idalimento' => 'int',
		'quantidade' => 'int'
	];

	protected $fillable = [
		'quantidade',
		'produto_has_alimentocol'
	];

	public function alimento()
	{
		return $this->belongsTo(Alimento::class, 'alimento_idalimento');
	}

	public function produto()
	{
		return $this->belongsTo(Produto::class, 'produto_idproduto');
	}
}
