@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading panel-heading-custom">{{ config($labels['index'] .'.panel') }}</div>
				@if(Session::has('message'))
					<p class="alert alert-success">{{ Session::get('message') }}</p>
				@endif
				<div class="panel-body">
					@include('partials.search')
					<p><a class="btn btn-info" href="{{ route( $routes['create'] ) }}" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> {{ config($labels['index'].'.create') }}</a></p>
					@include( $views['table'] )
					{!! $models->appends(\Request::only(['name']))->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>

{!! Form::open(['route'=>[$routes['delete'], ':_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}

@endsection

@section('scripts')

@include( $views['scripts'] )

@endsection