<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required'
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket berhasil dibuat');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required'
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket berhasil diupdate');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket berhasil dihapus');
    }
}
