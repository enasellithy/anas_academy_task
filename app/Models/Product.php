<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $guarded = [];

    public function ScopeGetGreateThan($query){
        //Implement a query to fetch all products with a price greater
        //than a specified amount
        // Scope Concept
        return $query->where('price','>=',177);
    }
}
