<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * 
 * @property int $idPedido
 * @property string|null $endereço
 * @property int $cliente_idcliente
 * @property int $restaurante_idrestaurante
 * @property int $formas_pagamento_idformas_pagamento1
 * 
 * @property Cliente $cliente
 * @property FormasPagamento $formas_pagamento
 * @property Restaurante $restaurante
 * @property Collection|Produto[] $produtos
 *
 * @package App\Models
 */
class Pedido extends Model
{
	protected $table = 'pedido';
	protected $primaryKey = 'idPedido';
	public $timestamps = false;

	protected $casts = [
		'cliente_idcliente' => 'int',
		'restaurante_idrestaurante' => 'int',
		'formas_pagamento_idformas_pagamento1' => 'int'
	];

	protected $fillable = [
		'endereço',
		'cliente_idcliente',
		'restaurante_idrestaurante',
		'formas_pagamento_idformas_pagamento1'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'cliente_idcliente');
	}

	public function formas_pagamento()
	{
		return $this->belongsTo(FormasPagamento::class, 'formas_pagamento_idformas_pagamento1');
	}

	public function restaurante()
	{
		return $this->belongsTo(Restaurante::class, 'restaurante_idrestaurante');
	}

	public function produtos()
	{
		return $this->belongsToMany(Produto::class, 'pedido_has_produto', 'pedido_idPedido', 'produto_idproduto')
					->withPivot('quantidade');
	}
}
