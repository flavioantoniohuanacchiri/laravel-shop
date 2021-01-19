<?php namespace App\Master\Models;

class Producto extends \App\BaseModel
{
	protected $table = "producto";

	public function categoria()
	{
		return $this->hasOne("App\Master\Models\Categoria", "id", "tipo_producto_id");
	}

	public function itemSede()
	{
		return $this->hasMany("App\Master\Models\ItemSede", "producto_id", "id");
	}
}