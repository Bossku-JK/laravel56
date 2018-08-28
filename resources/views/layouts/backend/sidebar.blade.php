<!--Side menu and right menu -->
@inject('request', 'Illuminate\Http\Request')

<section> 
	<!-- Left Sidebar -->
	<aside id="leftsidebar" class="sidebar"> 
		<!-- Menu -->
		<div class="menu">			
			<ul class="list" id="documenter_nav">
				<li> 
					<!-- User Info -->
					<div class="user-info">
						<div class="admin-image"> <img src="{{ asset('assets/images/sm/avatar3.jpg')}}" alt="profile img"> </div>
						<div class="admin-action-info"> <span>ยินดีตอนรับ</span>
							<h3>{{ str_limit(Auth::user()->profile->name,22,' ') }}</h3>
							<ul>
								<li><a data-placement="bottom" title="Go to Inbox" href="#"><i class="zmdi zmdi-email"></i></a></li>
								<li><a data-placement="bottom" title="Go to Profile" href="#"><i class="zmdi zmdi-account"></i></a></li>
								<li><a data-placement="bottom" title="Full Screen" href="#" ><i class="zmdi zmdi-sign-in"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- #User Info --> 
				</li>
				<li class="header">เมนูหลัก</li>
				<li class=" "><a href="{{ route('admin.')}}"><i class="zmdi zmdi-arrow-right"></i><span>หน้าแรก</span></a></li>
				<li class=" "><a href="{{ url('admin/inbox')}}"><i class="zmdi zmdi-arrow-right"></i><span>Chat</span></a></li>
				<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-list"></i><span>ผู้ใช้</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="{{ route('admin.users.index')}}">ผู้ใช้ทั้งหมด</a> </li>
                        <li> <a href="{{ route('admin.users.create')}}">เพิ่มผู้ใช้</a> </li>
                        <li> <a href="{{ route('admin.roles.index')}}">บทบาททั้งหมด</a> </li>
                        <li> <a href="{{ route('admin.roles.create')}}">เพิ่มบทบาท</a> </li>
                        <li> <a href="{{ route('admin.permissions.index')}}">สิทธิ์เข้าถึงทั้งหมด</a> </li>
                        <li> <a href="{{ route('admin.permissions.create')}}">เพิ่มสิทธิ์</a> </li>
                        <li> <a href="{{ route('staff.index')}}">เจ้าหน้าที่สำนักงาน</a> </li>
            
                    </ul>
                </li>
		
				<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-list"></i><span>หน้าเว็บเพจ</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="{{ route('admin.pages.index')}}">หน้าเว็บเพจทั้งหมด</a> </li>
                        <li> <a href="{{ route('admin.pages.create')}}">เพิ่มหน้าเว็บเพจ</a> </li>
                        <li> <a href="forgot-password.html">จัดการเมนู</a> </li>
                        <li> <a href="404.html">เพิ่มเมนู</a> </li>
                
                     
            
                    </ul>
                </li>
				<li class="{{ $request->segment(2) == 'posts' ? 'active open active-sub' : '' }}"> <a href="javascript:void(0);" class="menu-toggle "><i class="zmdi zmdi-accounts-list"></i><span>ข่าวสาร</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="{{ route('admin.posts.index')}}">ข่าวสารทั้งหมด</a> </li>
                        <li class="{{ $request->segment(3) == 'create' ? 'active active-sub' : '' }}"> <a href="{{ route('admin.posts.create')}}"> เพิ่มข่าวสาร</a> </li>
                        <li class=""> <a href="forgot-password.html">ประเภทข่าวทั้งหมด</a> </li>
                        <li> <a href="404.html">เพิ่มประเภทข่าว</a> </li>
                        <li> <a href="500.html">แท๊กทั้งหมด</a> </li>
                        <li> <a href="page-offline.html">เพิ่มแท๊กทั้งหมด</a> </li>
                     
            
                    </ul>
				</li>
				<li class="{{ $request->segment(2) == 'posts' ? 'active open active-sub' : '' }}"> <a href="javascript:void(0);" class="menu-toggle "><i class="zmdi zmdi-accounts-list"></i><span>ตั้งค่า</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="{{ route('admin.posts.index')}}">ข่าวสารทั้งหมด</a> </li>
                        <li class="{{ $request->segment(3) == 'create' ? 'active active-sub' : '' }}"> <a href="{{ route('admin.posts.create')}}">ชื่อเว็บ Logo</a> </li>
                        <li class=""> <a href="forgot-password.html">ประเภทข่าวทั้งหมด</a> </li>
                        <li> <a href="404.html">เพิ่มประเภทข่าว</a> </li>
                        <li> <a href="500.html">แท๊กทั้งหมด</a> </li>
                        <li> <a href="page-offline.html">เพิ่มแท๊กทั้งหมด</a> </li>
                     
            
                    </ul>
                </li>
		
				<li class="header">กองธรรมส่วนกลาง</li>
				<li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-red"></i><span>แก้ไข(ธรรมศึกษา-นักธรรม)</span> </a> </li>
				<li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-amber"></i><span>ข้อมูลโรงเรียน</span> </a> </li>
				<li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-blue"></i><span>ข้อมูลวัด</span> </a> </li>
				<li> <a href="javascript:void(0);"><i class="zmdi zmdi-chart-donut col-blue"></i><span>ข้อมูลติดต่อ</span> </a> </li>
		

			</ul>
		</div>
		<!-- #Menu --> 
	</aside>
	<!-- #END# Left Sidebar --> 
	<!-- Right Sidebar -->
	<aside id="rightsidebar" class="right-sidebar">
		<ul class="nav nav-tabs tab-nav-right" role="tablist">
			<li role="presentation" class="active"><a href="#settings" data-toggle="tab">Setting</a></li>
			<li role="presentation"><a href="#chat" data-toggle="tab">Chat</a></li>
			<li role="presentation"><a href="#activities" data-toggle="tab">Activities</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="settings">
				<div class="slim-scroll">
					<div class="card">
						<div class="header">
							<h2>Color OPTIONS</h2>
						</div>
						<div class="body" >
							<ul class="choose-skin m-b-0">
								<li data-theme="purple" class="active">
									<div class="purple"></div>
								</li>
								<li data-theme="blue">
									<div class="blue"></div>
								</li>
								<li data-theme="cyan">
									<div class="cyan"></div>
								</li>
								<li data-theme="green">
									<div class="green"></div>
								</li>
								<li data-theme="blush">
									<div class="blush"></div>
								</li>
							</ul>
							<ul class="list-unstyled m-b-0 theme-light-dark m-t-15">
								<li>
									<div class="t-dark">โหมดมืด</div>
								</li>
								<li>
									<div class="t-light">โหมดสว่าง</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="card">
						<div class="header">
							<h2>GENERAL SETTINGS</h2>
						</div>
						<div class="body" >
							<ul class="setting-list">
								<li> <span>Report Panel Usage</span>
									<div class="switch">
										<label>
											<input type="checkbox" checked>
											<span class="lever"></span></label>
									</div>
								</li>
								<li> <span>Email Redirect</span>
									<div class="switch">
										<label>
											<input type="checkbox">
											<span class="lever"></span></label>
									</div>
								</li>
								<li> <span>Notifications</span>
									<div class="switch">
										<label>
											<input type="checkbox" checked>
											<span class="lever"></span></label>
									</div>
								</li>
								<li> <span>Auto Updates</span>
									<div class="switch">
										<label>
											<input type="checkbox" checked>
											<span class="lever"></span></label>
									</div>
								</li>
								<li> <span>Offline</span>
									<div class="switch">
										<label>
											<input type="checkbox">
											<span class="lever"></span></label>
									</div>
								</li>
								<li> <span>Location Permission</span>
									<div class="switch">
										<label>
											<input type="checkbox" checked>
											<span class="lever"></span></label>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="chat">
				<div class="slim-scroll">
					<div class="m-t-15 m-l-15 m-r-15">
						<div class="search">
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" placeholder="Search..." required autofocus>
								</div>
							</div>
						</div>
						<h6>Online</h6>
						<ul>
							<li class="online">
								<div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/xs/avatar1.jpg" alt=""> </a>
									<div class="media-body"> <span class="name">Claire Sassu</span> <span class="message">Can you share the simply dummy text</span> <span class="badge badge-outline status"></span> </div>
								</div>
							</li>
							<li class="online">
								<div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/xs/avatar2.jpg" alt=""> </a>
									<div class="media-body">
										<div class="media-body"> <span class="name">Maggie jackson</span> <span class="message">Can you share the simply dummy text</span> <span class="badge badge-outline status"></span> </div>
									</div>
								</div>
							</li>
							<li class="online">
								<div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/xs/avatar3.jpg" alt=""> </a>
									<div class="media-body">
										<div class="media-body"> <span class="name">Joel King</span> <span class="message">Ready for the meeti simply dummy text</span> <span class="badge badge-outline status"></span> </div>
									</div>
								</div>
							</li>
							<li class="online">
								<div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/xs/avatar1.jpg" alt=""> </a>
									<div class="media-body"> <span class="name">Claire Sassu</span> <span class="message">Can you share the simply dummy text</span> <span class="badge badge-outline status"></span> </div>
								</div>
							</li>
							<li class="online">
								<div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/xs/avatar2.jpg" alt=""> </a>
									<div class="media-body">
										<div class="media-body"> <span class="name">Maggie jackson</span> <span class="message">Can you share the simply dummy text</span> <span class="badge badge-outline status"></span> </div>
									</div>
								</div>
							</li>
							<li class="online">
								<div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/xs/avatar3.jpg" alt=""> </a>
									<div class="media-body">
										<div class="media-body"> <span class="name">Joel King</span> <span class="message">Ready for the meeti simply dummy text</span> <span class="badge badge-outline status"></span> </div>
									</div>
								</div>
							</li>
						</ul>
						<h6>Offline</h6>
						<ul>
							<li class="offline">
								<div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/xs/avatar4.jpg" alt=""> </a>
									<div class="media-body"> <span class="name">Claire Sassu</span> <span class="message">Can you share the simply dummy text</span> <span class="badge badge-outline status"></span> </div>
								</div>
							</li>
							<li class="offline">
								<div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/xs/avatar2.jpg" alt=""> </a>
									<div class="media-body">
										<div class="media-body"> <span class="name">Maggie jackson</span> <span class="message">Can you share the you share the</span> <span class="badge badge-outline status"></span> </div>
									</div>
								</div>
							</li>
							<li class="offline">
								<div class="media"> <a class="pull-left" role="button" tabindex="0"> <img class="media-object " src="assets/images/xs/avatar1.jpg" alt=""> </a>
									<div class="media-body">
										<div class="media-body"> <span class="name">Joel King</span> <span class="message">Ready for the meeti</span> <span class="badge badge-outline status"></span> </div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade activities" id="activities">
				<div class="slim-scroll">
					<div class="m-t-15 m-l-15 m-r-15">
						<div class="streamline b-accent">
							<div class="sl-item">
								<div class="sl-content">
									<div class="text-muted">Just now</div>
									<p>Finished task <a href="" class="text-info">#features 4</a>.</p>
								</div>
							</div>
							<div class="sl-item b-info">
								<div class="sl-content">
									<div class="text-muted">10:30</div>
									<p><a href="">@Jessi</a> retwit your post</p>
								</div>
							</div>
							<div class="sl-item b-primary">
								<div class="sl-content">
									<div class="text-muted">12:30</div>
									<p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
								</div>
							</div>
							<div class="sl-item b-warning">
								<div class="sl-content">
									<div class="text-muted">1 days ago</div>
									<p><a href="" class="text-info">Jessi</a> commented your post.</p>
								</div>
							</div>
							<div class="sl-item b-primary">
								<div class="sl-content">
									<div class="text-muted">2 days ago</div>
									<p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
								</div>
							</div>
							<div class="sl-item b-primary">
								<div class="sl-content">
									<div class="text-muted">3 days ago</div>
									<p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
								</div>
							</div>
							<div class="sl-item b-warning">
								<div class="sl-content">
									<div class="text-muted">4 Week ago</div>
									<p><a href="" class="text-info">Jessi</a> commented your post.</p>
								</div>
							</div>
							<div class="sl-item b-warning">
								<div class="sl-content">
									<div class="text-muted">5 days ago</div>
									<p><a href="" class="text-info">Jessi</a> commented your post.</p>
								</div>
							</div>
							<div class="sl-item b-primary">
								<div class="sl-content">
									<div class="text-muted">5 Week ago</div>
									<p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
								</div>
							</div>
							<div class="sl-item b-primary">
								<div class="sl-content">
									<div class="text-muted">3 Week ago</div>
									<p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
								</div>
							</div>
							<div class="sl-item b-warning">
								<div class="sl-content">
									<div class="text-muted">1 Month ago</div>
									<p><a href="" class="text-info">Jessi</a> commented your post.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</aside>
	<!-- #END# Right Sidebar --> 
</section>
