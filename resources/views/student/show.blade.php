@extends('layouts.app')
@section('title', 'Student Details')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-dark text-white">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Student Details</h3>
                    <a href="{{ route('student.index') }}" class="btn btn-outline-light">Back to List</a>
                </div>
                <div class="card-body">
                    <table class="table table-dark">
                        <tr>
                            <th width="30%">Name</th>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $student->address }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $student->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $student->email }}</td>
                        </tr>
                        <tr>
                            <th>Birthday</th>
                            <td>{{ $student->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $student->city->name ?? 'N/A' }}</td>
                        </tr>
                    </table>

                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection