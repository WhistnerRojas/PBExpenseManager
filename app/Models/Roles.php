<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'roles_id';
    protected $fillable = ['display_name', 'description', 'created_at'];
    public $timestamps = false;
}
