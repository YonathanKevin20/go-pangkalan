@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
			<div class="col-md-8">
				<app :client-id="{{ Auth::user()->id }}"></app>
			</div>
	</div>
</div>
@endsection