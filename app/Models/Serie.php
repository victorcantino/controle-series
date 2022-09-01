<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    /**
     * Capos que podem ser preenchidos em massa 'mass assign'
     */
    protected $fillable = ['nome'];

    public function seasons() 
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    /**
     * Executado no carregamento da classe
     * Tem escopo global
     */
    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $query){
            $query->orderBy('nome');
        });
    }
}
