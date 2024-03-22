<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $post_id
 * @property string $post_date
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @property string $author
 * @property string $title
 * @property string|null $picture
 * @property int $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'author', 'category_id', 'picture'];

    public static function validationRules(): array
    {
        return [
            'title' => 'required|max:200|min:4',
            'content' => 'required|max:1000|min:5',
            'author' => 'required|max:100|min:3',
            'category_id' => 'required',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'title.required' => 'Titulo no puede estar vacio',
            'content.required' => 'Contenido no puede estar vacio',
            'author.required' => 'Autor no puede estar vacio',
            'category_id.required' => 'Seleccone una categoria'
        ];
    }
}
