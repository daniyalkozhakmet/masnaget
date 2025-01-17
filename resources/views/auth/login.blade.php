<x-layout>
    <section class="container">
        <h1>Логин</h1>
        <form method="POST" action="/login">
            @csrf
            <x-form-field>
                <x-form-label for="email">Почта</x-form-label>
                <x-form-input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Почта" :value="old('email')" />
                <x-form-error name="email" />
            </x-form-field>
            <x-form-field>
                <x-form-label for="password">Пароль</x-form-label>
                <x-form-input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="Пароль" />
            </x-form-field>
            <x-form-button>Логин</x-form-button>
        </form>
    </section>

</x-layout>