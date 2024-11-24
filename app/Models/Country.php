<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Country Model
 *
 * @class App\Models\Country
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 */
class Country extends Model
{
    const string TABLE_NAME = 'countries';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
