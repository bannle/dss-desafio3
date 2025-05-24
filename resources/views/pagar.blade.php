<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petunia Store - Pago</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pagar.js'])
    @endif
</head>
<body class="bg-background text-cl4 font-cur">

    <div class="container mx-auto px-6 py-10 min-h-screen">
        <div class="flex items-start mb-10 gap-x-4">
            <img src="{{ asset('img/petunia.png') }}" alt="Petunia" class="w-16 h-16">
            <div>
                <h1 class="text-4xl text-title">Petunia Store</h1>
                <p class="text-cl2 text-xl">Formulario de Pago</p>
            </div>
        </div>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div id="alertaExito" class="fixed top-4 right-4 bg-exito text-cl5 p-3 rounded shadow-lg z-50 transition-opacity duration-500 opacity-100">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errores de validación --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-cl3 rounded-2xl shadow-xl p-8 max-w-2xl mx-auto">
            <form method="POST" action="{{ route('pago.procesar') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm mb-1">Nombre del comprador:</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}"
                        class="w-full border border-subtitle rounded px-4 py-2 focus:ring-cl2 focus:border-cl2 bg-white text-cl4">
                </div>

                <div>
                    <label class="block text-sm mb-1">DUI:</label>
                    <input type="text" name="dui" placeholder="12345678-9" value="{{ old('dui') }}"
                        class="w-full border border-subtitle rounded px-4 py-2 focus:ring-cl2 focus:border-cl2 bg-white text-cl4">
                </div>

                <div>
                    <label class="block text-sm mb-1">Número de Tarjeta:</label>
                    <input type="text" name="tarjeta" placeholder="1234 5678 9012 3456" value="{{ old('tarjeta') }}"
                        class="w-full border border-subtitle rounded px-4 py-2 focus:ring-cl2 focus:border-cl2 bg-white text-cl4">
                </div>

                <div>
                    <label class="block text-sm mb-1">Fecha de Vencimiento (MM/YY):</label>
                    <input type="text" name="fecha_vencimiento" placeholder="MM/YY" value="{{ old('fecha_vencimiento') }}"
                        class="w-full border border-subtitle rounded px-4 py-2 focus:ring-cl2 focus:border-cl2 bg-white text-cl4">
                </div>

                <div>
                    <label class="block text-sm mb-1">Correo del comprador:</label>
                    <input type="text" name="correo" value="{{ old('correo') }}"
                        class="w-full border border-subtitle rounded px-4 py-2 focus:ring-cl2 focus:border-cl2 bg-white text-cl4">
                </div>

                <div class="text-center pt-4">
                    <button type="submit" class="bg-btn1 text-white px-6 py-2 rounded hover:bg-cl2 transition">
                        💳 Confirmar Pago
                    </button>
                </div>
                <div class="text-center mt-6">
                <a href="{{ route('tienda.inicio') }}" class="bg-btn1 text-white px-6 py-2 rounded hover:bg-cl2 transition inline-block">
                    🛍 Volver a la tienda
                </a>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
