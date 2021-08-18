@component('mail::message')
# Halo!

Anda baru saja mengajukan permintaan database {{ $data['info'] }}. Anda dapat mengakses database setelah disetujui oleh Admin. 
Jika anda tidak mengajukan permintaan database, silakan hubungi Admin.

Salam,<br>
{{ config('app.name') }}
@endcomponent
