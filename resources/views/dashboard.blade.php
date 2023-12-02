@extends('layouts.master')
@section('content')
<form action="{{route('logout')}}" method="post">
    @csrf
    <h2>Welcome to HIFI FINTECH </h2>

<p>{{Auth::user()}}</p>

<button type="submit" value="Logout">Logout </button>
</form>
@endsection