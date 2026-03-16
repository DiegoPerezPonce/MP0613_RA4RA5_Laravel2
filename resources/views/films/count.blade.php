@extends('layouts.master')

@section('title', $title)

@section('content')

    <style>
        .stats-container {
            max-width: 800px;
            margin: 3rem auto;
        }

        .page-title {
            font-family: 'Bebas Neue', cursive;
            font-size: 3rem;
            color: var(--netflix-white);
            margin-bottom: 3rem;
            letter-spacing: 2px;
            text-align: center;
            text-transform: uppercase;
            background: linear-gradient(90deg, var(--netflix-red) 0%, var(--netflix-white) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stats-card {
            background: linear-gradient(135deg, var(--netflix-dark-gray) 0%, var(--netflix-gray) 100%);
            border-radius: 20px;
            padding: 4rem 3rem;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(229, 9, 20, 0.2);
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(229, 9, 20, 0.1) 0%, transparent 70%);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        .stats-icon {
            font-size: 5rem;
            color: var(--netflix-red);
            margin-bottom: 2rem;
            filter: drop-shadow(0 0 20px rgba(229, 9, 20, 0.5));
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .stats-label {
            font-size: 1.2rem;
            color: var(--netflix-light-gray);
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 1rem;
            font-weight: 300;
        }

        .stats-number {
            font-family: 'Bebas Neue', cursive;
            font-size: 7rem;
            color: var(--netflix-white);
            font-weight: 700;
            line-height: 1;
            margin: 1rem 0;
            text-shadow: 0 0 30px rgba(229, 9, 20, 0.5);
            position: relative;
            z-index: 1;
            animation: countUp 1s ease-out;
        }

        @keyframes countUp {
            from {
                opacity: 0;
                transform: scale(0.5);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .stats-description {
            font-size: 1.1rem;
            color: var(--netflix-light-gray);
            margin-top: 1.5rem;
            line-height: 1.6;
        }

        .stats-footer {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .mini-stat {
            text-align: center;
        }

        .mini-stat-icon {
            font-size: 2rem;
            color: var(--netflix-red);
            margin-bottom: 0.5rem;
        }

        .mini-stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--netflix-white);
        }

        .mini-stat-label {
            font-size: 0.9rem;
            color: var(--netflix-light-gray);
            text-transform: uppercase;
            letter-spacing: 1px;
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

    <div class="stats-container">
        <h1 class="page-title">{{ $title }}</h1>

        <div class="stats-card">




            <div class="stats-number">{{ $count }}</div>



            <div class="stats-footer">
                <div class="mini-stat">
                    <div class="mini-stat-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="mini-stat-value">{{ $count }}</div>
                    <div class="mini-stat-label">Títulos</div>
                </div>


            </div>
        </div>

        <div class="text-center">
            <a href="/" class="back-button">
                <i class="fas fa-arrow-left"></i>
                Volver al inicio
            </a>
        </div>
    </div>

@endsection
