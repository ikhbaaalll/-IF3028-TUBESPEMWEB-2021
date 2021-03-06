@extends('master.master')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('judul')
Home
@endsection

@section('isi')
<div class="form-buat">
    <form method="POST" action="{{ route('searchlapor') }}" enctype="multipart/form-data" class="form">
        @csrf
        <div style="display: flex; justify-content:center">
            <input type="text" name="judul" id="judulsearch" placeholder="   Cari isi laporan">
            <button type="submit" class="btn-search"><img src="{{ asset('image/search-black.svg') }}" alt="icon search" class="search">Cari</button>
        </div>
    </form>
    <div class="text-detail" style="margin-bottom: 40px"><a style="color:black; text-decoration:none;" href="{{route('laporbuatView')}}">Buat Laporan/Komentar</a><img src="{{ asset('image/plus.svg') }}" alt="icon plus"></div>
    Laporan/Komentar Terakhir
    <div class="bar"></div>
    {{-- satu laporan --}}
    @if($lapor == NULL)
    Tidak ada laporan terbaru
    @else
    @foreach($lapor as $lapor)
    <div class="tampil">{!! nl2br(e($lapor->content)) !!}</div>
    <div class="form-container">
        @if($lapor->file != "Tidak ada lampiran")
        <a href="{{ $lapor->file }}" style="text-decoration: none; flex:1;">Unduh Lampiran</a>
        @else
        <span style="color:#D0021B; flex:1;">Tidak ada lampiran</span>
        @endif
        <span style="margin-right: 20px !important">Waktu: {{$lapor->created_at}}</span>
        <span class="f-center"><a href="{{ route('laporShow', $lapor->id)}}">Lihat Selengkapnya</a><img src="{{ asset('image/right-arrow.svg') }}" alt="panah kanan" class="btn-icon" style="margin-left:2px"></span>
    </div>
    <div class="bar"></div>
    @endforeach
    @endif
    {{-- end satu laporan --}}
    <div class="f-center" style="margin-top: 30px">
        <img src="{{ asset('image/titik3.svg') }}" alt="icon titik3" style="height: 25px">
    </div>
</div>
@endsection