@extends('base')
@section('content')
    <div class="container">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Názov</th>
                    <th scope="col">Starosta/Primátor</th>
                    <th scope="col">Web</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($settlements as $settlement)
                    <tr>
                        <th scope="row">{{ $settlement->id }}</th>
                        <td>
                            <a href="{{ Request::url() . '/' . $settlement->id }}" target="_blank" rel="noopener noreferrer">
                                {{ $settlement->name }}
                            </a>
                        </td>
                        <td>{{ $settlement->mayor_name }}</td>
                        <td>{{ $settlement->web_address }}</td>
                        <td>{{ $settlement->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $settlements->appends(Request::except('page'))->render() !!}
        </div>
    </div>
@endsection