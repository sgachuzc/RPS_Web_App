@props([
  'active' => false,
  'icon' => ''
])

<li class="nav-item">
  <a class="nav-link {{ $active ? 'active' : ''}}" aria-current="{{ $active ? 'page' : 'false'}}" {{ $attributes }}>
    <div class="d-flex align-items-center gap-2">
      <span class="material-symbols-outlined">{{ $icon }}</span>
      <span style="margin-top: 5px;">{{ $slot }}</span>
    </div>
  </a>
</li>