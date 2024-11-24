<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Controller
 *
 * @class App\Http\Controllers\Api\Controller
 * @package App\Http\Controllers\Api
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
