@extends('partials/base')
@section('content')
    <div class="container">
        <h1 class="text-center">Detail obce</h1>
        <div class="row">
            <div class="col-md-6 col-sm-12 bg-light p-5">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <strong>Meno starostu:</strong>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        {{ $settlement->mayor_name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <strong>Adresa obecného úradu:</strong>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        {{ $settlement->city_hall_address }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <strong>Telefón:</strong>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        {{ $settlement->phone }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <strong>Fax:</strong>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        {{ $settlement->fax }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <strong>Email:</strong>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        @foreach($settlement->emails as $email)
                            <a href="mailto:{{ $email }}">{{ $email }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <strong>Web:</strong>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        @foreach($settlement->web_addresses as $web_address)
                            <a href="https://{{ $web_address }}" target="_blank" rel="noopener noreferrer">
                                {{ $web_address }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <strong>Zemepisné súradnice:</strong>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        {{ $settlement->coordinates }}
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 p-5">
                <div class="bg-white">
                    @if (Str::length($settlement->coat_of_arms_path))
                        <img class="mx-auto d-block" src="{{ url('storage/images/coat-of-arms/' . $settlement->coat_of_arms_path) }}" alt="Erb {{ $settlement->name }}">
                    @endif
                    <h2 class="text-center">{{ $settlement->name }}</h2>
                    </div>
            </div>
        </div>
    </div>
@endsection