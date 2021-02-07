@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} Uniclaretiana. Todos los derechos reservados.
@endcomponent
@endslot
@endcomponent
