@extends('main')

@section('title', '| Publier un troc')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
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

    <!--start container-->
    <div class="container">
        <div class="section">

            <h1>Soummettre un TROC</h1>

            <div class="divider"></div>

            <!--Input fields-->
            <div id="input-fields">
                <h4 class="header">Formulaires</h4>
                <div class="row">
                    <div class="col s12 m12">
                        <div class="row">
                            {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
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
                                        <input name="title" id="title" type="text" class="validate">
                                        <label for="title">Titre</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input name="slug" id="slug" type="text" class="validate">
                                        <label for="slug">Slug</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Catégories</label>
                                    <select class="browser-default" name="category_id">
                                        <option value="" disabled selected>Choose your option</option>
                                        @foreach($categories as $category)
                                            <option value='{{ $category->id }}'>{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select multiple name="tags[]" id="tag">
                                            <option value="" disabled selected>Choose your option</option>
                                            @foreach($tags as $tag)
                                                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                                            @endforeach

                                        </select>
                                        <label>TAGS</label>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="featured_img">Image :</label>
                                    <div class="btn">
                                        <input type="file" name="featured_img" id="featured_img">
                                    </div>
                                </div>
                            <br>
                                
                                <div class="row">
                                    <label for="body">Contenue :</label>
                                    <div class="input-field col s12">
                                        <textarea name="body" id="body" cols="100" rows="10"></textarea>
                                    </div>
                                </div>
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}


@endsection
