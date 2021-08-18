@component('mail::message')
# Halo!

Permintaan database {{ $data['info'] }} ditolak oleh admin.
Silakan login untuk mengajukan permintaan database kembali.
Jika ada pertanyaan silakan hubungi admin.

Salam,<br>
{{ config('app.name') }}
@endcomponent
