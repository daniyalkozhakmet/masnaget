<button {{ $attributes->merge(['class' => 'btn btn-primary my-3', 'type' => 'submit']) }}>
    {{ $slot }}
</button>