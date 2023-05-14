<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';
    protected $primaryKey = 'expense_id';
    protected $fillable = ['expense_category', 'amount', 'entry_date', 'created_at', 'user_id'];
    public $timestamps = false;
}
