@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-10 mx-auto p-5 border rounded">
        @include('commons.error')
        {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-sm-4 mr-5 ml-2 user-image-edit">
                <div class="text-center">
                    <img src="{{ Auth::user()->profile_pic }}" class="avatar img-thumbnail mb-4" alt="avatar">
                    {!! Form::file('profile_pic', ['class' => 'file-upload']) !!}
                </div>
            </div>
            <div class="col-sm-6 mx-auto edit-form">
                <div class="form-group">
                    <div class="col-xs-6">
                        {!! Form::label('user_name', 'Name', ['class' => 'h4']) !!}
                        @if(Auth::user()->user_name == '')
                        {!! Form::text('user_name', $user->name, ['class' => 'form-control','placeholder'=>'name']) !!}
                        @else
                        {!! Form::text('user_name', $user->user_name, ['class' => 'form-control','placeholder'=>'name']) !!}
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        {!! Form::label('description', 'Description', ['class' => 'h4']) !!}
                        {!! Form::text('description', $user->description, ['class' => 'form-control','placeholder'=>'description']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        {!! Form::label('gender', 'Gender', ['class' => 'h4']) !!}
                        <div class="block"></div>
                        {!! Form::radio('gender', 'Male', true) !!}Male
                        {!! Form::radio('gender', 'Female') !!}Female
                        {!! Form::radio('gender', 'Other') !!}Other
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        {!! Form::label('birthday', 'Birthday', ['class' => 'h4']) !!}
                        <div class="block"></div>
                        {!! Form::selectMonth('month',$user->month,['class'=>'select_month','placeholder' => 'Select Month']) !!}
                        {!! Form::selectRange('day', 1, 31,$user->day,['class'=>'select_day','placeholder' => 'Select Day']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        {!! Form::label('pet', 'My pet', ['class' => 'h4']) !!}
                        {!! Form::text('pet', $user->pet, ['class' => 'form-control','placeholder'=>'ex. cat,dog']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        {!! Form::label('relationship', 'Relationship status', ['class' => 'h4']) !!}
                        {!! Form::text('relationship', $user->relationship, ['class' => 'form-control','placeholder'=>'Single or Taken or ?']) !!}
                    </div>
                </div>


                <div class="form-group mt-5">
                    <div class="col-xs-12">
                        {!! Form::submit('Save', ['class' => 'btn save-profile']) !!}
                        {!! Form::reset('Reset', ['class' => 'btn reset-profile']) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
