@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Guestbook</h1>
        @if (count($entries) > 0)
            <ul>
                @foreach ($entries as $entry)
                    <li>
                        <strong>{{ $entry->name }}</strong>
                        <small>{{ $entry->email }}</small>
                        <p>{{ $entry->message }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No entries yet.</p>
        @endif
        <hr>
        <h2>Add a new entry:</h2>
        <form method="POST" action="{{ route('guestbook.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-reset-modal">Reset</button>

        </form>
        <!-- Confirm reset modal -->
<div class="modal fade" id="confirm-reset-modal" tabindex="-1" role="dialog" aria-labelledby="confirm-reset-modal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirm-reset-modal-label">Confirm Guest Book Reset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to reset the guest book? This action cannot be undone.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="{{ route('guestbook.reset') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Reset Guest Book</button>
        </form>
      </div>
    </div>
  </div>
</div>

    </div>
@endsection
