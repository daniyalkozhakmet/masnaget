<x-layout>

    <section class="container">
        <h1>Регистрация</h1>
        <form method="POST" action="/register">
            @csrf
            <x-form-field>
                <x-form-label for="first_name">Имя</x-form-label>
                <x-form-input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="first_name" placeholder="Имя" :value="old('first_name')" required />
                <x-form-error name="first_name" />
            </x-form-field>
            <x-form-field>
                <x-form-label for="last_name">Фамилия</x-form-label>
                <x-form-input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="last_name" placeholder="Фамилия" :value="old('last_name')" required />
                <x-form-error name="last_name" />
            </x-form-field>
            <x-form-field>
                <x-form-label for="email">Почта</x-form-label>
                <x-form-input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Почта" :value="old('email')" required />
                <x-form-error name="email" />
            </x-form-field>
            <x-form-field>
                <x-form-label for="password">Пароль</x-form-label>
                <x-form-input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="Пароль" :value="old('password')" required />
                <x-form-error name="password" />
            </x-form-field>
            <x-form-field>
                <x-form-label for="password_confirmation">Подверждение пароли</x-form-label>
                <x-form-input type="password" class="form-control" id="password_confirmation" name="password_confirmation" aria-describedby="password_confirmation" placeholder="Подверждение пароли" required />
            </x-form-field>
            <x-form-button>Регистрация</x-form-button>
        </form>
    </section>
</x-layout>