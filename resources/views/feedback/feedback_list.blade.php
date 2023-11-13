@extends('layouts.admin_main')
<title>Feedbacks</title>
@section('main-section')
<div class="main-panel">
    <div class="container mt-4" style="width:900px; padding: 5px 5px 0 5px;">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-responsive custom-table" style="text-align:center;">
                    <thead class="table table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Submitted by</th>
                            <th>Comments Is Enable</th>
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
                            <td>
                                <input type="checkbox" class="feedback-enable"
                                       data-feedback-id="{{$feedback->id}}"
                                       {{$feedback->is_enable ? 'checked' : ''}}>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.feedback-enable').change(function () {
            const feedbackId = $(this).data('feedback-id');
            const isEnable = $(this).prop('checked') ? 1 : 0;
            $.ajax({
                type: 'POST',
                url: '/update_feedback_status',
                data: {
                    feedback_id: feedbackId,
                    is_enable: isEnable,
                    _token: "{{ csrf_token() }}"
                },
                success: function (data) {
                },
                error: function (xhr, status, error) {
                }
            });
        });
    });
</script>
@endsection
