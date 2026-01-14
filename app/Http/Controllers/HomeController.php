<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\PageVisit;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Registrar visita
        $this->trackVisit($request, 'home');

        $products = Product::active()->orderBy('order')->get();
        $services = Service::active()->orderBy('order')->get();
        $apps = Product::active()->apps()->get();

        return view('home', compact('products', 'services', 'apps'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $this->trackVisit(request(), 'product-' . $slug);
        
        return view('product', compact('product'));
    }

    protected function trackVisit(Request $request, $page)
    {
        PageVisit::create([
            'page' => $page,
            'url' => $request->fullUrl(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $request->header('referer'),
        ]);
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'mensaje' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->route('home')->with('success', '¡Mensaje enviado correctamente! Te contactaremos pronto.');
    }
}
