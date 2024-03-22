<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_id' => 1,
                'name' => 'Plan Básico',
                'description' => 'Este plan es ideal para aquellos que están comenzando con su presencia en línea. Obtendrás un espacio de almacenamiento generoso, ancho de banda suficiente y soporte técnico básico. Perfecto para blogs personales y sitios web pequeños.',
                'price' => 500,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 2,
                'name' => 'Plan Emprendedor',
                'description' => 'Si tienes un negocio en crecimiento y necesitas un servicio de hosting más robusto, el Plan Emprendedor es para ti. Obtendrás un mayor espacio de almacenamiento, ancho de banda amplio y soporte técnico especializado. Perfecto para sitios web empresariales y tiendas en línea.',
                'price' => 900,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 3,
                'name' => 'Plan Premium',
                'description' => 'Este plan está diseñado para sitios web de alto tráfico y aplicaciones web complejas. Obtendrás un espacio de almacenamiento considerable, ancho de banda ilimitado, soporte técnico prioritario y características avanzadas como bases de datos y SSL. Perfecto para sitios web populares, comunidades en línea y aplicaciones web exigentes.',
                'price' => 1500,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
