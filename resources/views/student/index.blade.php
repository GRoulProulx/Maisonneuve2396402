@extends('layouts.app')
@section('title', 'Student List')
@section('content')

<div class="container mt-4">
    <div class="row mb-3">
        <div class="col">
            <h2 class="text-white">List of students</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('student.create') }}" class="btn btn-primary">Add a new student</a>
        </div>
    </div>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="text-primary fs-4">Name</th>
                <th class="text-primary fs-4">Address</th>
                <th class="text-primary fs-4">Phone</th>
                <th class="text-primary fs-4">Email</th>
                <th class="text-primary fs-4">Birthday</th>
                <th class="text-primary fs-4">City</th>
                <th class="text-primary fs-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{$student->name}}</td>
                <td>{{$student->address}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->date_of_birth}}</td>
                <td>{{ $student->city_id}}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('student.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection