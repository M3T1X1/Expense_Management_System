{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wydatki - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            color: #333;
        }
        .navbar {
            background-color: #FFD700; /* żółty */
        }
        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: bold;
        }
        .expense-card {
            border: 1px solid #FFD700;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #fffbea;
        }
        .search-box {
            border: 2px solid #FFD700;
        }
        .btn-search {
            background-color: #FFD700;
            color: white;
            font-weight: bold;
        }
        .btn-search:hover {
            background-color: #e6c200;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Wydatki</a>
        </div>
    </nav>

    <div class="container mt-4">
        {{-- Pole wyszukiwania --}}
        <form method="GET" action="{{ route('home') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="form-control search-box" placeholder="Szukaj wydatku...">
                <button type="submit" class="btn btn-search">Szukaj</button>
            </div>
        </form>

        {{-- Lista wydatków --}}
        <h3 class="mb-3">Lista wydatków</h3>

        @forelse($expenses as $expense)
            <div class="expense-card">
                <strong>{{ $expense->title }}</strong>  
                <span class="float-end">{{ number_format($expense->cost, 2) }} zł</span><br>
                <small class="text-muted">Data: {{ $expense->created_at->format('d.m.Y') }}</small>
            </div>
        @empty
            <p>Brak wydatków do wyświetlenia.</p>
        @endforelse

        {{-- Paginacja --}}
        <div class="mt-3">
            {{ $expenses->links() }}
        </div>
    </div>
</body>
</html>
