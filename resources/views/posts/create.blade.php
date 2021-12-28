@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-10 mx-auto p-5 border rounded">
        @include('commons.error')

        {!! Form::model($post, ['route' => 'posts.store','enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-sm-4 mr-5 ml-2 user-image-edit">
                <div class="text-center">
                    <img src="http://get.secret.jp/pt/file/1590591773.png" class="avatar img-thumbnail mb-4" alt="post_image" style="border-radius:0;">
                    {!! Form::file('post_image', ['class' => 'file-upload']) !!}
                </div>
            </div>
            <div class="col-sm-6 mx-auto edit-form">
                <div class="form-group">
                    <div class="col-xs-6">
                        {!! Form::label('category', 'Category', ['class' => 'h4']) !!}
                        <div class="block"></div>
                        {{Form::select('category', [
                           'Pets' => 'Pets',
                           'Free' => 'Free',
                           'News' => 'News'], '', ['class'=>'select_category','placeholder' => 'Select Category']
                        )}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        {!! Form::label('post_title', 'Post Title', ['class' => 'h4']) !!}
                        {!! Form::text('post_title', old('post_title'), ['class' => 'form-control','placeholder'=>'title']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        {!! Form::label('post_body', 'Post Body', ['class' => 'h4']) !!}
                        {!! Form::textarea('post_body', old('post_body'), ['class' => 'form-control','placeholder'=>'text here.','rows' => '2']) !!}
                    </div>
                </div>


                <div class="form-group mt-5">
                    <div class="col-xs-12">
                        {!! Form::submit('Add post', ['class' => 'btn save-profile btn-block']) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
