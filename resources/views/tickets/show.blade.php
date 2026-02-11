@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <h4>{{ $ticket->title }}</h4>
        <hr>
        <p>{{ $ticket->description }}</p>

        <p>
            <strong>Status:</strong> 
            <span class="badge bg-primary">
                {{ ucfirst($ticket->status) }}
            </span>
        </p>

        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

@endsection
