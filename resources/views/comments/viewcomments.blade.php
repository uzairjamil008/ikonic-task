@extends('layouts.main')
<title>Comments</title>
@section('main-section')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 style="color: #0D6EFD;">Comments for Feedback: {{ $feedback->title }}</h4>
                </div>
                @if($comments->isEmpty())
                    <p>No comments found</p>
                @else
                    @foreach ($comments as $comment)
                    <div class="card-body" id="printarea">
                        <div class="row">
                            <div class="col-md-3">
                                <label for=""><b>Username:</b></label>
                                <div>{{ $comment->username }}</div>
                            </div>
                            <div class="col-md-3">
                                <label for=""><b>Date:</b></label>
                                <div>{{ $comment->date }}</div>
                            </div>
                            <div class="col-md-3">
                                <label for=""><b>Content:</b></label>
                                <div>{{ $comment->content }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
