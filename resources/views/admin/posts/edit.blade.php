@extends('layouts.backend.backend') @section('title', 'แก้ไขข่าว') @section('title2', 'ข่าวสาร') @section('css') @stop
@section('content')
<div class="row clearfix">
	<div class="col-sm-12 col-xs-12">
		<div class="card" id="documenter_cover">
			<div class="header">
				<h2>เพิ่มข่าวสารใหม่</h2>
			</div>
		
					{!! Form::model($post, ['method' => 'PATCH','route' => ['admin.posts.update', $post->id], 'files' => true]) !!}
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="body">
				<?php $uri = Request::root() ?> {{--
				<posts-create :uri="{{json_encode($uri)}}"></posts-create> --}}
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>แจ้งเตือน!</strong> คุณกรอกข้อมูลไม่ครบหรือไม่ตรงตามรายชื่อด้านล่าง.
					<br>
					<br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif 
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<div class="demo-masked-input">
						<div class="row clearfix">
							<div class="col-md-12">
								<b>ชื่อเรื่อง-Title</b>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">subtitles</i>
									</span>
									<div class="form-line">
										<input type="text" name="title" class="form-control input-lg" placeholder="ตัวอย่าง : งานกิจกรรมสำคัญ" id="title" value="{{ old('title', $post->title) }}" required>
									
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<b>ลิงค์ข่าว-Slug</b>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">link</i></span>
									<div class="form-line">
										<input type="text" name="slug" class="form-control input-lg" placeholder="ชื่อลิงค์จะยึดตามชื่อเรื่อง" id="permalink" value="{{ old('title', $post->slug) }}" required>
									</div>
									<!-- <div class="help-info">Starts with http://, https://, ftp:// etc</div> -->
								</div>
							</div>
							<div class="col-md-6">
								<b>สถานะข่าว</b>
								<br>

								<input type="checkbox" id="checkbox" name="active" value="0"   @if(old('active',$post->active))
								checked
							@endif>
								
								<label for="checkbox">แสดงข่าว</label>

							</div>

							<div class="col-md-6">
								<b>ประเภทข่าว</b>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">category</i>
									</span>
								
									{!! Form::select('category_id',[''=>'---เลือกประเภทข่าว ---']+$category->toArray(),$post->category_id,array('class'=>'form-control')) !!}
								
									
								</div>
							</div>
							<div class="col-md-12">
								<b>หัวข้อข่าวย่อ...</b>

								<textarea id="my-editor" name="summary" class="form-control" rows="5">{!! old('summary' , $post->summary) !!}</textarea>

							</div>
							<div class="col-md-12" style="margin-top: 30px; margin-bottom: 30px;">
								<b>เนื้อหาข่าว...</b>

								<textarea id="my-editor1" name="content" class="form-control">{!! old('content' , $post->content) !!}</textarea>

							</div>
						</div>

					</div>


				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<div class="demo-masked-input">
						<div class="row clearfix">
							<div class="col-md-12">
								<b>รูปภาพหลัก</b>

								<div class="form-line">
									<div class="form-group">
										<label for="exampleInputFile">คลิกที่รูปภาพ</label>
										<br>
										<div class="text-center">
												@if($post->image) 
												<img id="blah" src=" {{ asset('images/posts/'. $post->image) }} " alt="your image" width="350" class="img-thumbnail " />
											
												@else
												<img id="blah" src=" {{ asset('images/demo.jpg') }} " alt="your image" width="350" class="img-thumbnail " />
												@endif
										</div>
										<input type="file" class="form-control-file" id="imgInp" aria-describedby="fileHelp" name="image">
										<br>
										<small id="fileHelp" class="form-text text-muted text-center">รองรับขนาดรูปภาพไม่เกิน 10MB ชนิดไฟล์ JPG,PNG</small>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12" style="margin-bottom: 10px">
							<b>แท็ก-Tags</b>
							<br>

							{!! Form::select('tags[]', $tags,$post->tags, array('class' => 'js-example-basic-multiple','multiple','style="width: 100%"'))!!}
						
						</div>

						<div class="col-md-12">
							<b>การจัดการ</b>
							<br>

							<button type="submit" class="btn type= btn-raised btn-info waves-effect btn-block">บันทึกข้อมูล</button>


						</div>

						<div class="col-md-12">
							<a href="{{route('admin.posts.index')}}" class="btn type= btn-raised btn-danger waves-effect btn-block">ยกเลิก</a>
						</div>
						{!! Form::close() !!}

					</div>

				</div>


			</div>
		</div>
	</div>
</div>



@endsection @section('js')
<!-- Latest compiled and minified JavaScript -->
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script> --}}

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script>
	$(document).ready(function () {
		$('.js-example-basic-multiple').select2();
	});


	var options = {
		filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
		filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
		filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
		filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
	};

	CKEDITOR.replace('my-editor1', options, {
		language: 'th',
		uiColor: '#656565',
		toolbar: [{
				name: 'document',
				items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']
			},
			{
				name: 'clipboard',
				items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
			},
			{
				name: 'editing',
				items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']
			},

			'/',
			{
				name: 'basicstyles',
				items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting',
					'RemoveFormat'
				]
			},
			{
				name: 'paragraph',
				items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-',
					'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language'
				]
			},
			{
				name: 'links',
				items: ['Link', 'Unlink', 'Anchor']
			},
			{
				name: 'insert',
				items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe']
			},
			'/',
			{
				name: 'styles',
				items: ['Styles', 'Format', 'Font', 'FontSize']
			},
			{
				name: 'colors',
				items: ['TextColor', 'BGColor']
			},
			{
				name: 'tools',
				items: ['Maximize', 'ShowBlocks']
			},
			{
				name: 'about',
				items: ['About']
			}
		]


	});

	CKEDITOR.replace('my-editor', {
		toolbar: [
			['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
			['FontSize', 'TextColor', 'BGColor']
		]
	});

	function removeAccents(str) {
		var accent = [
			/[\300-\306]/g, /[\340-\346]/g, // A, a
			/[\310-\313]/g, /[\350-\353]/g, // E, e
			/[\314-\317]/g, /[\354-\357]/g, // I, i
			/[\322-\330]/g, /[\362-\370]/g, // O, o
			/[\331-\334]/g, /[\371-\374]/g, // U, u
			/[\321]/g, /[\361]/g, // N, n
			/[\307]/g, /[\347]/g // C, c
		];
		var noaccent = ['A', 'a', 'E', 'e', 'I', 'i', 'O', 'o', 'U', 'u', 'N', 'n', 'C', 'c'];
		for (var i = 0; i < accent.length; ++i) {
			str = str.replace(accent[i], noaccent[i]);
		}
		return str;
	}
	$("#title").keyup(function () {
		var str = removeAccents($(this).val())
			.replace(/[^a-zA-Z0-9\sก-๙]/g, "")
			.toLowerCase()
			.replace(/\s/g, '-');
		$("#permalink").val(str);
	});

	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function () {
		readURL(this);
	});
</script>

@stop