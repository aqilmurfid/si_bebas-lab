@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="fs-5 text-danger">
            {{ __('Maaf email/password yang anda masukkan salah.') }}
        </div>

        <ul class="mt-3 text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
