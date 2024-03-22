<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'post_id' => 1,
                'author' => 'Juan',
                'content' => 'Hemos realizado mejoras significativas en nuestra infraestructura de servidores, lo que significa que ahora puedes disfrutar de una experiencia de hosting aún más rápida y eficiente para tu sitio web.',
                'title' => '¡Mejora en la velocidad y rendimiento!',
                'picture' => '20230705215252_titulo-prueba.jpg',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'post_id' => 2,
                'author' => 'Sofía',
                'content' => 'Para celebrar el lanzamiento de nuestro servicio de hosting, estamos ofreciendo un descuento del 20% en todos nuestros planes durante el primer mes. Aprovecha esta oportunidad para obtener un hosting de calidad a un precio aún más atractivo.',
                'title' => '¡Descuento especial de lanzamiento!',
                'picture' => '20230705215325_25-mejora-en-la-velocidad-y-rendimiento.jpg',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'post_id' => 3,
                'author' => 'Mateo',
                'content' => 'Hemos agregado nuevas funcionalidades a nuestros planes de hosting, como la opción de instalar fácilmente aplicaciones populares con un solo clic, mayor capacidad de almacenamiento y herramientas de seguridad avanzadas para proteger tu sitio web.',
                'title' => '¡Nuevas características avanzadas disponibles!',
                'picture' => null,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'post_id' => 4,
                'author' => 'Valentina',
                'content' => 'Soporte técnico mejorado las 24 horas. Sabemos lo importante que es contar con un equipo de soporte técnico confiable. Por eso, hemos fortalecido nuestro equipo y ahora estamos disponibles las 24 horas del día para resolver cualquier consulta o problema que puedas tener con tu hosting.',
                'title' => 'Novedades',
                'picture' => null,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'post_id' => 5,
                'author' => 'Facundo',
                'content' => 'Nos enorgullece ofrecer una sólida garantía de tiempo de actividad para asegurarte que tu sitio web esté disponible para tus visitantes en todo momento. Si experimentas algún problema de tiempo de inactividad, te compensaremos de acuerdo con nuestros términos y condiciones.',
                'title' => '¡Garantía de tiempo de actividad del 99.9%!',
                'picture' => null,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
