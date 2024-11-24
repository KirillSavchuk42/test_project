<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Status Model
 *
 * @class App\Models\Status
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 */
class Status extends Model
{
    const string TABLE_NAME = 'statuses';

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
