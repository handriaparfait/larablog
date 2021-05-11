@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea",
            branding: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
	</script>

@endsection

@section('content')

	<div class="row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
		<div class="col m8" style="padding-right: 50px">
			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}

			<div class="row">
				<div id="input-switches" class="section">
					<div class="row">
						<div class="col s12 m4 l3">
							<p></p>
						</div>
						<div class="col s12 m8 l9">
							<!-- Switch -->
							<div class="">
								Type de Post :
								<label>
									<input name="type" type="radio" checked  value="Offre"/>
									<span>Offre</span>
								</label>
								|
								<label>
									<input name="type" type="radio" value="Demande"/>
									<span>Demande</span>
								</label>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
				<div class="input-field col s6">
					<input name="title" id="title" type="text" class="validate" value="{{ $post->title }}">
					<label for="title">Titre</label>
				</div>
				<div class="input-field col s6">
					<input name="slug" id="slug" type="text" class="validate" value="{{ $post->slug }}">
					<label for="slug">Slug</label>
				</div>
			</div>
			<div class="row">
				{{ Form::label('category_id', "Category:", ['class' => 'form-spacing-top']) }}
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}


			</div>
			<div class="row">
				<label>TAGS :</label>
				<div class="input-field col s12">
					{{--{{ Form::label('tags', 'Tags:', ['class' => '']) }}--}}
					{{ Form::select('tags[]', $tags, null, ['class' => 'select2-multi', 'multiple' => 'multiple']) }}
				</div>
			</div>
			<br>

			@if(!empty($post->image))
				<img src="{{asset('/images/' . $post->image)}}" width="400" height="200" />
			@endif

			<div class="row">
				<label for="body">Contenue :</label>
				<div class="input-field col s12">
					<textarea name="body" id="body" cols="100" rows="10"> {!! $post->body !!}</textarea>
				</div>
			</div>
		</div>

		<div class="col m4">
			<div class="card-panel">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col s12 m4">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col s12 m4">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>	<!-- end of .row (form) -->

@stop

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">

		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');

	</script>

@endsection