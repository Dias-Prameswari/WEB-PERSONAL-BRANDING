@component('mail::message')
# Pesan Baru (Form Kontak)

**Nama:** {{ $msg->name }}  
**Email:** {{ $msg->email }}

@if(!empty($msg->phone))
**Nomor Telepon:** {{ $msg->phone }}
@endif

**Subjek:** {{ $msg->subject }}

**Pesan:**
> {{ $msg->message }}
@endcomponent
