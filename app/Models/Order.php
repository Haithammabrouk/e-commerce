<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded =[];
    
    public function user(){
        return $this->belongsTo(related:User::class);
    }

    public function OrderItems(){
        return $this->hasMany(related:OrderItems::class);
    }
    
    public function products(){
        return $this->belongsToMany(related:Product::class, table:'order_items');
    }
    use HasFactory;
}
