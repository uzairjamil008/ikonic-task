@extends('layouts.admin_main')
<title>Users</title>
@section('main-section')
<div class="main-panel">
    <div class="container mt-4" style="width:900px; padding: 5px 5px 0 5px;">
        <!-- show success message when data insert update and delete -->
        @if(session()->has('message'))
        <div class="alert alert-success" id="Message">
            {{ session()->get('message') }}
        </div>
        @endif
        <!-- END Scccess Message -->
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-responsive custom-table" style="text-align:center;">
                    <thead class="table table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->role == 'User' || $user->role == 'Admin')
                                <a href='edit/{{ $user->id }}' class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href='delete/{{ $user->id }}' class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- scripte to show flash message for a few seconds -->
<script>
    setTimeout(function() {
        $('#Message').fadeOut('fast');
    }, 3000);
</script>
<!-- END Script -->
