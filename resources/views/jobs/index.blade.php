@extends('layouts.app')

@section('content')
<h1 class="text-3xl text-pink-500 mb-3">Dernieres missions</h1>


@foreach($jobs as $job)
<livewire:job :job="$job"/>


@endforeach
@endsection