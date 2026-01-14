<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class FixProductImagesSeeder extends Seeder
{
    public function run(): void
    {
        // Mapeo de productos a imágenes existentes en el repositorio
        $productImages = [
            'anavalia-pos-pc' => [
                'image' => 'products/anavalia-pos-escritorio-1768157506.png',
                'screenshots' => [
                    'products/anavalia-pos-escritorio-screenshot-1-1768161318.png',
                    'products/anavalia-pos-escritorio-screenshot-2-1768161318.png',
                    'products/anavalia-pos-escritorio-screenshot-3-1768161318.png',
                    'products/anavalia-pos-escritorio-screenshot-4-1768161318.png',
                    'products/anavalia-pos-escritorio-screenshot-5-1768161318.png',
                    'products/anavalia-pos-escritorio-screenshot-6-1768161318.png',
                    'products/anavalia-pos-escritorio-screenshot-7-1768161318.png',
                ],
            ],
            'anavalia-pos-android' => [
                'image' => 'products/anavalia-pos-1768159790.jpeg',
                'screenshots' => [
                    'products/anavalia-pos-screenshot-1-1768159790.jpeg',
                    'products/anavalia-pos-screenshot-2-1768159790.jpeg',
                    'products/anavalia-pos-screenshot-3-1768159790.jpeg',
                    'products/anavalia-pos-screenshot-4-1768159790.jpeg',
                    'products/anavalia-pos-screenshot-5-1768159790.jpeg',
                    'products/anavalia-pos-screenshot-6-1768159790.jpeg',
                    'products/anavalia-pos-screenshot-7-1768159790.jpeg',
                    'products/anavalia-pos-screenshot-8-1768159790.jpeg',
                ],
            ],
            'granjas-organicas' => [
                'image' => 'products/menejo-de-granjas-1768160742.png',
                'screenshots' => [
                    'products/menejo-de-granjas-screenshot-1-1768160742.png',
                    'products/menejo-de-granjas-screenshot-2-1768160742.png',
                    'products/menejo-de-granjas-screenshot-3-1768160742.png',
                    'products/menejo-de-granjas-screenshot-4-1768160742.png',
                    'products/menejo-de-granjas-screenshot-5-1768160742.png',
                    'products/menejo-de-granjas-screenshot-6-1768160742.png',
                ],
            ],
            'psicologic' => [
                'image' => 'products/psicologic-1768160035.jpeg',
                'screenshots' => [
                    'products/psicologic-screenshot-1-1768160035.jpeg',
                    'products/psicologic-screenshot-2-1768160035.jpeg',
                    'products/psicologic-screenshot-3-1768160035.jpeg',
                    'products/psicologic-screenshot-4-1768160035.jpeg',
                    'products/psicologic-screenshot-5-1768160035.jpeg',
                    'products/psicologic-screenshot-6-1768160035.jpeg',
                    'products/psicologic-screenshot-7-1768160035.jpeg',
                ],
            ],
            'qr-fotos' => [
                'image' => 'products/qr-fotos-1768162336.png',
                'screenshots' => [
                    'products/qr-fotos-screenshot-1-1768162336.png',
                    'products/qr-fotos-screenshot-2-1768162336.png',
                    'products/qr-fotos-screenshot-3-1768162336.png',
                    'products/qr-fotos-screenshot-4-1768162336.png',
                    'products/qr-fotos-screenshot-5-1768162336.png',
                    'products/qr-fotos-screenshot-6-1768162336.png',
                    'products/qr-fotos-screenshot-7-1768162336.png',
                    'products/qr-fotos-screenshot-8-1768162336.png',
                ],
            ],
        ];

        foreach ($productImages as $slug => $images) {
            $product = Product::where('slug', $slug)->first();
            if ($product) {
                $product->update([
                    'image' => $images['image'],
                    'screenshots' => $images['screenshots'],
                ]);
                $this->command->info("Updated images for: {$product->name}");
            }
        }
    }
}
