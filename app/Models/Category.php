<?php

namespace App\Models;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use SluggableTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'description', 'slug'
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
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
