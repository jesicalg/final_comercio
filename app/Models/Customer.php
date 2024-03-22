<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @property int $relation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereRelationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @property int $user_id
 * @property int $product_id
 * @property string|null $contracted_end_date
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereContractedEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUserId($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'user_id'];

    public static function validationRules(): array
    {
        return [
            'product_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'product_id.required' => 'Ocurrio un error intenta recargar la pagina',
            'product_id.numeric' => 'Ocurrio un error intenta recargar la pagina',
            'user_id.numeric' => 'Ocurrio un error intenta recargar la pagina',
            'user_id.required' => 'Ocurrio un error intenta recargar la pagina'
        ];
    }
}
