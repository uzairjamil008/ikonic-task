@extends('layouts.admin_main')
<title>Admin Dashboard</title>
@section('main-section')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 mt-3">
            <h4>Welcome To Admin Dashboard</h4>
            <hr>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
