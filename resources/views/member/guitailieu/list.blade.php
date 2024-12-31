@extends('member.layout.master')
@section('content')
<div class="header">
    <h1>Document</h1>
    <a href="{{url('/add_document')}}">
        <button class="add-btn">
            <i data-lucide="folder-plus"></i>
            Add New Document
        </button>
    </a>
</div>
<div class="search-bar">
    <i data-lucide="search"></i>
    <input type="text" id="searchInput" placeholder="Search document...">
</div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>File Path</th>
                <th>Uploaded At</th>
                <th>Action</th>
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
                    <td>{{ preg_replace('/^\d+_/', '', basename($document->file_path)) }}</td>
                    <td>{{\Carbon\Carbon::parse($document->Uploaded_at)->format('d/m/Y')}}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{url('/delete_document' . $document->id)}}">
                                <button class="delete-btn">
                                    <i data-lucide="trash-2"></i>
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