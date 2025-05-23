<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Factura - Petunia Store</title>

    <!-- Font Awesome CDN (opcional si usas íconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Estilos y scripts de Vite -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-background text-cl4 font-cur">

    <div class="container mx-auto px-6 py-10 min-h-screen">
        <div class="flex items-start mb-10 gap-x-4">
            <img src="{{ asset('img/petunia.png') }}" alt="Petunia" class="w-16 h-16">
            <div>
                <h1 class="text-4xl text-title">Petunia Store</h1>
                <p class="text-cl2 text-xl">Factura de Compra</p>
            </div>
        </div>

        <div class="bg-cl3 rounded-2xl shadow-xl p-8 max-w-3xl mx-auto">
            <p class="text-cl2 mb-4">Fecha: {{ $fecha }}</p>

            <h2 class="text-xl font-semibold mb-2">Datos del Comprador</h2>
            <div class="mb-6 text-sm">
                <p><strong>Nombre:</strong> {{ $nombre }}</p>
                <p><strong>DUI:</strong> {{ $dui }}</p>
                <p><strong>Correo:</strong> {{ $correo }}</p>
            </div>

            <h2 class="text-xl font-semibold mb-2">Resumen del Pedido</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse rounded shadow bg-white text-cl4">
                    <thead>
                        <tr class="bg-cl2 text-white">
                            <th class="p-2 text-left">Producto</th>
                            <th class="p-2 text-left">Cantidad</th>
                            <th class="p-2 text-left">Precio</th>
                            <th class="p-2 text-left">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrito as $item)
                        <tr class="border-t">
                            <td class="p-2">{{ $item['nombre'] }}</td>
                            <td class="p-2">{{ $item['cantidad'] ?? 1 }}</td>
                            <td class="p-2">${{ number_format($item['precio'], 2) }}</td>
                            <td class="p-2">${{ number_format($item['subtotal'], 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-right mt-6">
                <p class="text-lg font-semibold">Total: ${{ number_format($total, 2) }}</p>
            </div>

            <div class="text-center mt-4">
    <button onclick="window.print()" class="bg-btn2 text-white px-6 py-2 rounded hover:bg-cl2 transition inline-block">
        🖨 Imprimir Factura
    </button>
</div>

            <div class="text-center mt-6">
                <a href="{{ route('carrito.reiniciar') }}" class="bg-btn1 text-white px-6 py-2 rounded hover:bg-cl2 transition inline-block">
                    🛍 Volver a la tienda
                </a>
            </div>
        </div>
    </div>

</body>
</html>
