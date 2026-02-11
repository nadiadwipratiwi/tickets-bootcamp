@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Tickets</h3>
    <a href="{{ route('tickets.create') }}" class="btn btn-primary">
        + Tambah Ticket
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->title }}</td>
                    <td>
                        <span class="badge 
                            @if($ticket->status == 'open') bg-success
                            @elseif($ticket->status == 'process') bg-warning
                            @else bg-secondary
                            @endif">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin mau hapus?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada ticket</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
