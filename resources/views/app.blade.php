<!DOCTYPE html>
<html>
<head>
	<title>Cropper</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
</head>
<body>
<div id="app">
	<div class="container">
		<div class="row ">
			<div class="col-lg-offsset-4 col-lg-4">
				@if (count($errors))
					@foreach ($errors->all() as $error)
						<span class="text-danger">{{ $error}}</span>
					@endforeach
				@endif
				<form action="{{ route('upload') }}" enctype="multipart/form-data" method="POST">
					@csrf
					<input type="file" class="btn btn-upload" name="image">
					<img src="/storage/IMG_20190214_094430709.jpg" alt="image" style=" height: 100px; width: 100px;">
					<input type="submit" class="btn btn-success" value="upload">
				</form>
				
			</div>
		</div>
	</div>
</div>
<script="{{ asset('js/app.js') }}"></script>
</body>
</html>