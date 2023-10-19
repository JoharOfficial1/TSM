<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'priority', 'project_id'
    ];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
