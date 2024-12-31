@extends('client.layout.master')
@section('content')
<div class="header" style="place-items: center;">
    <h1>Gửi Phản Hồi</h1>
</div>
<div class="feedback-form">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>Thông báo!</h4>
            {{session('success')}}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="feedback-form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="feedbackTitle">Title</label>
            <input type="text" id="feedbackTitle" placeholder="Nhập tiêu đề phản hồi" name="name">
        </div>
        <div class="form-group">
            <label for="feedbackMessage">Content</label>
            <textarea id="feedbackMessage" placeholder="Nhập nội dung phản hồi" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="id_project">Project:</label>
            <input type="text" id="id_project" name="id_project" value="{{ old('id_project') }}">
        </div>
        <div class="form-group">
            <label for="task-priority">priority:</label>
            <select id="task-priority" name="priority">
                <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>High</option>
                <option value="Medium" {{ old('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>Low</option>
            </select>
            @error('priority')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="submit-btn">Send</button>
    </form>
</div>
@endsection