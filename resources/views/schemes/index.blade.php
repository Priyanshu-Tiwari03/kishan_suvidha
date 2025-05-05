@extends('layouts.admin')

@section('content')

    <h2>All Schemes</h2>

    <a href="{{ route('schemes.create') }}" class="btn">Create New Scheme</a>

    <table class="scheme-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Applying Fee</th>
                <th>Description</th>
                <th>Last Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schemes as $scheme)
                <tr>
                    <td>{{ $scheme->title }}</td>
                    <td>{{ $scheme->applying_fee }}</td>
                    <td>{{ $scheme->description }}</td>
                    <td>{{ $scheme->last_date }}</td>
                    <td>{{ $scheme->status }}</td>
    
                    <td>
                        <a href="{{ route('schemes.show', $scheme->id) }}" class="btn small">View</a>
                        <a href="{{ route('schemes.edit', $scheme->id) }}" class="btn small">Edit</a>
                        <form action="{{ route('schemes.destroy', $scheme->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn small danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        
    </div>
    @if($schemes->isEmpty())
<tr>
    <td colspan="6" class="text-center">No Schemes Available.</td>
</tr>
@endif
@endsection
