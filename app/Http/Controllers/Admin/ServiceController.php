<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $serviceData = [
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'],
            'icon' => $validated['icon'] ?? 'fas fa-cog',
            'features' => $request->features ? array_filter(explode("\n", $request->features)) : null,
            'order' => Service::max('order') + 1,
            'active' => $request->has('active'),
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($validated['name']) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('images/services');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $image->move($uploadPath, $imageName);
            $serviceData['image'] = 'services/' . $imageName;
        }

        Service::create($serviceData);

        return redirect()->route('admin.services.index')->with('success', 'Servicio creado exitosamente');
    }

    public function show(Service $service)
    {
        return redirect()->route('admin.services.edit', $service);
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $updateData = [
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'],
            'icon' => $validated['icon'] ?? $service->icon,
            'features' => $request->features ? array_filter(explode("\n", $request->features)) : null,
            'order' => $request->order ?? $service->order,
            'active' => $request->has('active'),
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($validated['name']) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('images/services');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $image->move($uploadPath, $imageName);
            $updateData['image'] = 'services/' . $imageName;
        }

        $service->update($updateData);

        return redirect()->route('admin.services.index')->with('success', 'Servicio actualizado exitosamente');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Servicio eliminado exitosamente');
    }
}
