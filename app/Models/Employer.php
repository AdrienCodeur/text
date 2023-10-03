<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin IdeHelperEmployer
 */
class Employer extends Model
{
    use HasFactory;

    protected $fillable = ['nom' ,'email' ,'departement_id' ,'salaire','sexe','photos'] ;

    public function departement(){

        return $this->belongsTo(Departement::class) ;
    }

    public function imgUrl():string{

            return Storage::disk('public')->url($this->photos) ;
    }
}
