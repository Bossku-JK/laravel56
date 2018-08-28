@inject('request', 'Illuminate\Http\Request') @extends('layouts.backend.backend') @section('title', 'จัดการข้อมูลข่าวสาร')
@section('content')



<div class="row clearfix">
    <div class="col-sm-12 col-xs-12">
        <div class="card" id="documenter_cover">
            <div class="header">
                <h2>รายการข่าว</h2>
            </div>
            <div class="body">
                @if (Auth::guest())

                <p class="mt-5">Cheatn?, please
                    <a href="/login/">login</a> to continue.</p>

                @else
                <div class="card">
                    <a class="btn  btn-raised btn-success waves-effect pull-right" href="{{ route('admin.posts.create') }}">เพิ่มข่าวใหม่</a>
                </div>
<div class="table-responsive">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>title</th>
                            <th>slug</th>
                            <th>ผู้สร้าง</th>
                            <th>เปิดเผย/ไม่เปิดเผย</th>
                            <th>ประเภท</th>
                            <th>วันที่สร้าง</th>

                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($posts->isEmpty())

                        <tr>
                            <td colspan="8" align="center"> ไม่มีเพจ </td>
                        </tr>

                        @else @foreach($posts as $test => $Post)
                        <tr >
                            <td>
                                {{ $posts->firstItem() + $test }}
                            </td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $Post->id) }}">{{ $Post->title or 'ไม่มี' }}</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.posts.show', $Post->slug) }}"> {{ 'backend/post/'.ltrim($Post->slug, '/') }}</a>
                            </td>
                            {{--
                            <td>
                                {{ $Post->summary or 'ไม่มี' }}
                            </td>
                            <td>
                                {{ $Post->content or 'ไม่มี' }}
                            </td> --}}
                            <td>
                                {{ $Post->user->name or 'ไม่มี' }}
                            </td>
                            <td @if ($Post->active == 0) class="danger" @elseif ($Post->active == 1) @endif>

                                @if ($Post->active == 1) เปิดเผย @elseif ($Post->active == 0) ไม่เปิดเผย @endif


                            </td>
                            <td>
                                {{ $Post->Category->name or 'ไม่มี' }}
                            </td>


                            <td>
                                {{ $Post->created_at or 'ไม่มี' }}
                            </td>

                            <td>

                                <a class="btn btn-sm btn-raised btn-primary waves-effect" href="{{ route('admin.posts.show',$Post->slug) }}">
                                    Show</a>
                               
                                <a class="btn btn-sm  btn-raised btn-info waves-effect" href="{{ route('admin.posts.edit',$Post->id) }}">
                                   Edit</a>
                                {{--
                                <a id="delete-btn" class="btn btn-danger" href="{{ route('Post.destroy',$Post->id) }}">Delete</a> --}}
                                 {!! Form::open(['method' => 'DELETE','route'
                                => ['admin.posts.destroy', $Post->id],'style'=>'display:inline', 'class' => 'delete', 'id' => 'delete1'])
                                !!} {!! Form::hidden('id', $Post->id, ['class' => 'form-control']) !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" /> {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                                <button class="btn btn-sm  btn-raised btn-danger waves-effect" type="submit" onclick="archiveFunction()">
                                
                                    Delete
                                </button>
                                {!! Form::close() !!} 





                            </td>


                        </tr>

                    </tbody>
                    @endforeach @endif
                </table>
            </div>
                <div class="text-center">
                        {!! $posts->render() !!}
                </div>
              
            </div>


            @endif
        </div>
    </div>
</div>



@endsection


@section('js')
<script>
    function archiveFunction() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "แน่ใจแล้วใช่ไหม?",
  text: "ลบแล้วลบเลยน่ะ.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "ใช่, ลบเลย!",
  cancelButtonText: "ไม่, ไม่ลบแล้ว!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("ยกเลิก", "ยังเก็บรักษาไว้อยู่ :)", "error");
  }
});
}
    </script>

@endsection