<x-layout>
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="font-weight-bold">История</h1>
        <ul class="d-flex justify-content-center align-items-center gap-4 bg-secondary p-2 px-4 rounded text-plain">
            <li class="list-group-item">
                <x-nav-link href="#" :active="request()->is('access')">Переоценки</x-nav-link>
            </li>
            <li class="list-group-item">
                <x-nav-link href="#" :active="request()->is('history')">Действия</x-nav-link>
            </li>
            <li class="list-group-item">
                <x-nav-link href="#" :active="request()->is('warning')">Уведомления</x-nav-link>
            </li>
            <li class="list-group-item">
                <x-nav-link href="#" :active="request()->is('download')">Скачивания</x-nav-link>
            </li>
        </ul>
    </div>
    <section class="border border-light rounded px-2 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">Важные действия</h2>
            <button class="btn btn-outline-dark btn-sm" data-bs-toggle='modal' data-bs-target='#filterModal'><i class="bi bi-funnel" style="font-size:15px"></i><span class="{{ isset($quantity) ? 'bg-primary text-white rounded-circle p-1 text-align mx-1' : '' }}">
                    {{ $quantity ?? '' }}
                </span></button>
        </div>
        <table class="table my-3">
            <thead>
                <tr class="table-condensed tr">
                    <th scope="col" class="bg-shadow text-muted">Дата <i class="bi bi-arrow-down-up" style="font-size: 10px;"></i></th>
                    <th scope="col" class="bg-shadow text-muted">Тип <i class="bi bi-arrow-down-up" style="font-size: 10px;"></i></th>
                    <th scope="col" class="bg-shadow text-muted">Устройство <i class="bi bi-arrow-down-up" style="font-size: 10px;"></i></th>
                    <th scope="col" class="bg-shadow text-muted">Локация <i class="bi bi-arrow-down-up" style="font-size: 10px;"></i></th>
                    <th scope="col" class="bg-shadow text-muted">Дополнительно <i class="bi bi-arrow-down-up" style="font-size: 10px;"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                <tr>

                    <td>{{ $history['created_at'] }}</td>
                    <td>{{ $history['type'] }}</td>
                    <td><i class="bi bi-pc-display-horizontal" style="font-size: 13px;"></i>{{" "}}{{ $history['device'] }}</td>
                    <td><i class="bi bi-geo-alt" style="font-size: 13px;"></i>{{" "}}{{ $history['location'] }}</td>
                    <td>{{ $history['addition'] }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="d-flex justify-content-center">
            @if ($paginate === 'true' && $histories instanceof Illuminate\Pagination\LengthAwarePaginator)
            <!-- Only render pagination links if we are paginating -->
            {{ $histories->links('pagination::bootstrap-5') }}
            @endif
        </div>

    </section>
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Фильтр</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your filter options here -->
                    <form method="POST" action="/history" id="filterForm">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center gap-2">
                            <div class="dropdown w-100">
                                <button class="btn btn-outline-dark  w-100 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Период
                                </button>
                                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="period" id="gridRadios1" value="Вчера">
                                        <label class="form-check-label" for="gridRadios1">
                                            Вчера
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="period" id="gridRadios2" value="Сегодня">
                                        <label class="form-check-label" for="gridRadios2">
                                            Сегодня
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="period" id="gridRadios3" value="За неделю">
                                        <label class="form-check-label" for="gridRadios3">
                                            За неделю
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="period" id="gridRadios4" value="За месяц">
                                        <label class="form-check-label" for="gridRadios4">
                                            За месяц
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="period" id="gridRadios5" value="За год">
                                        <label class="form-check-label" for="gridRadios5">
                                            За год
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="period" id="gridRadios6" value="За период">
                                        <label class="form-check-label" for="gridRadios6">
                                            За период
                                        </label>
                                    </div>
                                    <div id="customPeriodFields" style="display:none;">
                                        <label for="start_date" class="d-block">От</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date">
                                        <label for="end_date" class="d-block">До</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date">
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown w-100">
                                <button class="btn btn-outline-dark  dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Тип
                                </button>
                                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="gridRadios7" value="Вход в аккаунт">
                                        <label class="form-check-label" for="gridRadios7">
                                            Вход в аккаунт
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="gridRadios8" value="Смена пароля">
                                        <label class="form-check-label" for="gridRadios8">
                                            Смена пароля
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="gridRadios9" value="Очистка настроек">
                                        <label class="form-check-label" for="gridRadios9">
                                            Очистка настроек
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="gridRadios10" value="Разрыв связи">
                                        <label class="form-check-label" for="gridRadios10">
                                            Разрыв связи
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown w-100">
                                <button class="btn btn-outline-dark dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Устройство
                                </button>
                                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="device" id="gridRadios11" value="Windows">
                                        <label class="form-check-label" for="gridRadios11">
                                            Windows
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="device" id="gridRadios12" value="macOS">
                                        <label class="form-check-label" for="gridRadios12">
                                            macOS
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="device" id="gridRadios13" value="Linux">
                                        <label class="form-check-label" for="gridRadios13">
                                            Linux
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" id="resetButton" data-bs-dismiss="modal">Очистить фильтр</button>
                            <button type="submit" class="btn btn-secondary text-white">Применить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>