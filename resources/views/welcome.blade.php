@extends('layouts.table')

@section('judul')
    Halaman Utama
@endsection

    @section('content')
    <h1>Halaman Utama</h1>
    <ul>
        <li>Link 1</li>
        <li>Link 2 <a href="/daftar">Klik Disini</a> </li>
        <li>Link 3</li>
    </ul>
    @endsection