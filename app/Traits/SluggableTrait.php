<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Sluggable Trait
 */
trait SluggableTrait
{

  protected static function bootSluggableTrait()
  {
    static::creating(function ($model) {

      $model->{self::getSlugColumn()} = $model->generateSlug($model->{self::getSlugTitle()});
    });
  }

  private function generateSlug($name)
  {
    return Str::slug($name);
  }

  public static function getSlugColumn()
  {
    return 'slug';
  }

  public static function getSlugTitle()
  {
    return 'title';
  }
}
