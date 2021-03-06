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

                        @if (Session::has('message'))
                            <li class="list-group-item">{!! session('message') !!}</li>
                        @endif
                    </div>
                    <div class="card-body">
                        <h2>Your contacts</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userContacts as $single)
                                <tr>
                                    <td>{{$single->name}}</td>
                                    <td>{{$single->email}}</td>
                                    <td>{{$single->phone}}</td>
                                    <td>
                                        <form method="post" action="{{ route( 'user.contact.remove' ) }}">
                                            @csrf
                                            <input type="hidden" name="contact_id" value="{{$single->id}}">
                                            <button type="submit">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <h2>All contacts</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allContacts as $single)
                                <tr>
                                    <td>{{$single->name}}</td>
                                    <td>{{$single->email}}</td>
                                    <td>{{$single->phone}}</td>
                                    <td>
                                        <form method="post" action="{{ route( 'user.contact.add' ) }}">
                                            @csrf
                                            <input type="hidden" name="contact_id" value="{{$single->id}}">
                                            <button type="submit">Save</button>
                                        </form>
                                    </td>
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
