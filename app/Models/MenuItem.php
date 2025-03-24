<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'parent_id',
        'title',
        'type',
        'item_id',
        'url',
        'order',
    ];

    /**
     * Get the menu this item belongs to.
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * Get the parent menu item (for submenus).
     */
    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    /**
     * Get the child menu items (submenus).
     */
    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('order');
    }

    /**
     * Get the related item (page, category, or service).
     */
    public function relatedItem()
    {
        return match ($this->type) {
            'page' => $this->belongsTo(Page::class, 'item_id'),
            
            default => null,
        };
    }
}
