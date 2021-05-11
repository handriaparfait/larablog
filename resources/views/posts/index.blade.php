@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row">
		<div class="col s12 m10">
			<h1>Tous les TROCK Disponnible</h1>
		</div>

		<div class="col s12 m2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
		</div>
		<div class="col s12 m12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col s12 m12">


			<div class="row">
			@foreach ($posts as $post)
			<div class="col s12 m4">
				<div class="card">
					<div class="card-image waves-effect waves-block waves-light">
						@if(!empty($post->image))
							<img src="{{asset('/images/' . $post->image)}}" width="400" height="200" />
						@endif
					</div>
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4">{{ $post->title }}<i class="material-icons right">more_vert</i></span>
						<p><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>
							@if(Auth::user()->id == $post->user_id)
								<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
							@endif</p>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4">{{ $post->title }}<i class="material-icons right">close</i></span>
						<p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</p>
					</div>
				</div>
			</div>
			@endforeach
			</div>

			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
		</div>
	</div>

@stop