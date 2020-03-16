@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{  'Zabroniroval.ru' }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Здравствуйте')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ 'Пожалуйста перейдите по ссылке ниже, чтобы подвердить регистрацию' }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ 'Верифицировать' }}
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
@lang('С наилучщими пожеланиями'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Если по каким-то причинам Вы не смогли подтвердить верификацию, скопируйте и вставьте в свой браузер ссылку ниже:  \n".
    ' [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endisset
@endcomponent

