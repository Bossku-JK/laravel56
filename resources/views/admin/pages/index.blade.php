@extends('layouts.backend.backend') @section('content')


<div class="row clearfix">
	<div class="col-sm-12 col-xs-12">
		<div class="card" id="documenter_cover">
			<div class="header">
				<h2>Dashboard</h2>
			</div>
			<div class="body">
					<div class="card">
							<a class="btn  btn-raised btn-success waves-effect pull-right" href="{{ route('admin.pages.create') }}">เพิ่มข่าวใหม่</a>
						</div>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>title</th>
							<th>uri</th>
							<th>name</th>
							<td>Template</td>
							<th>การจัดการ</th>

						</tr>
					</thead>
					<tbody>
						@if($pages->isEmpty())

						<tr>
							<td colspan="5" align="center"> ไม่มีเพจ </td>
						</tr>

						@else @foreach($pages as $page)
						<tr @if ($page->hidden == 1) class="danger" @elseif ($page->hidden == 0) @endif>
							<td>
								<a href="{{ route('admin.pages.edit', $page->id) }}">{{ $page->title or 'ไม่มี' }}</a>
								{{-- {!! $page->linkToPaddedTitle(route('admin.pages.edit', $page->id)) !!} --}}

							</td>
							<td>

								<a href="{{ url($page->uri) }}"> {{ $page->uri }}</a>
							</td>
							<td>
								{{ $page->name or 'ไม่มี' }}
							</td>
							<td>
								{{ $page->template or 'ไม่มี' }}
							</td>
							<td>



								<a class="btn btn-info" href="{{ url($page->uri) }}">
									<i class="fa fa-eye" aria-hidden="true"></i> Show</a>

								<a class="btn btn-primary" href="{{ route('admin.pages.edit', $page->id) }}">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
								{{--
								<a class="btn btn-primary" href="{{ route('pages.destroy', $page->id) }}">Edit</a> --}} {{-- {!! Form::open(['method' => 'DELETE','route' => ['pages.destroy', $page->id],'style'=>'display:inline'])
								!!} {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} {!! Form::close() !!} --}} {!! Form::open(['method'
								=> 'DELETE','route' => ['admin.pages.destroy', $page->id],'style'=>'display:inline', 'class' => 'delete1']) !!} {{--
								{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}

								<button id="" class="btn btn-danger">
									<i class="fa fa-trash-o"></i>
									Delete
								</button>
								{!! Form::close() !!}

							</td>

						</tr>

					</tbody>
					@endforeach @endif
				</table>
			</div>
		</div>
	</div>
</div>
@endsection