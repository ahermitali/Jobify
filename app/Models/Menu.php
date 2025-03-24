<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    /**
     * Get all menu items associated with this menu.
     */
    public function items()
    {
        return $this->hasMany(MenuItem::class)->orderBy('position');
    }
}