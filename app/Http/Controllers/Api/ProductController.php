<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Product Controller
 *
 * @class App\Http\Controllers\Api\ProductController
 * @package App\Http\Controllers\Api
 */
class ProductController extends Controller
{
    /**
     * Return all products
     */
    public function index(): JsonResponse
    {
        $products = Product::get()->all();
        $result = array_map(function ($product) {
            /**
             * @var Product $product
             */
            return [
                'id'         => $product->id,
                'name'       => $product->name,
                'category'   => $product->category->name,
                'created_at' => $product->created_at,
            ];
        }, $products);

        return response()->json($result);
    }

    /**
     * Get product by ID
     *
     * @param int $id
     * @return JsonResponse
     */
    public function getById(int $id): JsonResponse
    {
        /**
         * @var Product $product
         */
        $product = Product::find($id);
        if ($product === null) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json([

            'id'          => $product->id,
            'name'        => $product->name,
            'description' => $product->description,
            'user'        => $product->user->name,
            'category'    => $product->category->name,
            'country'     => $product->country->name,
            'status'      => $product->status->name,
            'created_at'  => $product->created_at,
            'updated_at'  => $product->updated_at,
        ]);
    }

    /**
     * Get dropdown products
     *
     * @return JsonResponse
     */
    public function getDropdownProducts(): JsonResponse
    {
        $statusName = Status::APPROVED_STATUS;
        $products = Product::whereHas('status', function ($query) use ($statusName) {
            $query->where('name', $statusName);
        })
            ->get()
            ->all();

        $result = array_map(function ($product) {
            /**
             * @var Product $product
             */
            return [
                'id'   => $product->id,
                'name' => $product->name,
            ];
        }, $products);

        return response()->json($result);
    }

    /**
     * Store products
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'name'        => 'required|string|max:255',
                'description' => 'required|string',
                'user'        => 'required|string|max:255',
                'category'    => 'required|string|max:255',
                'country'     => 'required|string|max:255',
                'status'      => 'required|string|max:255',
            ]);

            $user = User::where('name', $validated['user'])->firstOrFail();
            $category = Category::where('name', $validated['category'])->firstOrFail();
            $country = Country::where('name', $validated['country'])->firstOrFail();
            $status = Status::where('name', $validated['status'])->firstOrFail();

            $product = Product::create([
                'name'        => $validated['name'],
                'description' => $validated['description'],
                'user_id'     => $user->id,
                'category_id' => $category->id,
                'country_id'  => $country->id,
                'status_id'   => $status->id,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 202);
        }

        return response()->json(['id' => $product->id], 201);
    }

    /**
     * Update product by ID
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $data = $request->validate([
                'name'        => 'sometimes|string|max:255',
                'description' => 'sometimes|string',
                'user'        => 'sometimes|string|max:255',
                'category'    => 'sometimes|string|max:255',
                'country'     => 'sometimes|string|max:255',
                'status'      => 'sometimes|string|max:255',
            ]);

            $user = User::where('name', $data['user'])->firstOrFail();
            unset($data['user']);

            $category = Category::where('name', $data['category'])->firstOrFail();
            unset($data['category']);

            $country = Country::where('name', $data['country'])->firstOrFail();
            unset($data['country']);

            $status = Status::where('name', $data['status'])->firstOrFail();
            unset($data['status']);

            $data['user_id'] = $user->id;
            $data['category_id'] = $category->id;
            $data['country_id'] = $country->id;
            $data['status_id'] = $status->id;

            $product = Product::find($id);
            $product->fill($data);
            $product->save();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 202);
        }

        return response()->json(['id' => $product->id], 201);
    }
}
