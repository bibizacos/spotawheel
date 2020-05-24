@extends('layouts.app')

@section('title', 'Clients')

@section('content')
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            @foreach($columns as $key=>$columnName)
                <th scope="col">{{$columnName}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $key=>$client)
            <tr>
                <th scope="row">{{ $client->id }}</th>
                <td>{{ $client->name }}</td>
                <td>{{ $client->surname }}</td>
                <td>{{ $client->created_at }}</td>
                <td>{{ $client->updated_at }}</td>
                <td>
                    <a href="{{ url('/client/'.$client->id) }}" type="button" class="btn btn-link">
                        more
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection