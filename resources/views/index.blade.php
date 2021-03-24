@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    <div class="card-body">
                        <h2>Contacts</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $single)
                                <tr>
                                    <td>{{$single->name}}</td>
                                    <td>{{$single->email}}</td>
                                    <td>{{$single->phone}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
