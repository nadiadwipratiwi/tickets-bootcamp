@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-3">Edit Ticket</h4>

        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $ticket->title }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ $ticket->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="process" {{ $ticket->status == 'process' ? 'selected' : '' }}>Process</option>
                    <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

@endsection
