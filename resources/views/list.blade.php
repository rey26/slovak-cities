@extends('partials/base')
@section('content')
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
                    <td>
                        @foreach($settlement->web_addresses as $web_address)
                            <a href="https://{{ $web_address }}" target="_blank" rel="noopener noreferrer">
                                {{ $web_address }}
                            </a>
                        @endforeach
                    </td>
                    <td>
                        @foreach($settlement->emails as $email)
                            <a href="mailto:{{ $email }}">{{ $email }}</a>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $settlements->links() }}
    </div>
@endsection