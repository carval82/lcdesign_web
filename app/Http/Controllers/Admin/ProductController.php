<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('order')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        \Log::info('Store product request', $request->all());
        
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'type' => 'required|in:app,software,web',
                'platform' => 'nullable|string',
                'technology' => 'nullable|string',
                'status' => 'required|in:active,development,coming_soon',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
                'apk_file' => 'nullable|file|max:102400',
            ]);
        } catch (\Exception $e) {
            \Log::error('Validation error', ['error' => $e->getMessage()]);
            throw $e;
        }

        $productData = [
            'name' => $validated['name'],
            'slug' => $this->generateUniqueSlug($validated['name']),
            'description' => $validated['description'],
            'type' => $validated['type'],
            'platform' => $validated['platform'],
            'technology' => $validated['technology'],
            'status' => $validated['status'],
            'acronym' => $request->acronym,
            'short_description' => $request->short_description,
            'features' => $request->features ? array_filter(explode("\n", $request->features)) : null,
            'order' => Product::max('order') + 1,
            'featured' => $request->has('featured'),
            'playstore_url' => $request->playstore_url,
            'demo_url' => $request->demo_url,
        ];

        // Subir imagen principal
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($validated['name']) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('images/products');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $image->move($uploadPath, $imageName);
            $productData['image'] = 'products/' . $imageName;
        }

        // Subir screenshots (hasta 10)
        if ($request->hasFile('screenshots')) {
            $screenshots = [];
            $files = array_slice($request->file('screenshots'), 0, 10);
            $uploadPath = public_path('images/products');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            foreach ($files as $index => $screenshot) {
                $screenshotName = Str::slug($validated['name']) . '-screenshot-' . ($index + 1) . '-' . time() . '.' . $screenshot->getClientOriginalExtension();
                $screenshot->move($uploadPath, $screenshotName);
                $screenshots[] = 'products/' . $screenshotName;
            }
            $productData['screenshots'] = $screenshots;
        }

        // Subir APK
        if ($request->hasFile('apk_file')) {
            $apk = $request->file('apk_file');
            $apkName = Str::slug($validated['name']) . '-v' . date('Ymd') . '.apk';
            $downloadPath = public_path('downloads');
            if (!file_exists($downloadPath)) {
                mkdir($downloadPath, 0755, true);
            }
            $apk->move($downloadPath, $apkName);
            $productData['download_url'] = asset('downloads/' . $apkName);
        }

        $product = Product::create($productData);
        \Log::info('Product created', ['id' => $product->id]);

        return redirect()->route('admin.products.index')->with('success', 'Producto creado exitosamente');
    }

    public function show(Product $product)
    {
        return redirect()->route('admin.products.edit', $product);
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        \Log::info('Update product request', ['id' => $product->id, 'data' => $request->all()]);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:app,software,web',
            'platform' => 'nullable|string',
            'technology' => 'nullable|string',
            'status' => 'required|in:active,development,coming_soon',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'apk_file' => 'nullable|file|mimes:apk|max:102400',
        ]);

        $validated['slug'] = $this->generateUniqueSlug($validated['name'], $product->id);
        $validated['acronym'] = $request->acronym;
        $validated['short_description'] = $request->short_description;
        $validated['features'] = $request->features ? array_filter(explode("\n", $request->features)) : null;
        $validated['featured'] = $request->has('featured');
        $validated['playstore_url'] = $request->playstore_url;
        $validated['demo_url'] = $request->demo_url;

        // Preparar datos para actualizar
        $updateData = [
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'platform' => $validated['platform'],
            'technology' => $validated['technology'],
            'status' => $validated['status'],
            'acronym' => $validated['acronym'],
            'short_description' => $validated['short_description'],
            'features' => $validated['features'],
            'featured' => $validated['featured'],
            'playstore_url' => $validated['playstore_url'],
            'demo_url' => $validated['demo_url'],
            'order' => $request->order ?? $product->order,
        ];

        // Subir imagen principal
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($validated['name']) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('images/products');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $image->move($uploadPath, $imageName);
            $updateData['image'] = 'products/' . $imageName;
        }

        // Subir screenshots (hasta 10)
        if ($request->hasFile('screenshots')) {
            $screenshots = [];
            $files = array_slice($request->file('screenshots'), 0, 10);
            $uploadPath = public_path('images/products');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            foreach ($files as $index => $screenshot) {
                $screenshotName = Str::slug($validated['name']) . '-screenshot-' . ($index + 1) . '-' . time() . '.' . $screenshot->getClientOriginalExtension();
                $screenshot->move($uploadPath, $screenshotName);
                $screenshots[] = 'products/' . $screenshotName;
            }
            $updateData['screenshots'] = $screenshots;
        }

        // Subir APK
        if ($request->hasFile('apk_file')) {
            $apk = $request->file('apk_file');
            $apkName = Str::slug($validated['name']) . '-v' . date('Ymd') . '.apk';
            $downloadPath = public_path('downloads');
            if (!file_exists($downloadPath)) {
                mkdir($downloadPath, 0755, true);
            }
            $apk->move($downloadPath, $apkName);
            $updateData['download_url'] = asset('downloads/' . $apkName);
        }
        
        $product->update($updateData);
        \Log::info('Product updated', ['id' => $product->id]);

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado exitosamente');
    }

    private function generateUniqueSlug($name, $excludeId = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        $query = Product::where('slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        while ($query->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
            $query = Product::where('slug', $slug);
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }
        }

        return $slug;
    }
}
