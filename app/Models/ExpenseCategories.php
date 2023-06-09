<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategories extends Model
{
    use HasFactory;

    protected $table = 'expensecategory';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name', 'description', 'created_at'];
    public $timestamps = false;
}
