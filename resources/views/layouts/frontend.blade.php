<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gongtham - @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
    crossorigin="anonymous"> -->
  <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
  <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
</script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
    body {
      min-height: 500px;
      /* padding-top: 77px; */
      font-family: 'Taviraj', serif;
    }

    .submenu {
      font-size: 80%;
      margin-top: -2px;

      /* margin-left:23px; */
    }

    .pdt {
      /* margin: 3px; */
      margin-top: 5px;

    }

    footer {

      background: black;
    }

    div.dropdown-lr {
      width: 350px;
    }

    /* mobile fix */

    @media (max-width: 768px) {
      .dropdown-lr h3 {
        color: #eee;
      }
      .dropdown-lr label {
        color: #eee;
      }
   
    }
    [v-cloak] > * { display:none; }
[v-cloak]::before { content: "กำลังโหลดข้อมูล..."; }
  </style>
</head>

<body>
<div id="app" v-cloak>

<b-navbar toggleable="md" type="light" variant="light">
<b-container>
  <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

   <b-navbar-brand href="#">
      <img src="{{asset('gongtham.png')}}" class="d-inline-block align-top" width="160" height="45" alt="BV">
      
    </b-navbar-brand>

  <b-collapse is-nav id="nav_collapse">

    <b-navbar-nav>
      <b-nav-item href="#"> <i class="fa fa-home"></i> Home
              <div class="submenu flex-column ml-lg-0 ml-3">หน้าแรก</div></b-nav-item>
     
             
        
              <!-- <b-nav-item-dropdown right>
      
        <template slot="button-content">
      
        <i class="fa fa-info"></i> About us
            <Br>
             <small class="submenu flex-column ml-lg-0 ml-3">เกี่ยวกับเรา</small>
        
             
        </template>
        <b-dropdown-item href="#">ประวัติ</b-dropdown-item>
        <b-dropdown-item href="#">ผู้บริหาร</b-dropdown-item>
        <b-dropdown-item href="#">คณะบริหาร</b-dropdown-item>
        <b-dropdown-item href="#">ทำเนียบผู้บริหาร</b-dropdown-item>
        <b-dropdown-item href="#">เจ้าหน้าที่สำนักงาน</b-dropdown-item>
      
      </b-nav-item-dropdown> -->

        <b-nav-item-dropdown right>
        <!-- Using button-content slot -->
        <template slot="button-content">
      
        <i class="fa fa-bullhorn"></i> Announces
            <Br>
             <small class="submenu flex-column ml-lg-0 ml-3">ประกาศต่างๆ</small>
        
             
        </template>
        <b-dropdown-item href="#">ประกาศสำนักงาน</b-dropdown-item>
        <b-dropdown-item href="#">ประกาศฝ่าย</b-dropdown-item>
   
      
      </b-nav-item-dropdown>

  </b-nav-item-dropdown>

<b-nav-item-dropdown right>
<!-- Using button-content slot -->
<template slot="button-content">

<i class="fa fa-book"></i> Statistics
    <Br>
     <small class="submenu flex-column ml-lg-0 ml-3">สถิติ</small>

     
</template>
<b-dropdown-item href="#">สถิติผู้สอบได้นักธรรม</b-dropdown-item>
<b-dropdown-item href="#">สถิติผู้สอบได้แต่ละภาค</b-dropdown-item>
<b-dropdown-item href="#">สถิติผู้สอบได้แต่ละจังหวัด</b-dropdown-item>
<b-dropdown-item href="#">สถิติผู้สอบได้แต่ละสนามสอบ</b-dropdown-item>
<b-dropdown-item href="#">สถิติผู้สอบได้แต่ละโรงเรียน</b-dropdown-item>


</b-nav-item-dropdown>

<b-nav-item-dropdown right>
<!-- Using button-content slot -->
<template slot="button-content">

<i class="fa fa-circle"></i> informations
    <Br>
     <small class="submenu flex-column ml-lg-0 ml-3">บริการข้อมูล</small>

     
</template>
<b-dropdown-item href="#">ผลสอบนักธรรม</b-dropdown-item>
<b-dropdown-item href="#">ผลสอบธรรมศึกษา</b-dropdown-item>
<b-dropdown-item href="#">ข้อมูลสนามสอบนักธรรม</b-dropdown-item>
<b-dropdown-item href="#">ข้อมูลสนามสอบธรรมศึกษา</b-dropdown-item>
<b-dropdown-item href="#">ข้อมูลสนามสอบส่วนกลาง</b-dropdown-item>
<b-dropdown-item href="#">ข้อมูลติดต่อพระสังฆาธิการทั่วประเทศ</b-dropdown-item>
<b-dropdown-item href="#">ข้อมูลสนามสอบส่วนกลาง</b-dropdown-item>
<b-dropdown-item href="#">ข้อมูลติดต่อพระสังฆาธิการทั่วประเทศ</b-dropdown-item>
<b-dropdown-item href="#">ข้อมูลวัดทั่วประเทศ</b-dropdown-item>
<b-dropdown-item href="{{route('editpass.index')}}"><i class="fa fa-edit"></i> ขอแก้ไขข้อมูล(นธ-ธศ)</a></b-dropdown-item>


</b-nav-item-dropdown>
<b-nav-item href="#"> <i class="fa fa-download"></i> Downloads
              <div class="submenu flex-column ml-lg-0 ml-3">ดาวน์โหลด</div></b-nav-item>
              <b-nav-item href="#"> <i class="fa fa-phone"></i> Contacts
              <div class="submenu flex-column ml-lg-0 ml-3">ติดต่อเรา</div></b-nav-item>



    </b-navbar-nav>
    <b-navbar-nav class="ml-auto">
 
      @guest

   
            <b-button href="{{url('login')}}" size="lg" variant="primary">เข้าสู่ระบบ</b-button>

         
          @else
          <div>
  <b-dropdown id="ddown-header" text=" {{str_limit(Auth::user()->profile->name, 12, '')}}" class="m-2" variant="primary" size="lg">
  @auth
    <b-dropdown-header> การจัดการ</b-dropdown-header>
    @endauth
    <b-dropdown-item href="{{ route('admin.')}}"> <i class="fa fa-dashboard"></i>
                <span class="title">จัดการข้อมูล</span></b-dropdown-item>
    <b-dropdown-item> <i class="fa fa-arrow-user-info"></i>
                <span class="title">ข้อมูลส่วนตัว {{ Auth::user()->profile->name }}</span></b-dropdown-item>
    <b-dropdown-item onclick="$('#logout').submit();"><i class="fa fa-arrow-left"></i>
                <span class="title">@lang('global.app_logout')</span></b-dropdown-item>
                {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
              <button type="submit">@lang('global.logout')</button>
              {!! Form::close() !!}
  </b-dropdown>
</div>
       

          @endguest
    
  </b-collapse>
  </b-container>
</b-navbar>
<b-container>
<div>
@yield('content')
</div>
      <card-frontend></card-frontend>
      </b-container>
</div>
<!-- navbar-1.vue -->
  
 


    


   
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
    </script>
    <script src="{{ asset('js/app.js') }}
    "></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
      crossorigin="anonymous"></script>

</body>

</html>