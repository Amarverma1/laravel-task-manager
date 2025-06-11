<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager') }}</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Header -->
    <div class="bg-white shadow-sm mb-4">
        <div class="container py-4">
            <h2 class="fw-semibold fs-2 text-dark mb-0">
                {{ __('Welcome back 👋') }}
            </h2>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                    <div>
                        <h3 class="fw-semibold text-dark">{{ __("You're successfully logged in!") }}</h3>
                        <p class="text-secondary mt-2">
                            Manage your tasks and stay productive.
                        </p>
                    </div>

                    <div>
                        <a href="{{ route('tasks.index') }}" class="btn btn-dark btn-lg">
                            <i class="bi bi-list-task me-2"></i> Go to Tasks
                        </a>
                    </div>
                </div>

                <hr>

                <p class="text-secondary">
                    Quick links, recent activity, or any dashboard content can go here.
                </p>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-sm py-3 mt-5">
        <div class="container text-center text-muted small">
            &copy; {{ date('Y') }} Task Manager. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
