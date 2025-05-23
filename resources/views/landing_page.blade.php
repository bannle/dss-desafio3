<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <div class="flex items-start mb-10 gap-x-4">
            <a href="#" class="bg-btn1 text-white px-4 py-2 rounded mb-4 inline-block">
                🛒 Ver Carrito
            </a>
        </div>

        @if (session('success'))
    <div
        id="alertaExito"
        class="fixed top-4 right-4 bg-exito text-cl5 p-3 rounded shadow-lg z-50 transition-opacity duration-500 opacity-100"
    >
        {{ session('success') }}
    </div>

    <script>
    setTimeout(() => {
        const alerta = document.getElementById('alertaExito');
        if (alerta) {
            alerta.style.transition = "opacity 0.5s";
            alerta.style.opacity = "0";
            setTimeout(() => alerta.remove(), 500);
        }
    }, 3000);
</script>

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
                    <button type="submit" class="bg-btn2 text-cl3 px-4 py-1.5 rounded mt-2">Agregar al
                        carrito</button>
                </form>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</body>

</html>

