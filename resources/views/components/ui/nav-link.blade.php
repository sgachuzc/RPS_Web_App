@props([
  'active' => false,
])

<li class="nav_item">
  <a {{ $attributes }} class="nav_link {{ ($active) ? 'nav_link_active' : '' }}" aria-current="{{ $active ? 'page' : 'false'}}">
    {{ $slot }}
  </a>
</li>