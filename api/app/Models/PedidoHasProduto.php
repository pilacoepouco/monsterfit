<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidoHasProduto
 * 
 * @property int $pedido_idPedido
 * @property int $produto_idproduto
 * @property int|null $quantidade
 * 
 * @property Pedido $pedido
 * @property Produto $produto
 *
 * @package App\Models
 */
class PedidoHasProduto extends Model
{
	protected $table = 'pedido_has_produto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'pedido_idPedido' => 'int',
		'produto_idproduto' => 'int',
		'quantidade' => 'int'
	];

	protected $fillable = [
		'quantidade'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'pedido_idPedido');
	}

	public function produto()
	{
		return $this->belongsTo(Produto::class, 'produto_idproduto');
	}
}
