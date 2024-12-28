<?php

namespace App\Http\Controllers\API;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Lấy số lượng item mỗi trang từ query parameter, mặc định là 10
        $perPage = $request->query('per_page', 10);

        // Tìm kiếm và phân trang dữ liệu
        $query = Category::query()
            ->when($request->query('search'), function (Builder $query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            });

        // Phân trang
        $categories = $query->paginate($perPage);

        return response()->json($categories);
    }
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required|max:255',
        ]);
    

        return Category::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'nullable|unique:categories|max:255',
            'description' => 'nullable|max:255',
        ]);

        $category->update($validated);

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return $category;
    }
}

