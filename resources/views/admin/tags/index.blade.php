@extends('layouts.backend.backend')

@section('content')

             
                <div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="header">
										{{-- <h2> BOOTSTRAP DEFAULT BUTTONS <small>Use any of the available button classes to quickly create a styled button</small> </h2> --}}
									
									</div>
									<div class="body">
											<div class="pull-right">
								
													<a class="btn btn-success" href="{{ route('admin.users.index') }}"> จัดการผู้ใช้</a>
													  <a class="btn btn-success" href="{{ route('admin.pages.index') }}"> จัดการเพจ</a>
															<a class="btn btn-success" href="{{ route('admin.posts.index') }}"> จัดการบล็อค</a>
									
												
												</div>
				
												@if (count($errors) > 0)
												<div class="alert alert-danger">
													<strong>แจ้งเตือน!</strong> คุณกรอกข้อมูลไม่ครบหรือไม่ตรงตามรายชื่อด้านล่าง.<br><br>
													<ul>
														@foreach ($errors->all() as $error)
															<li>{{ $error }}</li>
														@endforeach
													</ul>
												</div>
											@endif
										
											{!! Form::open(array('route' => 'admin.tags.store','method'=>'POST')) !!}
											<div class="row">
													<div class="col-md-6  col-sm-12" > <h2 class="text-center">สร้างTag</h2>
														<div class="input-group"> <span class="input-group-addon"> <i class="material-icons">date_range</i> </span>
															<div class="form-line">
																<input type="tag" class="form-control ip" placeholder="Ex: แท๊กข้อมูล">
															</div>
															
														</div>
														<div class="text-center"><button type="submit" class="btn  btn-raised bg-pink btn-block btn-sm waves-effect">สร้างTag</button></div>
														
													</div>
					
											</div>
											{!! Form::close() !!}
									</div>
								</div>
							</div>
			<div class="col-sm-12 col-xs-12">
				<div class="card" id="documenter_cover">
					<div class="header">
						<h2>จัดการข้อมูลแท็ก</h2>
					</div>
					<div class="body">
						
						
						<br />
							<table class="table table-bordered">
							  <thead>
								<tr>
									  <th>ลำดับ</th>
									<th>tag</th>
									<th>tag in Post </th>
									<th>create</th>
									<th>action</th>
						
								</tr>
								</thead>
								<tbody>
								@if($Tags->isEmpty())
						
								<tr>
									<td colspan="5" align="center"> ไม่มี Tags </td>
								</tr>
						
									@else
								@foreach($Tags as $test => $Tag)
									<tr>
									  <td>
						
										{{ $Tags->firstItem() + $test }}
									  </td>
										<td>
											<a href="{{ route('admin.tags.edit', $Tag->id) }}">{{ $Tag->tag or 'ไม่มี' }}</a>
										</td>
						<td>
						
						
							   {{ $Tag->posts->count() }}
						
						
						</td>
										<td>
											{{ $Tag->created_at or 'ไม่มี' }}
										</td>
						
										<td>
										  <a class="btn btn-info" href="{{ route('admin.tags.show', $Tag->tag) }}"><i class="fa fa-eye" aria-hidden="true"></i> Show</a>
										  <a class="btn btn-primary" href="{{ route('admin.tags.edit', $Tag->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
										  {{-- <a class="btn btn-primary" href="{{ route('admin.tags.destroy', $Tag->id) }}">Edit</a> --}}
										  {{-- {!! Form::open(['method' => 'DELETE','route' => ['admin.tags.destroy', $Tag->id],'style'=>'display:inline']) !!}
										  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
										  {!! Form::close() !!} --}}
						
										  {!! Form::open(['method' => 'DELETE','route' => ['admin.tags.destroy', $Tag->id],'style'=>'display:inline', 'class' => 'delete', 'id' => 'delete1']) !!}
										   {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
						
										  <button id="" class="btn btn-danger">
											<i class="fa fa-trash-o"></i>
											 Delete
										   </button>
							{!! Form::close() !!}
										</td>
									</tr>
						
								</tbody>
								@endforeach
								@endif
							</table>

						  {!! $Tags->render() !!}
						
						
						
						
						
						
						  @if (session()->has('success'))
							   <script>     swal({         title: "<?php echo session()->get('success'); ?>",
								   text: "ผลการทํางาน",
								   timer: 3000,
								   type: 'success',
								   showConfirmButton: false
								}); </script>
						 @endif
					</div>
				</div>
			</div>
		</div>	
@endsection
