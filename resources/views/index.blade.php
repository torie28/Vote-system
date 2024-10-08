@extends('layouts.app')

@section('title', 'Vote')

@section('content')
    <h2>Cast Your Vote</h2>
    <form method="POST" action="{{ route('vote.submit') }}">
        @csrf
        <div class="mb-3">
            <label for="candidate" class="form-label">Select Candidate</label>
            <select class="form-select" id="candidate" name="candidate">
                <option value="1">Candidate 1</option>
                <option value="2">Candidate 2</option>
                <option value="3">Candidate 3</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit Vote</button>
    </form>
@endsection
