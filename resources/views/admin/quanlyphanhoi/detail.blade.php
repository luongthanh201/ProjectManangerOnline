@extends('client.layout.master')
@section('content')
<div id="progressModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Content Feedback</h2>
            <a href="{{url('/feedback_mananger')}}">
                <button class="close-btn">
                    <i data-lucide="x"></i>
                </button>
            </a>
        </div>
        <form id="project-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="task-status">Content:</label>
                <p>{{$feedbacks->content}}</p>
            </div>
        </form>
    </div>
</div>
@endsection