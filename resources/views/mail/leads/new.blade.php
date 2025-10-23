@component('mail::message')
# Lead Baru

**Nama:** {{ $lead->name }}  
**Email:** {{ $lead->email }}  
**Phone:** {{ $lead->phone ?? '-' }}  
**Program:** {{ $lead->program ?? '-' }}

**Pesan:**
> {{ $lead->message ?? '-' }}

@component('mail::panel')
Diterima: {{ $lead->created_at?->format('d M Y H:i') }}
@endcomponent
@endcomponent
