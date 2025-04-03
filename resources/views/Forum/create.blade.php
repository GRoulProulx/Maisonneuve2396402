@extends('layouts.app')
@section('title', 'Create Post')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0"><i class="fas fa-comment-dots me-2"></i>@lang('Create New Forum Post')</h2>
                </div>
                <div class="card-body bg-dark text-white">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('forum.store') }}">
                        @csrf
                        <div class="mb-4">
                            <div class="mb-3">
                                <label for="title_en" class="form-label">Title (English)</label>
                                <input type="text" class="form-control bg-dark text-white @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en') }}">
                                @error('title_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content_en" class="form-label">Content (English)</label>
                                <textarea class="form-control  bg-dark text-white @error('content_en') is-invalid @enderror" id="content_en" name="content_en" rows="5">{{ old('content_en') }}</textarea>
                                @error('content_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-4">
                            <div class="mb-3">
                                <label for="title_fr" class="form-label">Titre (Français)</label>
                                <input type="text" class="form-control bg-dark text-white @error('title_fr') is-invalid @enderror" id="title_fr" name="title_fr" value="{{ old('title_fr') }}">
                                @error('title_fr')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content_fr" class="form-label">Contenu (Français)</label>
                                <textarea class="form-control  bg-dark text-white @error('content_fr') is-invalid @enderror" id="content_fr" name="content_fr" rows="5">{{ old('content_fr') }}</textarea>
                                @error('content_fr')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-1"></i>@lang('Submit')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection