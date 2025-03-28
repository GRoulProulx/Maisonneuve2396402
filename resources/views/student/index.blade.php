@extends('layouts.app')
@section('title', '@lang("list_students")')
@section('content')

<div class="container-fluid mt-4">
    <div class="row mb-3">
        <div class="col">
            <h2 class="text-white">@lang('list_students')</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('student.create') }}" class="btn btn-success">@lang('add_students')</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-striped table-bordered">
            <thead>
                <tr class="text-nowrap">
                    <th class="text-primary fs-4">ID</th>
                    <th class="text-primary fs-4">@lang('name')</th>
                    <th class="text-primary fs-4">@lang('address')</th>
                    <th class="text-primary fs-4">@lang('phone')</th>
                    <th class="text-primary fs-4">@lang('email')</th>
                    <th class="text-primary fs-4">@lang('birthday')</th>
                    <th class="text-primary fs-4">@lang('city')</th>
                    <th class="text-primary fs-4">@lang('actions')</th>
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