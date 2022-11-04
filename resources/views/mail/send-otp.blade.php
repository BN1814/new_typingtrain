@component('mail::message')
# เปลี่ยนรหัสผ่าน

ด้านล่างเป็นรหัส otp เพื่อเปลี่ยนรหัสผ่านของคุณ
# {{ $otp }}

ขอบคุณ,<br>
{{ config('app.name') }}
@endcomponent
