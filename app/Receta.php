<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable =[
        'titulo','ingredientes','preparacion','imagen',
        'categoria_id'
    ];
    //
    public function categoria(){
        return $this->belongsTo(CategoriasRecetas::class);
    }
    /**
     * En ocaciones es necesario especificar el nombre de la columna
     * de tal manera que se puede encontrar en la tabla la 
     * relación 
     */
    public function userName(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
