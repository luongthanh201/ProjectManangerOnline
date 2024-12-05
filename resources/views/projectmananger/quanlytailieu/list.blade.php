@extends('projectmananger.layout.master')
@section('content')
<div class="header">
    <h1>Project</h1>
</div>
<div class="search-bar">
    <i data-lucide="search"></i>
    <input type="text" id="searchInput" placeholder="Search projects...">
</div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>File Path</th>
                <th>Status</th>
                <th>Uploaded By</th>
                <th>Project</th>
                <th>Uploaded At</th>
            </tr>
        </thead>
        <tbody>
            @if($documents->isEmpty())
                <tr>
                    <td colspan="7">No document found.</td>
                </tr>
            @endif
            @foreach ($documents as $document)
                <tr>
                    <td>{{$document->id}}</td>
                    <td>{{$document->name}}</td>
                    <td>{{$document->file_path}}</td>
                    <td>{{$document->user->name ?? 'Unknown User'}}</td>
                    <td>{{$document->project->name ?? 'Unknown Project'}}</td>
                    <td>{{\Carbon\Carbon::parse($document->Uploaded_at)->format('d/m/Y')}}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{url('/dowload_document/' . $document->id)}}" title="Tải xuống tài liệu">
                                <button class="download-btn">
                                    <i data-lucide="download"></i> <!-- Icon tải xuống -->
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection