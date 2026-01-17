@extends('layouts.master')

@section('title', 'Inicio')

@section('content')

<style>
    /* HERO BANNER */
    .hero-banner {
        position: relative;
        height: 500px;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 4rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7);
    }

    .hero-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.5);
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, rgba(0,0,0,0.9) 0%, transparent 100%);
        display: flex;
        align-items: center;
        padding: 0 4rem;
    }

    .hero-content h1 {
        font-family: 'Bebas Neue', cursive;
        font-size: 4rem;
        color: var(--netflix-white);
        margin-bottom: 1rem;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.8);
        letter-spacing: 3px;
    }

    .hero-content p {
        font-size: 1.3rem;
        color: var(--netflix-light-gray);
        max-width: 600px;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-hero {
        padding: 0.8rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1.1rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-hero-primary {
        background: var(--netflix-red);
        color: white;
    }

    .btn-hero-primary:hover {
        background: #f40612;
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(229, 9, 20, 0.4);
    }

    .btn-hero-secondary {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .btn-hero-secondary:hover {
        background: rgba(255, 255, 255, 0.3);
        border-color: white;
    }

    /* SECTION TITLES */
    .section-title {
        font-family: 'Bebas Neue', cursive;
        font-size: 2.5rem;
        color: var(--netflix-white);
        margin-bottom: 2rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        position: relative;
        padding-left: 1rem;
    }

    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 5px;
        height: 80%;
        background: var(--netflix-red);
        border-radius: 3px;
    }

    /* CATEGORY CARDS */
    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 4rem;
    }

    .category-card {
        background: linear-gradient(135deg, var(--netflix-dark-gray) 0%, var(--netflix-gray) 100%);
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 1px solid transparent;
        text-decoration: none;
        display: block;
    }

    .category-card:hover {
        transform: translateY(-10px);
        border-color: var(--netflix-red);
        box-shadow: 0 15px 40px rgba(229, 9, 20, 0.3);
    }

    .category-icon {
        font-size: 3rem;
        color: var(--netflix-red);
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .category-card:hover .category-icon {
        transform: scale(1.2) rotate(5deg);
    }

    .category-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--netflix-white);
        margin-bottom: 0.5rem;
    }

    .category-description {
        font-size: 0.9rem;
        color: var(--netflix-light-gray);
    }

    /* FORM SECTION */
    .form-section {
        background: linear-gradient(135deg, var(--netflix-dark-gray) 0%, #1a1a1a 100%);
        border-radius: 15px;
        padding: 3rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
        border: 1px solid rgba(229, 9, 20, 0.2);
        margin-top: 4rem;
    }

    .form-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-header h2 {
        font-family: 'Bebas Neue', cursive;
        font-size: 2.5rem;
        color: var(--netflix-white);
        letter-spacing: 2px;
        margin-bottom: 0.5rem;
    }

    .form-header p {
        color: var(--netflix-light-gray);
        font-size: 1.1rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 0;
    }

    .form-group label {
        display: block;
        color: var(--netflix-white);
        font-weight: 500;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: var(--netflix-white);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--netflix-red);
        background: rgba(255, 255, 255, 0.08);
        box-shadow: 0 0 0 3px rgba(229, 9, 20, 0.1);
    }

    .form-control::placeholder {
        color: var(--netflix-light-gray);
    }

    .btn-submit {
        width: 100%;
        padding: 1rem;
        background: var(--netflix-red);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-top: 1rem;
    }

    .btn-submit:hover {
        background: #f40612;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(229, 9, 20, 0.4);
    }

    .alert-custom {
        background: rgba(229, 9, 20, 0.1);
        border: 1px solid var(--netflix-red);
        border-radius: 8px;
        padding: 1rem 1.5rem;
        color: var(--netflix-white);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .alert-custom i {
        font-size: 1.5rem;
        color: var(--netflix-red);
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2.5rem;
        }
        
        .hero-overlay {
            padding: 0 2rem;
        }
        
        .form-section {
            padding: 2rem 1.5rem;
        }
    }
</style>

<!-- HERO BANNER -->
<div class="hero-banner">
    <img src="{{ asset('img/bannerprueba.jpg') }}" class="hero-image" alt="Banner">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>Bienvenido a Movies App</h1>
            <p>Descubre miles de películas, series y documentales. Tu entretenimiento favorito en un solo lugar.</p>
            <div class="hero-buttons">
                <a href="/filmout/newFilms" class="btn-hero btn-hero-primary">
                    <i class="fas fa-play"></i> Ver Películas
                </a>
                <a href="#crear-pelicula" class="btn-hero btn-hero-secondary">
                    <i class="fas fa-plus"></i> Agregar Película
                </a>
            </div>
        </div>
    </div>
</div>

<!-- CATEGORIES SECTION -->
<h2 class="section-title">Explorar Categorías</h2>

<div class="category-grid">
    <a href="/filmout/oldFilms" class="category-card">
        <div class="category-icon">
            <i class="fas fa-history"></i>
        </div>
        <div class="category-title">Películas Antiguas</div>
        <div class="category-description">Clásicos del cine</div>
    </a>

    <a href="/filmout/newFilms" class="category-card">
        <div class="category-icon">
            <i class="fas fa-fire"></i>
        </div>
        <div class="category-title">Películas Nuevas</div>
        <div class="category-description">Últimos estrenos</div>
    </a>

    <a href="/filmout/filmsByYear/1994" class="category-card">
        <div class="category-icon">
            <i class="fas fa-calendar"></i>
        </div>
        <div class="category-title">Por Año</div>
        <div class="category-description">Buscar por fecha</div>
    </a>

    <a href="/filmout/filmsByGenre/Drama" class="category-card">
        <div class="category-icon">
            <i class="fas fa-masks-theater"></i>
        </div>
        <div class="category-title">Por Género</div>
        <div class="category-description">Drama, acción y más</div>
    </a>

    <a href="/filmout/sortFilms" class="category-card">
        <div class="category-icon">
            <i class="fas fa-sort-amount-down"></i>
        </div>
        <div class="category-title">Ordenadas</div>
        <div class="category-description">Lista organizada</div>
    </a>

    <a href="/filmout/countFilms" class="category-card">
        <div class="category-icon">
            <i class="fas fa-chart-bar"></i>
        </div>
        <div class="category-title">Estadísticas</div>
        <div class="category-description">Total de películas</div>
    </a>
</div>

<!-- FORM SECTION -->
<div class="form-section" id="crear-pelicula">
    <div class="form-header">
        <h2>Agregar Nueva Película</h2>
        <p>Completa el formulario para añadir una película a la colección</p>
    </div>

    @if (session('error'))
        <div class="alert-custom">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <form action="{{ route('film') }}" method="POST">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Ej: El Padrino" required>
            </div>

            <div class="form-group">
                <label>Año</label>
                <input type="number" name="year" class="form-control" placeholder="Ej: 1972" required>
            </div>

            <div class="form-group">
                <label>Género</label>
                <input type="text" name="genre" class="form-control" placeholder="Ej: Drama" required>
            </div>

            <div class="form-group">
                <label>País</label>
                <input type="text" name="country" class="form-control" placeholder="Ej: Estados Unidos" required>
            </div>

            <div class="form-group">
                <label>Duración (min)</label>
                <input type="number" name="duration" class="form-control" placeholder="Ej: 175" required>
            </div>

            <div class="form-group">
                <label>URL de Imagen</label>
                <input type="text" name="img_url" class="form-control" placeholder="https://..." required>
            </div>
        </div>

        <button type="submit" class="btn-submit">
            <i class="fas fa-plus-circle"></i> Crear Película
        </button>
    </form>
</div>

@endsection
