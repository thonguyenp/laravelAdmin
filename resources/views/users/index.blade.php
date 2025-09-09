@extends('layouts.main')

@section('title', $title)
@php
    $listTitle= "List";
@endphp
@section('content')
    <ul>
        <h1>{{$listTitle}}</h1>
        <button class="btn btn-primary">
            <a href="{{ route('users.create') }}" style="color: white; text-decoration:none;" >Create New User</a> 
        </button>
        @foreach($users as $u)
        <!-- Toán tử -> giống như toán tử . trong .net mvc -->
        {{-- <li> {{$u->name}}</li> --}}
        @if ($loop->index > 0)
            <li> {{$u->name}}</li>
        @endif
        @endforeach
    </ul>
@endsection
