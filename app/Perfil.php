<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perfil extends Model
{
    //
    public function usuario(){
        return $this.BelongsTo(User::class);
    }
}
