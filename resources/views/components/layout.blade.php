<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style type="text/css">

        .table-condensed {
            font-size: 12px;
        }

        .tr {
            line-height: 10px;
            min-height: 10px;
            height: 10px;
        }

        tr {
            line-height: 30px;
            min-height: 30px;
            height: 30px;
        }

        .pagination {
            border: none;
            border-radius: 14px;
            box-shadow: none;
        }

        .pagination .page-item .page-link {
            border: none;
            box-shadow: none;
            border-radius: 14px;
            color: #222024;
            background-color: transparent;
        }

        .pagination .page-item.active .page-link {
            background-color: #6234b9;
            border-radius: 14px;
            color: #dedede;
            box-shadow: none;
        }

        .pagination .page-item.disabled .page-link {
            background-color: transparent;
            color: #222024;
            border-radius: 14px;
            border: none;
            box-shadow: none;
        }

        .pagination .page-item:hover .page-link {
            background-color: #e9ecef;
            border-radius: 14px;
            color: #222024;
            border: none;
            box-shadow: none
        }

        .border-rounded {
            border-radius: 14px;
            border-color: #222024;
        }
    </style>

</head>

<body>

    <main>
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand fs-2" href="#">ai kk</a>
                    @guest
                    <div class="d-flex align-items-center justify-content-center">
                        <x-nav-link href="/login" :active="request()->is('login')" class="p-2">Логин</x-nav-link>
                        <x-nav-link href="/register" :active="request()->is('register')" class="p-2">Регистрация</x-nav-link>
                    </div>

                    @endguest
                    @auth

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav gap-2">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">
                                    <i class="bi bi-house" style="font-size: 17px;"></i>
                                    Главная
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="bi bi-graph-up" style="font-size: 17px;"></i>
                                    Аналитика
                                    <i class="bi bi-arrow-down-short" style="font-size: 17px;"></i>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link active1" href="#">
                                    <i class="bi bi-arrow-counterclockwise" style="font-size: 17px;"></i>
                                    История
                                    <i class="bi bi-arrow-down-short" style="font-size: 17px;"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-wallet2" style="font-size: 17px;"></i>Финансы
                                    <i class="bi bi-arrow-down-short" style="font-size: 17px;"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-gear" style="font-size: 17px;"></i> Настройки
                                    <i class="bi bi-arrow-down-short" style="font-size: 17px;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <button class="btn btn-light me-3 bg-secondary p-0 rounded-pill d-flex justify-content-center align-items-center gap-3">
                            <div style="height:25px; width:25px" class="rounded-circle  bg-primary">
                                <i class="bi bi-brightness-high" style="font-size: 17px;color:white"></i>
                            </div>

                            <i class="bi bi-moon" style="font-size: 17px;"></i>


                        </button>
                        <button class="btn btn-light me-3">
                            <i class="bi bi-bell" style="font-size: 17px;"></i>
                        </button>
                        <button class="btn btn-light me-3">
                            <i class="bi bi-question-circle" style="font-size: 17px;"></i>
                        </button>
                        <button class="btn btn-light rounded-pill bg-secondary">
                            <i class="bi bi-currency-dollar" style="font-size: 17px;"></i> 1,000,000 ₸
                        </button>
                        <form method="POST" action="/logout">
                            @csrf

                            <x-form-button>Выход</x-form-button>
                        </form>
                    </div>
                    @endauth
                </div>
            </nav>
            <div class="mx-auto py-6 sm:px-6 container-fluid lg:px-8">
                {{ $slot }}
            </div>

        </div>
    </main>
    <script>
        document.getElementById('resetButton').addEventListener('click', function() {
            // Reset the form fields
            document.getElementById('filterForm').reset();

            // Optionally reset dropdowns (if you want to handle dropdown button text reset)
            // Example: Change dropdown button text back to default
            document.querySelectorAll('.dropdown-toggle').forEach(button => {
                button.textContent = 'Выберите';
            });
        });
        document.querySelectorAll('input[name="period"]').forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'За период') {
                    document.getElementById('customPeriodFields').style.display = 'block';
                } else {
                    document.getElementById('customPeriodFields').style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>