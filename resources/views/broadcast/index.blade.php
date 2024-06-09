@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{ route('broadcast.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Create New Message</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Broadcasted News</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Published At</th>
                            <th>Action</th>    
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($allNews as $news)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $news->title . " " . $news->id }}</td>
                                <td>{{ $news->content }}</td>
                                <td>{{ 
                                    \Carbon\Carbon::parse($news->published_at)->format('d F Y H:i:s')
                                }}</td>
                                <td>
                                    <a href="{{ route('broadcast.edit', $news->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('broadcast.destroy', $news->id) }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
