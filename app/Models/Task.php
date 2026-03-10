<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Permite atribuição em massa (mass assignment) para esses campos
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'status',
        'category_id',
    ];

    // Casts para tipos nativos
    protected $casts = [
        'due_date' => 'datetime',
    ];

    // Relacionamento: O pertence a um User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Scopes úteis (opcionais)
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
