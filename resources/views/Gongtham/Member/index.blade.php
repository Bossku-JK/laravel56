@extends('layouts.frontend')

@section('title', 'ระบบสมาชิก')

{{--  @section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop  --}}

@section('content')
   <h3 style="margin-top:20px;" class="text-center">เจ้าหน้าสำนักงานแม่กองธรรมสนามหลวง </h3>
   <div class="table-responsive">
       <table class="table table-hover table-bordered">
           <thead>
               <tr>
                   <th>ลำดับ</th>
                   <th>ชื่อ-ฉายา</th>
                   <th>ตำแหน่ง</th>
                   <th>วัด</th>
               </tr>
           </thead>
           <tbody>
                @foreach($member as $key => $members) 
               <tr>
           

                   <td> 
                       {{    $member->firstItem() + $key /* functions running numbers for   when changed pagination number running as before ex: 1 2 3  page 1  4 5 6 page 2  */ 
                         }}
                        </td>
                   <td> {{$members->name}}</td>
                   <td> {{$members->position}}</td>
                   <td> {{$members->wat or " "}}</td>
        
               </tr>
               @endforeach  
           </tbody>
       </table>
     <div class="text-center">{{ $member->render() }}</div>  
   </div>

<h3>  
        จำแนกตามฝ่ายดังนี้ </h3>
        
        <div class="row">
            
       
<div class="table-responsive">

    
        @foreach($genera as $key => $children1) 
        <div class="card " style="margin-top:25px;">
                <div class="card-header">
                  @if($key == 0)  
                  ฝ่ายปฏิคม
                  @elseif($key == 1)
                  ฝ่ายบริหารทั่วไป
                  @elseif($key == 2)
                  ฝ่ายวิชาการ
                  @elseif($key == 3)
                  ฝ่ายวิเทศสัมพันธ์
                  @elseif($key == 4)
                  ฝ่ายนโยบายและแผน
                  @elseif($key == 5)
                  ฝ่ายสถิติ
                  @elseif($key == 6)
                  ฝ่ายประชาสัมพันธ์
                  @elseif($key == 7)
                  ฝ่ายธุรการ
                  @elseif($key == 8)
                  ฝ่ายสารสนเทศ
                  @elseif($key == 9)
                  ฝ่ายเจ้าหน้าที่ทั่วไป
                  @endif
                </div>
                <div class="card-block">
                  <!-- <h4 class="card-title">Special title treatment</h4> -->
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ชื่อ-ฉายา</th>
                                        <th>ตำแหน่ง</th>
                                        <th>รูปภาพ</th>
                                    </tr>
                                </thead>
                                <tbody
                                    <tr>
                                        <td>{{$children1->name}}  </td>
                                        <td>{{$children1->position}}</td>
                                        <td width="25%"> <img src="{{ asset('sample.jpg') }}" alt="" width="100%"> </td>
                                    </tr>
                                    @if($children1->children)
                                    @foreach($children1->children as $childrened)
                                    <tr>
                                        <td>{{$childrened->name}} </td>
                                        <td>{{$childrened->position}}</td>
                                        <td width="25%"> <img src="{{ asset('sample.jpg') }}" alt="" width="100%"> </td>
                                    </tr>
                                    @endforeach  
                                    @endif
                                    @if($childrened->children)
                                    @foreach($childrened->children as $childrene2) 
                                    <tr>
                                        <td width="43%"> {{$childrene2->name}}</td>
                                        <td>{{$childrene2->position}}</td>
                                        <td width="25%"> <img src="{{ asset('sample.jpg') }}" alt="" width="100%"> </td>
                                    </tr>
                                    @endforeach  
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                </div>
                <div class="card-footer text-muted">
                 อัปเดทล่าสุด 2 days ago
                </div>
              </div>
    
          @endforeach  
   
</div>

</div>
@stop