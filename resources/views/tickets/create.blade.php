@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-3">Tambah Ticket</h4>

        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="open">Open</option>
                    <option value="process">Process</option>
                    <option value="closed">Closed</option>
                </select>
            </div>

            <button class="btn btn-success">Save</button>
            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

@endsection
