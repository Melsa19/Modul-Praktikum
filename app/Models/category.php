<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model // Disarankan diawali huruf kapital
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $timestamps = false; 
    protected $fillable = ['category_id', 'category_name'];
    
    public function products()
    {
        // Pastikan model Product juga diawali huruf kapital (Product::class)
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}