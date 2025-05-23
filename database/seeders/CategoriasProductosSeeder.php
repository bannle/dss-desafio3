<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Jardinería'],
            ['nombre' => 'Mascotas'],
            ['nombre' => 'Arte'],
        ]);

        $categorias = DB::table('categorias')->pluck('id', 'nombre');

        DB::table('productos')->insert([
            [
                'nombre' => 'Machete de acero pulido',
                'precio' => 4.95,
                'stock' => 2,
                'imagen_url' => 'https://www.freundferreteria.com/Productos/GetMultimedia?idProducto=016e5fb6-48d5-43d0-b9a1-201457ecb882&idMultimediaProducto=e7ad2147-9c36-4cb7-ba5a-fb5e8715782a&width=500&height=500&qa=90&esImagen=True&ext=.jpg',
                'categoria_id' => $categorias['Jardinería'],
            ],
            [
                'nombre' => 'Juego de 3 macetas para interiores',
                'precio' => 20.00,
                'stock' => 2,
                'imagen_url' => 'https://m.media-amazon.com/images/I/81RVjsOwq-L._AC_SX679_.jpg',
                'categoria_id' => $categorias['Jardinería'],
            ],
            [
                'nombre' => 'Pistola plástica 5 funciones.',
                'precio' => 3.50,
                'stock' => 2,
                'imagen_url' => 'https://sv.epaenlinea.com/media/catalog/product/cache/e28d833c75ef32af78ed2f15967ef6e0/0/c/0c43eddf-e89b-4319-9ce2-bdab57119411.jpg',
                'categoria_id' => $categorias['Jardinería'],
            ],
            [
                'nombre' => 'Cama para mascota pequeña',
                'precio' => 20.00,
                'stock' => 1,
                'imagen_url' => 'https://chilax.es/wp-content/uploads/2022/08/CAMA-PARA-PERRO-CAMUFLAJE-PEQUENA-Y-MEDIANA.jpg',
                'categoria_id' => $categorias['Mascotas'],
            ],
            [
                'nombre' => 'Peine para mascotas quita pelos',
                'precio' => 4.00,
                'stock' => 3,
                'imagen_url' => 'https://chilax.es/wp-content/uploads/2025/01/PEINE-PARA-MASCOTA-QUITA-PELOS.webp',
                'categoria_id' => $categorias['Mascotas'],
            ],
            [
                'nombre' => 'Alfombra para mascotas',
                'precio' => 25.00,
                'stock' => 2,
                'imagen_url' => 'https://chilax.es/wp-content/uploads/2021/07/MANTA-PARA-REFRESCAR-PERROS-50-X-65CM-161276.jpg',
                'categoria_id' => $categorias['Mascotas'],
            ],
            [
                'nombre' => 'Estuche Óleos 24X12Ml',
                'precio' => 19.95,
                'stock' => 2,
                'imagen_url' => 'https://libreriamoderna.com.sv/wp-content/uploads/2021/01/8712079312855.jpg',
                'categoria_id' => $categorias['Arte'],
            ],
            [
                'nombre' => 'Libreta para boceto Strathmore papel reciclado 89G',
                'precio' => 19.50,
                'stock' => 1,
                'imagen_url' => 'https://libreriamoderna.com.sv/wp-content/uploads/2024/06/12017457098.png',
                'categoria_id' => $categorias['Arte'],
            ],
            [
                'nombre' => 'Libreta de dibujo papel negro',
                'precio' => 4.99,
                'stock' => 1,
                'imagen_url' => 'https://libreriamoderna.com.sv/wp-content/uploads/2023/12/042229350429.png',
                'categoria_id' => $categorias['Arte'],
            ],
        ]);
    }
}
