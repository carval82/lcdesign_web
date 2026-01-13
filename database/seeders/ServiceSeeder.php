<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Desarrollo de Software a Medida',
                'slug' => 'software-a-medida',
                'description' => 'Creamos soluciones personalizadas que se adaptan perfectamente a las necesidades de tu negocio.',
                'icon' => 'fas fa-code',
                'features' => ['Análisis de requerimientos', 'Desarrollo ágil', 'Soporte continuo'],
                'order' => 1,
                'active' => true,
            ],
            [
                'name' => 'Aplicaciones Móviles',
                'slug' => 'apps-moviles',
                'description' => 'Desarrollamos aplicaciones nativas y multiplataforma para Android e iOS.',
                'icon' => 'fas fa-mobile-alt',
                'features' => ['Android nativo', 'React Native', 'Kotlin'],
                'order' => 2,
                'active' => true,
            ],
            [
                'name' => 'Desarrollo Web',
                'slug' => 'desarrollo-web',
                'description' => 'Sitios web modernos, responsivos y optimizados para tu negocio.',
                'icon' => 'fas fa-globe',
                'features' => ['Laravel', 'React', 'TailwindCSS'],
                'order' => 3,
                'active' => true,
            ],
            [
                'name' => 'Facturación Electrónica',
                'slug' => 'facturacion-electronica',
                'description' => 'Integración con la DIAN para facturación electrónica en Colombia.',
                'icon' => 'fas fa-file-invoice',
                'features' => ['Cumplimiento DIAN', 'Automatización', 'Reportes'],
                'order' => 4,
                'active' => true,
            ],
            [
                'name' => 'Sistemas de Gestión',
                'slug' => 'sistemas-gestion',
                'description' => 'ERP, CRM y sistemas administrativos para optimizar tu operación.',
                'icon' => 'fas fa-tasks',
                'features' => ['Inventarios', 'Ventas', 'Reportes'],
                'order' => 5,
                'active' => true,
            ],
            [
                'name' => 'Agro Tech',
                'slug' => 'agro-tech',
                'description' => 'Soluciones tecnológicas para el sector agropecuario y granjas sostenibles.',
                'icon' => 'fas fa-seedling',
                'features' => ['Trazabilidad', 'Control de producción', 'IoT'],
                'order' => 6,
                'active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}
