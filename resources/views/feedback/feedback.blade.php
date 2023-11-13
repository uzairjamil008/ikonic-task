@extends('layouts.main')
<title>Feedbacks</title>
@section('main-section')
<div class="main-panel">
    <!-- Button trigger modal -->
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-5">
            <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Submit Feedback
            </button>
        </div>
    </div>
    <!-- Modal for insert data -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post New Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('submit_feedback')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="modal-body">
                        <label for="name" class="form-label">Description:</label>
                        <textarea class="form-control" name="description" rows="3" required></textarea>
                    </div>
                    <div class="modal-body">
                        <label for="name" class="form-label">Category:</label>
                        <select class="form-select" aria-label="Default select example" name="category" id="status" required>
                            <option>Bug Report</option>
                            <option>Feature Request</option>
                            <option>Improvement</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal END -->
    <div class="container" style="width:900px; padding: 5px 5px 0 5px;">
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Submitted By</th>
                            <th>Vote Count</th>
                            <th>Vote</th>
                            <th>Comments</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                        <tr>
                            <td>{{$feedback->id}}</td>
                            <td>{{$feedback->title}}</td>
                            <td>{{$feedback->description}}</td>
                            <td>{{$feedback->category}}</td>
                            <td>{{$feedback->user->name}}</td>
                            <td>{{$feedback->voteCount}}</td>
                            <td>
                                <!-- vote button -->
                                <form method="POST" action="{{ route('feedback.vote', ['feedback' => $feedback->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Vote
                                    </button>
                                </form>
                            </td>
                            <td>
                            @if ($feedback->is_enable === 1)
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#commentModal{{$feedback->id}}">
                                        Add
                                    </button>
                                @else
                                <button type="button" class="btn btn-sm" style="color: red;" disabled>
                                        Disabled
                                    </button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('feedback.comments', ['feedback' => $feedback->id]) }}" class="btn btn-secondary btn-sm">
                                   View
                                </a>
                            </td>
                            <!-- Modal for comment -->
                            <div class="modal fade" id="commentModal{{$feedback->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Post Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('comment.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="feedback_id" value="{{$feedback->id}}">
                                            <div class="modal-body">
                                                <label for="content">Content:</label>
                                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal END -->
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
