@props([
  'link' => '#'
])

<a href="{{ $link }}" 
   class="btn btn-success rounded-circle shadow" 
   style="position: fixed; bottom: 20px; right: 20px; z-index: 1050; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;" 
   target="_blank" 
   data-bs-toggle="tooltip" 
   data-bs-placement="left" 
   title="Contáctanos por WhatsApp">
    <img src="{{ Vite::asset('resources/images/whatsapp.svg') }}" alt="Whatsapp" width="30" height="30" />
</a>