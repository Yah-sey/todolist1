<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // app/Models/Todo.php
protected $fillable = [
    'title',
    'status',
    'start_date',
    'end_date',
    'completed',
    'completed_at',
];


    protected $casts = [
        'completed' => 'boolean',
        'due_date' => 'date',
    ];

    public function getStatusAttribute()
    {
        return $this->completed ? 'Terminée' : 'En cours';
    }
}