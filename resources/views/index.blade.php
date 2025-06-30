<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donut Heaven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    backgroundImage: {
                        'donut-pattern': "linear-gradient(to right, #ffe4e6, #fff0f5)"
                    }
                }
            }
        }
    </script>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-donut-pattern min-h-screen font-sans text-gray-800">
    <!-- Navbar -->
    <header class="sticky top-0 bg-white/60 backdrop-blur-md border-b border-pink-200 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex justify-between items-center">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-pink-600">🍩 Donut Heaven</h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 lg:max-w-5xl mx-auto">
            @foreach ($products as $product)
                <div class="bg-white/70 backdrop-blur-md rounded-3xl p-4 sm:p-5 shadow-xl border border-pink-200 transition transform hover:scale-105 hover:shadow-pink-300 hover:-rotate-1 duration-300">
                    <img 
                        src="{{ asset('images/' . $product->name . '.jpg') }}" 
                        alt="{{ $product->name }}" 
                        class="rounded-xl w-full h-40 sm:h-48 md:h-52 lg:h-56 object-cover mb-4 shadow-inner"
                    />

                    <h2 class="text-lg sm:text-xl font-extrabold text-pink-700">{{ $product->name }}</h2>
                    <p class="text-sm sm:text-base font-medium text-yellow-800 mb-4">
                        Price: ${{ number_format($product->ppu, 2) }}
                    </p>

                    <div>
                        <h3 class="font-semibold text-pink-600">🥣 Batters</h3>
                        <div class="flex flex-wrap gap-2 mt-1 mb-3">
                            @foreach ($product->batters as $batter)
                                <span class="px-3 py-1 rounded-full bg-pink-100 text-sm text-pink-800 font-medium shadow-inner">
                                    {{ $batter->type }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="font-semibold text-pink-600">🍬 Toppings</h3>
                        <div class="flex flex-wrap gap-2 mt-1">
                            @foreach ($product->toppings as $topping)
                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-sm text-yellow-800 font-medium shadow-inner">
                                    {{ $topping->type }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
