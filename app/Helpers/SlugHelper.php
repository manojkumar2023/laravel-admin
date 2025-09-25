<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class SlugHelper
{
    /**
     * Generate a unique slug for a model and field
     * @param string $modelClass Eloquent model class (e.g. PropertyType::class)
     * @param string $title The string to slugify
     * @param string $field The field name to check uniqueness (default 'slug')
     * @param int|null $ignoreId Optional: id to ignore (for update)
     * @return string Unique slug
     */
    public static function uniqueSlug($modelClass, $title, $field = 'slug', $ignoreId = null)
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $i = 2;
        $query = $modelClass::where($field, $slug);
        if ($ignoreId) $query->where('id', '!=', $ignoreId);
        while ($query->exists()) {
            $slug = $baseSlug . '-' . $i;
            $i++;
            $query = $modelClass::where($field, $slug);
            if ($ignoreId) $query->where('id', '!=', $ignoreId);
        }
        return $slug;
    }
}
