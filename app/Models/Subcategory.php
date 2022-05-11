<?php

namespace App\Models;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    use SluggableTrait;

    protected $table = 'subcategories';

    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'status',
        'image',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
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
