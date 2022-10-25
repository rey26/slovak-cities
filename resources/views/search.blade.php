@extends('partials/base')
@section('content')
<div class="container-fluid bg-primary">
    <div class="big-element">
        <h1 class="text-white text-center">Vyhľadať v databáze obcí</h1>
        <input type="text" name="search" id="search" class="form-control" placeholder="Zadajte názov"/>
        <div id="search-results" class="list-group"></div>
    </div>
</div>
@endsection
