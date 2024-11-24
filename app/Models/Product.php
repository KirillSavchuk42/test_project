<?php declare(strict_types=1);

namespace App\Models;

use App\Models\Product\Traits\BaseRelationshipTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Product Model
 *
 * @class App\Models\Product
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $user_id
 * @property int $category_id
 * @property int $country_id
 * @property int $status_id
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends Model
{
    use BaseRelationshipTrait;

    const string TABLE_NAME = 'products';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'category_id',
        'country_id',
        'status_id',
    ];

    /**
     * @var bool
     */
    public $timestamps = true;
}
