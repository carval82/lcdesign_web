<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'ANAVALIA POS',
                'slug' => 'anavalia-pos',
                'acronym' => 'Aplicación Nacional de Ventas Ágiles, Ligera e Inteligente para Android',
                'description' => 'Sistema de punto de venta completo con facturación electrónica integrada. Diseñado para negocios que necesitan agilidad y control total de sus ventas.',
                'short_description' => 'POS con facturación electrónica para Android y Escritorio',
                'type' => 'app',
                'platform' => 'android,desktop',
                'technology' => 'React + SQLite',
                'status' => 'active',
                'features' => [
                    'Facturación electrónica DIAN',
                    'Gestión de inventario',
                    'Reportes de ventas',
                    'Múltiples métodos de pago',
                    'Sincronización offline',
                    'Impresión de tickets',
                ],
                'order' => 1,
                'featured' => true,
            ],
            [
                'name' => 'Psicologic',
                'slug' => 'psicologic',
                'acronym' => null,
                'description' => 'Aplicación móvil diseñada para profesionales de la salud mental. Permite gestionar pacientes, citas y seguimiento de tratamientos de manera eficiente.',
                'short_description' => 'App para profesionales de salud mental',
                'type' => 'app',
                'platform' => 'android',
                'technology' => 'Kotlin + SQLite',
                'status' => 'active',
                'features' => [
                    'Gestión de pacientes',
                    'Agenda de citas',
                    'Historial clínico',
                    'Notas de sesión',
                    'Recordatorios automáticos',
                ],
                'order' => 2,
                'featured' => true,
            ],
            [
                'name' => 'Granjas Orgánicas Villamaria',
                'slug' => 'granjas-villamaria',
                'acronym' => 'Pig Farm Management',
                'description' => 'Software especializado para la gestión integral de granjas porcinas sostenibles. Control de producción, alimentación, salud animal y trazabilidad.',
                'short_description' => 'Sistema de gestión para granjas sostenibles',
                'type' => 'software',
                'platform' => 'web',
                'technology' => 'Laravel + MySQL',
                'status' => 'active',
                'features' => [
                    'Control de producción',
                    'Gestión de alimentación',
                    'Registro sanitario',
                    'Trazabilidad completa',
                    'Reportes y estadísticas',
                    'Alertas automáticas',
                ],
                'order' => 3,
                'featured' => true,
            ],
            [
                'name' => 'QR Fotos',
                'slug' => 'qr-fotos',
                'acronym' => null,
                'description' => 'Plataforma para eventos donde tomarse una selfie es un placer. Los invitados escanean un QR y suben sus fotos al evento en tiempo real. Incluye transmisiones en vivo.',
                'short_description' => 'Galería de fotos para eventos con QR y streaming',
                'type' => 'software',
                'platform' => 'web',
                'technology' => 'Laravel + WebSockets',
                'status' => 'active',
                'features' => [
                    'Subida de fotos por QR',
                    'Transmisiones en vivo',
                    'Moderación de contenido',
                    'Pantalla en vivo para eventos',
                    'Mensajes de invitados',
                    'Galería personalizable',
                ],
                'order' => 4,
                'featured' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
