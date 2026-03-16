@extends('layouts.master')

@section('title', $title)

@section('content')

    <style>
        .page-title {
            font-family: 'Bebas Neue', cursive;
            font-size: 3rem;
            color: var(--netflix-white);
            margin-bottom: 2rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            background: linear-gradient(90deg, var(--netflix-red) 0%, var(--netflix-white) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .movie-card {
            background: var(--netflix-dark-gray);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        .movie-card:hover {
            transform: scale(1.08) translateY(-10px);
            box-shadow: 0 15px 40px rgba(229, 9, 20, 0.4);
            z-index: 10;
        }

        .movie-poster {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: all 0.4s ease;
        }

        .movie-card:hover .movie-poster {
            filter: brightness(0.4);
        }

        .movie-info {
            padding: 1.5rem;
            background: linear-gradient(180deg, transparent 0%, var(--netflix-dark-gray) 30%);
        }

        .movie-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--netflix-white);
            margin-bottom: 0.5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .movie-meta {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 0.8rem;
        }

        .badge-custom {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .badge-year {
            background: rgba(229, 9, 20, 0.2);
            color: var(--netflix-red);
            border: 1px solid var(--netflix-red);
        }

        .badge-genre {
            background: rgba(255, 255, 255, 0.1);
            color: var(--netflix-white);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .movie-details {
            font-size: 0.9rem;
            color: var(--netflix-light-gray);
            line-height: 1.6;
        }

        .movie-details i {
            color: var(--netflix-red);
            margin-right: 0.3rem;
        }

        .movie-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.4s ease;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2rem;
        }

        .movie-card:hover .movie-overlay {
            opacity: 1;
        }

        .overlay-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--netflix-white);
            margin-bottom: 0.5rem;
        }

        .overlay-info {
            color: var(--netflix-light-gray);
            font-size: 0.9rem;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--netflix-dark-gray);
            border-radius: 12px;
            border: 2px dashed var(--netflix-gray);
        }

        .empty-state i {
            font-size: 5rem;
            color: var(--netflix-red);
            margin-bottom: 1.5rem;
            opacity: 0.5;
        }

        .empty-state h3 {
            color: var(--netflix-white);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: var(--netflix-light-gray);
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            color: var(--netflix-white);
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 2rem;
        }

        .back-button:hover {
            background: var(--netflix-red);
            color: white;
            transform: translateX(-5px);
            border-color: var(--netflix-red);
        }
    </style>

    <h1 class="page-title">{{ $title }}</h1>

    @if (empty($films))
        <div class="empty-state">
            <i class="fas fa-film"></i>
            <h3>No hay películas disponibles</h3>
            <p>No se ha encontrado ninguna película en esta categoría</p>
        </div>
    @else
        <div class="movie-grid">
            @foreach ($films as $film)
                <div class="movie-card">
                    <img src="{{ $film['img_url'] }}" class="movie-poster" alt="{{ $film['name'] }}"
                        onerror="this.src='{{ asset('img/banner.jpg') }}'">

                    <div class="movie-info">
                        <h3 class="movie-title">{{ $film['name'] }}</h3>

                        <div class="movie-meta">
                            <span class="badge-custom badge-year">
                                <i class="fas fa-calendar-alt"></i> {{ $film['year'] }}
                            </span>
                            <span class="badge-custom badge-genre">
                                <i class="fas fa-tag"></i> {{ $film['genre'] }}
                            </span>
                        </div>

                        <div class="movie-details">
                            <div><i class="fas fa-globe"></i> {{ $film['country'] }}</div>
                            <div><i class="fas fa-clock"></i> {{ $film['duration'] }} min</div>
                        </div>
                    </div>

                    <div class="movie-overlay">
                        <h4 class="overlay-title">{{ $film['name'] }}</h4>
                        <div class="overlay-info">
                            {{ $film['genre'] }} • {{ $film['year'] }} • {{ $film['duration'] }} min
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="text-center">
        <a href="/" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Volver al inicio
        </a>
    </div>

@endsection
