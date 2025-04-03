@extends ('layouts.app')
@section('title', 'Forum')
@section('content')
<div class="row">
    <h1>@lang('Forum')</h1>
    @forelse ($forum as $post)
    <div class="col-md-6">
        <div class="card mb-3 bg-primary text-white">
            <div class="card-header">
                <h5 class="card-title">Forum post #{{ $post->id }}</h5>
            </div>
            <div class="card-body bg-light text-black">
                <hr>
                <h5 class="card-title">{{ $post->title_en }}</h5>
                <p class="card-text text-black">{{ $post->content_en }}</p>
                <h5 class="card-title">{{ $post->title_fr }}</h5>
                <p class="card-text text-black">{{ $post->content_fr }}</p>
                <hr>
                <p><small class="card-text">@lang('resources'):</small></p>

            </div>
        </div>
    </div>
    @empty
    <p>@lang('No posts found.')</p>
    @endforelse
</div>
@endsection