@extends('layouts.admin_main')
<title>Admin Dashboard</title>
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
                <div class="container mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="color: #0D6EFD;">Update User Role</h4>
                            <hr>
                            <form action="{{url('update_user')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$users->id}}">
                                <label for="">Role:</label>
                                <div class="form-group">
                                    <select name="role" class="form-control">
                                        <option value="User" @if($users->role == 'User') selected @endif>User</option>
                                        <option value="Admin" @if($users->role == 'Admin') selected @endif>Admin</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-warning btn-sm mt-2"><i class="fa fa-pencil"></i>
                                    Update</button>
                            </form>
                        </div>
                    </div>
                </div>
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
