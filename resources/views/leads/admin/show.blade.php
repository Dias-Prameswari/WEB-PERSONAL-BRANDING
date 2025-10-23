@extends('layouts.app')
@section('page_bg', 'hero-cover')
@section('main_class', 'pt-6 pb-12')

@section('content')
<div class="container-lg">
  <h1 class="text-white font-display text-3xl text-center mb-6">Detail Lead #{{ $lead->id }}</h1>

  <div class="bg-white/95 shadow rounded-xl p-6 max-w-3xl mx-auto space-y-4">
    <div>
      <div class="text-gray-500 text-sm">Nama</div>
      <div class="font-medium">{{ $lead->name }}</div>
    </div>
    <div>
      <div class="text-gray-500 text-sm">Email</div>
      <div class="font-medium">{{ $lead->email }}</div>
    </div>
    <div>
      <div class="text-gray-500 text-sm">Phone</div>
      <div class="font-medium">{{ $lead->phone ?? '-' }}</div>
    </div>
    <div>
      <div class="text-gray-500 text-sm">Program</div>
      <div class="font-medium">{{ $lead->program ?? '-' }}</div>
    </div>
    <div>
      <div class="text-gray-500 text-sm">Pesan</div>
      <div class="whitespace-pre-line">{{ $lead->message ?? '-' }}</div>
    </div>

    <div class="pt-3 text-sm text-gray-500">
      Dikirim: {{ $lead->created_at->format('d M Y H:i') }}
    </div>

    <div class="pt-2">
      <a href="{{ route('leads.admin.index') }}" class="text-blue-600 underline">← Kembali</a>
    </div>
  </div>
</div>
@endsection
