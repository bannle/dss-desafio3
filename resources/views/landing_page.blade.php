<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-...tu-hash..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/landing_page.js'])
    @endif
</head>

<body class="bg-background">
    <div class="container mx-auto px-6 py-10 min-h-screen">
        <div class="flex items-start mb-10 gap-x-4">
            <img src="{{ asset('img/petunia.png') }}" alt="Petunia" class="w-16 h-16">
            <div>
                <h1 class="font-cur text-4xl text-title gap-4">Petunia Store</h1>
                <p class="text-cl2 font-cur text-1xl">Productos al mejor precio</p>
            </div>
        </div>
        <div class="flex items-start mb-10 gap-x-4 justify-between">
            <button data-open-modal="carritoModal" class="bg-btn1 text-white px-4 py-2 rounded hover:bg-cl2 transition">
                🛒 Ver Carrito ({{ count(session('carrito', [])) }})
                <!-- llevar la cuenta de productos en carrito -->
            </button>
        </div>

        @if (session('success'))
        <div id="alertaExito" class="fixed top-4 right-4 bg-green-100 text-green-800 p-3 rounded shadow-lg z-50 transition-opacity duration-500 opacity-100">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div id="alertaError" class="fixed top-4 right-4 bg-red-100 text-red-800 p-3 rounded shadow-lg z-50 transition-opacity duration-500 opacity-100 mt-16">
            {{ session('error') }}
        </div>
        @endif


        <div class="text-2xl font-cur font-semibold mt-7">

        </div>
        @foreach ($agrupar as $categoria => $productos)
        <h2 class="text-2xl font-cur font-semibold mt-7 text-title">{{ $categoria }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($productos as $producto)
            <div class="bg-cl3 rounded-2xl shadow p-4">
                <img src="{{ asset($producto->imagen_url) }}" alt="{{ $producto->nombre }}">
                <h3 class="font-cur text-cl4 mt-2">{{ $producto->nombre }}</h3>
                <p class="text-cl4 font-cur">Precio: ${{ $producto->precio }}</p>
                <p class="text-cl4 font-cur">Stock: {{ $producto->stock }}</p>
                <form action="{{ route('carrito.agregar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $producto->id }}">
                    <input type="number" name="stock" min="1" max="{{ $producto->stock }}" value="1" class="border rounded border-subtitle text-cl4 px-2 py-1.5 w-16">
                    <button type="submit" class="bg-btn2 text-cl3 px-4 py-1.5 rounded mt-2">Agregar al carrito</button>
                </form>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>

    <!-- modal de carrito -->
    <div data-modal-id="carritoModal" class="transit fixed inset-0 bg-black/60 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
        <div class="bg-cl6 w-full max-w-4xl p-6 rounded-2xl relative shadow-xl border border-subtitle text-btn1 font-cur">
            <!-- Botón cerrar -->
            <button data-close-modal class="absolute top-4 right-5 text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold mb-4">🛒 Tu Carrito</h2>

            @php
            $carrito = session('carrito', []);
            $total = 0;
            @endphp

            @if(count($carrito) > 0)
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-cl3 text-sm">
                        <th class="p-2">Producto</th>
                        <th class="p-2">Imagen</th>
                        <th class="p-2">Precio</th>
                        <th class="p-2">Cantidad</th>
                        <th class="p-2">Subtotal</th>
                        <th class="p-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrito as $item)
                    @php $total += $item['subtotal']; @endphp
                    <tr class="border-t text-sm">
                        <td class="p-2">{{ $item['nombre'] }}</td>
                        <td class="p-2">
                            <img src="{{ $item['imagen_url'] ?? '#' }}" class="w-12 h-12 object-cover rounded">
                        </td>
                        <td class="p-2">${{ number_format($item['precio'], 2) }}</td>
                        <td class="p-2">{{ $item['cantidad'] ?? $item['stock'] }}</td>
                        <td class="p-2">${{ number_format($item['subtotal'], 2) }}</td>
                        <td class="p-2">
                            <a href="{{ route('carrito.eliminar', $item['id']) }}" class="hover:underline"><i class="fa-solid fa-trash text-title hover:text-cl5"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 text-right">
                <p class="text-lg font-semibold">Total: ${{ number_format($total, 2) }}</p>
                <div class="mt-2 flex gap-2 justify-end">
                    <a href="{{ route('carrito.vaciar') }}" class="bg-cl2 text-white px-4 py-2 rounded hover:bg-btn2 transition">Vaciar</a>
                    <a href="{{ route('pago') }}" class="bg-btn1 text-white px-4 py-2 rounded hover:bg-cl2 transition">
                💳 Pagar
            </a>
                </div>
            </div>
            @else
            <p class="text-btn1">Tu carrito está vacío 🥺</p>
            @endif
        </div>
    </div>
</body>

</html>

