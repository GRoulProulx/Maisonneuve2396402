@extends('layouts.app')
@section('title', 'Student List')
@section('content')

<div class="container-fluid mt-4">
    <div class="row mb-3">
        <div class="col">
            <h2 class="text-white">List of students</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('student.create') }}" class="btn btn-success">Add a new student</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-striped table-bordered">
            <thead>
                <tr class="text-nowrap">
                    <th class="text-primary fs-4">ID</th>
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
                <tr class="text-nowrap">
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->date_of_birth}}</td>
                    <td>{{ $student->city->name }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('student.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center active">
        {{ $students->links('pagination::bootstrap-4') }}
    </div>
    @endsection