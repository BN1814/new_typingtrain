@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('มีบางอย่างผิดพลาด!')
{{-- # @lang('Whoops!') --}}
@else
# @lang('สวัสดี')
{{-- # @lang('Hello!') --}}
@endif
@endif

{{-- Intro Lines --}}
 @foreach ($introLines as $line)
{{ $line }}
{{-- {{ 'โปรดคลิกปุ่มด้านล่างเพื่อยืนยันที่อยู่อีเมลของคุณ' }} --}}

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
{{-- {{ __('ยืนยันอีเมล') }} --}}
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}
{{-- {{ 'หากคุณไม่ได้สร้างบัญชี คุณไม่จำเป็นต้องดำเนินการใดๆ เพิ่มเติม' }} --}}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('ด้วยความนับถือ'),
{{-- @lang('Regards'),<br> --}}
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "ถ้าหากว่าคุณเกิดปัญหาที่กดปุ่ม \":actionText\" ให้คัดลอกและวาง URL ด้านล่าง".
    'ลงใน web browser ของคุณ :',
    // "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    // 'into your web browser:',
    [
        'actionText' => $actionText,
    ]
    // "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    // 'into your web browser:',
    // [
    //     'actionText' => $actionText,
    // ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
