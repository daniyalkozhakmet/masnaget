@props(['active' => false])

<a {{ $attributes->merge(['class' => $active ? 'text-primary fw-bold nav-link border-bottom border-primary ' : 'nav-link rounded']) }} aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</a>