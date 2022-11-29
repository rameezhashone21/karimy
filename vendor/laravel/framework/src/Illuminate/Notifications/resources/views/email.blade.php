@component('mail::layout')
    {{-- Header --}}
     @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <!-- header here -->
       <img
        class="mb-3 w-xl-100 m20w"
        alt="logo"
        width="100"
        height="100"
        src="{{ asset('frontend/images/Karimy_white.png') }}"
      />
        @endcomponent
    @endslot


{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting . (empty($toName) ? "" : " " . $toName . ",") }}
@else
@if ($level == 'error')
# @lang('Whoops') {{ empty($toName) ? "" : " " . $toName . "," }}
@else
# @lang('Hello') {{ empty($toName) ? "" : " " . $toName . "," }}
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
switch ($level) {
case 'success':
    $color = 'green';
    break;
case 'error':
    $color = 'red';
    break;
default:
    $color = 'karimy';
}
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
@lang(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser: ',
    [
        'actionText' => $actionText
    ]
)
[{{ $actionUrl }}]({!! $actionUrl !!})
@endcomponent
@endisset



  {{-- Footer --}}
    @slot('footer')
        @component('mail::footer', ['url' => config('app.url'),'color' => 'success'])
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
