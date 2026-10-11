<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'user_id', 'name', 'slug',
        'description', 'price', 'stock', 'published',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'published' => 'boolean',
    ];

    // Relations
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)
                    ->withPivot('created_by')
                    ->withTimestamps();
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    // Local Scope
    public function scopePublished(Builder $query) {
        return $query->where('published', true);
    }

    public function scopeExpensive(Builder $query, $min = 1000000) {
        return $query->where('price', '>=', $min);
    }
}