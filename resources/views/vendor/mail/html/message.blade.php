
<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
    {{-- 0.tcp.sa.ngrok.io:00000 --}}
<img src="{{ "http://localhost:9000/storage/samu.png" }}" alt="">
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
Bilhete Unico Digital
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
