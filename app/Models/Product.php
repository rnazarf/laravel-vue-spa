<?php

namespace App\Models;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SluggableTrait;

    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'slug', 'subcategory_id', 'status'
    ];

    public function subcategories()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public static function getSlugColumn()
    {
        return 'slug';
    }

    public static function getSlugTitle()
    {
        return 'name';
    }
}
