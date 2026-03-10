<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Task Manager') }} - Gerencie suas tarefas</title>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="bg-white font-sans antialiased">

    <!-- Header com glass effect -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-10 border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="font-bold text-xl tracking-tight">
                <span class="text-indigo-600">Task</span>Manager
            </div>

            <nav class="flex items-center gap-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-700 hover:text-indigo-600 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-indigo-600 transition">Login</a>
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:scale-105 transition-all active:scale-95 shadow-lg shadow-indigo-200">
                            Cadastrar
                        </a>
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main>
        <div class="max-w-6xl mx-auto px-6 py-20">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight mb-6">
                    Gerencie suas tarefas de forma 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">simples</span>
                </h1>
                <p class="text-xl text-gray-600 mb-10 leading-relaxed">
                    Organize seu dia, aumente sua produtividade e nunca mais perca um prazo importante com nossa plataforma intuitiva.
                </p>

                <div class="flex gap-4 justify-center">
                    @guest
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-xl hover:-translate-y-1 transition-all shadow-lg shadow-indigo-200">
                            Começar gratuitamente
                        </a>
                        <a href="#como-funciona" class="bg-white border border-gray-200 px-8 py-4 rounded-2xl font-bold text-lg text-gray-700 hover:bg-gray-50 hover:border-gray-300 transition-all">
                            Ver recursos
                        </a>
                    @else
                        <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-xl transition-all shadow-lg shadow-indigo-200">
                            Ir para Dashboard
                        </a>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Features Section com cards estilo dashboard -->
        <div id="como-funciona" class="border-t border-gray-200 bg-gray-50/50">
            <div class="max-w-6xl mx-auto px-6 py-20">
                <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-4">
                    Como <span class="text-indigo-600">funciona</span>
                </h2>
                <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">
                    Três passos simples para organizar sua rotina
                </p>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="glass-card p-8 rounded-3xl border-l-4 border-l-indigo-500 hover:shadow-lg transition-all">
                        <div class="bg-indigo-50 w-14 h-14 rounded-xl flex items-center justify-center mb-6">
                            <span class="text-2xl font-bold text-indigo-600">1</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Crie tarefas</h3>
                        <p class="text-gray-600 leading-relaxed">Adicione suas tarefas com título, descrição e prazo de forma rápida e intuitiva.</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="glass-card p-8 rounded-3xl border-l-4 border-l-amber-500 hover:shadow-lg transition-all">
                        <div class="bg-amber-50 w-14 h-14 rounded-xl flex items-center justify-center mb-6">
                            <span class="text-2xl font-bold text-amber-600">2</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Organize seu dia</h3>
                        <p class="text-gray-600 leading-relaxed">Visualize todas as tarefas em um dashboard clean e priorize o que é importante.</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="glass-card p-8 rounded-3xl border-l-4 border-l-emerald-500 hover:shadow-lg transition-all">
                        <div class="bg-emerald-50 w-14 h-14 rounded-xl flex items-center justify-center mb-6">
                            <span class="text-2xl font-bold text-emerald-600">3</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Acompanhe progresso</h3>
                        <p class="text-gray-600 leading-relaxed">Marque tarefas como concluídas e veja estatísticas do seu avanço diário.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        @guest
        <div class="max-w-4xl mx-auto px-6 py-20 text-center">
            <div class="glass-card p-12 rounded-[2.5rem]">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">
                    Pronto para <span class="text-indigo-600">começar?</span>
                </h2>
                <p class="text-gray-600 mb-8 max-w-lg mx-auto">
                    Crie sua conta gratuita e comece a organizar suas tarefas em menos de 2 minutos.
                </p>
                <a href="{{ route('register') }}" 
                    class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-xl hover:-translate-y-1 transition-all shadow-lg shadow-indigo-200">
                    Criar conta gratuita
                </a>
            </div>
        </div>
        @endguest
    </main>

    <!-- Footer simples -->
    <footer class="border-t border-gray-200">
        <div class="max-w-6xl mx-auto px-6 py-8 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} TaskManager. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>