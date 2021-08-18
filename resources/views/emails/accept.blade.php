@component('mail::message')
# Halo!

Permintaan database {{ $data['info'] }} telah disetujui oleh admin.
Silakan login untuk mengakses atau mengunduh data. Jika anda tidak mengajukan permintaan database, silakan hubungi Admin.

Salam,<br>
{{ config('app.name') }}
@endcomponent
