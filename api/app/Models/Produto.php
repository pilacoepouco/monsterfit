<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Produto
 * 
 * @property int $idproduto
 * @property string|null $nome
 * @property string|null $preco
 * @property string|null $descricao
 * 
 * @property Collection|Pedido[] $pedidos
 * @property Collection|Alimento[] $alimentos
 *
 * @package App\Models
 */
class Produto extends Model
{
	protected $table = 'produto';
	protected $primaryKey = 'idproduto';
	public $timestamps = false;

	protected $fillable = [
		'nome',
		'preco',
		'descricao'
	];

	public function pedidos()
	{
		return $this->belongsToMany(Pedido::class, 'pedido_has_produto', 'produto_idproduto', 'pedido_idPedido')
					->withPivot('quantidade');
	}

	public function alimentos()
	{
		return $this->belongsToMany(Alimento::class, 'produto_has_alimento', 'produto_idproduto', 'alimento_idalimento')
					->withPivot('quantidade', 'produto_has_alimentocol');
	}
}
