<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FormasPagamento
 * 
 * @property int $idformas_pagamento
 * 
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class FormasPagamento extends Model
{
	protected $table = 'formas_pagamento';
	protected $primaryKey = 'idformas_pagamento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idformas_pagamento' => 'int'
	];

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'formas_pagamento_idformas_pagamento1');
	}
}
