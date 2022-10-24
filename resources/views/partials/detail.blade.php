@extends('base')
@section('content')
    <div class="container">
        <h1>Detail obce</h1>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="jumbotron">
                <div class="row">
                        <div class="col-md-6 col-sm-12">
                            Meno starostu:
                        </div>
                        <div class="col-md-6 col-sm-12">
                            {{ $settlement->mayor_name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            Adresa obecného úradu:
                        </div>
                        <div class="col-md-6 col-sm-12">
                            {{ $settlement->city_hall_address }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            Telefón:
                        </div>
                        <div class="col-md-6 col-sm-12">
                            {{ $settlement->phone }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            Fax:
                        </div>
                        <div class="col-md-6 col-sm-12">
                            {{ $settlement->fax }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            Email:
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <a href="mailto:{{ $settlement->email }}">
                                {{ $settlement->email }}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            Web:
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <a href="https://{{ $settlement->web_address }}" target="_blank" rel="noopener noreferrer">
                                {{ $settlement->web_address }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="jumbotron">
                    <h2>{{ $settlement->name }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection