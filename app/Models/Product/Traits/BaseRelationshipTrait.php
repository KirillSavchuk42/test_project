<?php declare(strict_types=1);

namespace App\Models\Product\Traits;

use App\Models\Category;
use App\Models\Country;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Trait BaseRelationships
 *
 * @trait App\Models\Product\BaseRelationships
 * @package App\Models\Product
 *
 * @property-read Category $category
 * @property-read Country $country
 * @property-read Status $status
 * @property-read User $user
 */
trait BaseRelationshipTrait
{
    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
