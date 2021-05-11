@extends('main')

@section('title', '| View Post')

@section('content')

	<div class="row">
		<div class="col s12 m8">

			<h1>{{ $post->title }}</h1>
			@if(!empty($post->image))
				<img src="{{asset('/images/' . $post->image)}}" width="400" height="200" />
			@endif


			<p class="lead" style="width: 50%;">{!! $post->body !!}</p>

			<hr>
			
			<div class="tags">
				<h6>Tags :</h6>
				@foreach ($post->tags as $tag)
					<div class="chip">
						{{ $tag->name }}
					</div>
				@endforeach
			</div>

			<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{!! $comment->comment !!} </td>
							{{--<td>--}}
								{{--<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>--}}
								{{--<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>--}}
							{{--</td>--}}
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="col s12 m4">
			<div class="card-panel">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
				</dl>

				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{ $post->category->name }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<dl class="dl-horizontal">
					<label>Created by :</label>
					<p>{{ $post->user->name }}</p>
				</dl>
				<hr>
				<div class="row">
					@if(Auth::user()->id == $post->user_id)
					<div class="col s12 m6">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col s12 m6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
					@endif
				</div>

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('posts.index', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection