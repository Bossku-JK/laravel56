@inject('request', 'Illuminate\Http\Request')
@extends('layouts.backend.backend')
@section('title', 'จัดการเจ้าหน้าที่สำนักงาน')
@section('content')
    {{-- <h3 class="page-title">@lang('global.users.title')</h3> --}}
    <p>
        {{--  <a href="{{ route('admin.users.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>  --}}
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
         รายชื่อ
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} " >
                <thead>
                    <tr>
                      

                        <th>ชื่อ</th>
                        <th>ฝ่าย</th>
                        <th>วัด</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr data-entry-id="{{ $user->id }}">
                            
                             
                                
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->position }}</td>
                                <td>{{ $user->wat }}</td>
                                <td>{{ $user->telephone }}</td>
                                <td>
                                    <a href="{{ route('admin.users_gongtham.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">ไม่พบข้อมูล</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        

        {{--  window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';  --}}
    </script>
@endsection