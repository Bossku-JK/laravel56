@extends('layouts.backend.backend')

@section('content')

             

        <div class="row clearfix">
		<div class="col-sm-12 col-xs-12">
				<div class="card" id="documenter_cover">
                <div class="people-list">
                    <div class="search clearfix">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </div>
                        <button class="btn btn-sm btn-default float-right hidden-md-up visible-xs" data-toggle="collapse" data-target="#open-chats" aria-expanded="false" aria-controls="collapseExample"><i class="zmdi zmdi-chevron-down"></i></button>
                    </div>
                    <div class="body collapse-xs" id="open-chats"> 
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#people">People</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#groups">Groups</a></li> -->
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active in" id="people">
                                <ul class="chat-list">
                                    <li class="clearfix ">
                                        <img src="assets/images/random-avatar1.jpg" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Will Porter</div>
                                            <div class="status"> <i class="zmdi zmdi-circle online"></i> online </div>
                                        </div>
                                    </li>
                                    <li class="clearfix ">
                                        <img src="assets/images/random-avatar2.jpg" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Aiden Chavez</div>
                                            <div class="status"> <i class="zmdi zmdi-circle offline"></i> left 7 mins ago </div>
                                        </div>
                                    </li>
                                    <li class="clearfix ">
                                        <img src="assets/images/random-avatar3.jpg" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Mike Thomas</div>
                                            <div class="status"> <i class="zmdi zmdi-circle online"></i> online </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!-- <div role="tabpanel" class="tab-pane" id="groups">
                                <ul class="chat-list">
                                    <li class="clearfix ">
                                        <img src="assets/images/random-avatar6.jpg" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Sr. Doctor</div>
                                            <div class="status">5 People </div>
                                        </div>
                                    </li>
                                    <li class="clearfix " >
                                        <img src="assets/images/random-avatar7.jpg" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Nursing Staf</div>
                                            <div class="status">13 People </div>
                                        </div>
                                    </li>
                                    <li class="clearfix " >
                                        <img src="assets/images/random-avatar8.jpg" alt="avatar" />
                                        <div class="about">
                                            <div class="name">Groups 2</div>
                                            <div class="status">25 People </div>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="chat" style="background-color: #f9eaea;">
                    <div class="chat-header clearfix" style="background-color: #a5f34b;"> <img src="assets/images/random-avatar1.jpg" alt="avatar" />
                        <div class="chat-about">
                            <div class="chat-with">Chat with John Smith</div>
                            <div class="chat-num-messages">already 65 messages</div>
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul>
                            <li class="clearfix">
                                <div class="message-data text-right"> <span class="message-data-time" >10:10 AM, Today</span> &nbsp; &nbsp; <span class="message-data-name" >John</span> <i class="zmdi zmdi-circle me"></i> </div>
                                <div class="message other-message float-right"> Hi Will, how are you? How is the project coming along? </div>
                            </li>
                            <li>
                                <div class="message-data"> <span class="message-data-name"><i class="zmdi zmdi-circle online"></i> Will</span> <span class="message-data-time">10:12 AM, Today</span> </div>
                                <div class="message my-message"> Are we meeting today? Project has been already finished and I have results to show you. </div>
                            </li>
                            <li class="clearfix">
                                <div class="message-data text-right"> <span class="message-data-time" >10:14 AM, Today</span> &nbsp; &nbsp; <span class="message-data-name" >John</span> <i class="zmdi zmdi-circle me"></i> </div>
                                <div class="message other-message float-right"> Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so? Have you faced any problems at the last phase of the project? </div>
                            </li>
                            <li>
                                <div class="message-data"> <span class="message-data-name"><i class="zmdi zmdi-circle online"></i> Will</span> <span class="message-data-time">10:20 AM, Today</span> </div>
                                <div class="message my-message"> Actually everything was fine. I'm very excited to show this to our team. </div>
                            </li>
                            <li>
                                <div class="message-data"> <span class="message-data-name"><i class="zmdi zmdi-circle online"></i> Will</span> <span class="message-data-time">10:31 AM, Today</span> </div>
                                <i class="zmdi zmdi-circle online"></i> <i class="zmdi zmdi-circle online" style="color: #AED2A6"></i> <i class="zmdi zmdi-circle online" style="color:#DAE9DA"></i> </li>
                        </ul>
                    </div>
                    <div class="chat-message clearfix">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Comments">
                            </div>
                        </div>
                        <button class="btn btn-sm btn-raised btn-default">Send</button>
                        <a href="#" class="btn btn-sm btn-raised btn-warning"><i class="zmdi zmdi-camera"></i></a> <a href="#" class="btn btn-sm btn-raised btn-info"><i class="zmdi zmdi-file-text"></i></a>
                    </div>
                </div>
           </div>
        </div>
		</div>
	

@endsection
