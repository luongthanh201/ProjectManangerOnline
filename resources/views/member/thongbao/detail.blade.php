@extends('member.layout.master')
@section('content')
<div id="progressModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Content Notify</h2>
            <a href="{{url('/received_notify')}}">
                <button class="close-btn">
                    <i data-lucide="x"></i>
                </button>
            </a>
        </div>
        <form id="project-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="task-status">Content:</label>
                <p>{{$notifies->content}}</p>
            </div>

            <div class="form-actions">
                <a href="{{url('/received_notify')}}">
                    <button type="button" class="cancel-btn">Cancel</button>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection