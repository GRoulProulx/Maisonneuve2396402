@extends ('layouts.app')
@section('title', 'Forum')
@section('content')
<div class="row">
    <h1>@lang('Forum')</h1>
    @forelse ($forum as $post)
    <div class="col-md-6">
        <div class="card mb-3 bg-primary text-white">
            <div class="card-header">
                <h5 class="card-title">Forum post</h5>
            </div>
            <div class="card-body bg-light text-black">
                <h5 class="card-title">{{ $post->title_en }}</h5>
                <p class="card-text text-black">{{ $post->content_en }}</p>
                <h5 class="card-title">{{ $post->title_fr }}</h5>
                <p class="card-text text-black">{{ $post->content_fr }}</p>
                <div class="">
                <p><small class="card-text">@lang('resources'):</small></p>
                </div>
            </div>
        </div>
    </div>
    @empty
    <p>@lang('No posts found.')</p>
    @endforelse
</div>
@endsection