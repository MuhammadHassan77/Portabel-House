<?php
require("./admin_func.php");
if (empty($_SESSION['admin_email']) && empty($_SESSION['admin_id'])) {
	echo "<script>window.location.assign('./login.php')</script>";
} else {
	$admin_id = $_SESSION['admin_id'];
	$admin_email = $_SESSION['admin_email'];

?>

	<!DOCTYPE html>
	<html lang="en">


	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Portable House</title>

		<!-- Favicons -->
		<link rel="icon" href="../img/favicon.png" sizes="16x16" type="image/png">
		<link rel="icon" href="../img/favicon.png">

		<link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
		<!-- Vectormap -->
		<link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
		<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">

	</head>

	<body>

		<!--*******************
        Preloader start
    ********************-->
		<div id="preloader">
			<div class="sk-three-bounce">
				<div class="sk-child sk-bounce1"></div>
				<div class="sk-child sk-bounce2"></div>
				<div class="sk-child sk-bounce3"></div>
			</div>
		</div>
		<!--*******************
        Preloader end
    ********************-->

		<!--**********************************
        Main wrapper start
    ***********************************-->
		<div id="main-wrapper">

			<!--**********************************
            Nav header start
        ***********************************-->
			<div class="nav-header">
				<a href="" class="brand-logo">
					<img class="logo-abbr" src="../img/logo.png" alt="">
					<!-- <img class="logo-compact" src="../img/logo.png" alt=""> -->
					<!-- <img class="brand-title" src="../img/favicon.png" alt=""> -->
				</a>

				<div class="nav-control">
					<div class="hamburger">
						<span class="line"></span><span class="line"></span><span class="line"></span>
					</div>
				</div>
			</div>
			<!--**********************************
            Nav header end
        ***********************************-->

			<!--**********************************
            Chat box start
        ***********************************-->
			<div class="chatbox">
				<div class="chatbox-close"></div>
				<div class="custom-tab-1">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#notes">Notes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#alerts">Alerts</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#chat">Chat</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active show" id="chat" role="tabpanel">
							<div class="card mb-sm-3 mb-md-0 contacts_card dlab-chat-user-box">
								<div class="card-header chat-list-header text-center">
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
												<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1" />
											</g>
										</svg>
									</a>
									<div>
										<h6 class="mb-1">Chat List</h6>
										<p class="mb-0">Show All</p>
									</div>
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<circle fill="#000000" cx="5" cy="12" r="2" />
												<circle fill="#000000" cx="12" cy="12" r="2" />
												<circle fill="#000000" cx="19" cy="12" r="2" />
											</g>
										</svg>
									</a>
								</div>
								<div class="card-body contacts_body p-0 dlab-scroll  " id="dlab_W_Contacts_Body">
									<ul class="contacts">
										<li class="name-first-letter">A</li>
										<li class="active dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Archie Parker</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Alfie Mason</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>AharlieKane</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">B</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Bashid Samim</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Breddie Ronan</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Ceorge Carson</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">D</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Darry Parker</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Denry Hunter</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">J</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Jack Ronan</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Jacob Tucker</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>James Logan</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Joshua Weston</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">O</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Oliver Acker</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dlab-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Oscar Weston</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="card chat dlab-chat-history-box d-none">
								<div class="card-header chat-list-header text-center">
									<a href="javascript:void(0)" class="dlab-chat-history-back">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1" />
												<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
											</g>
										</svg>
									</a>
									<div>
										<h6 class="mb-1">Chat with Khelesh</h6>
										<p class="mb-0 text-success">Online</p>
									</div>
									<div class="dropdown">
										<a href="javascript:void(0)" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<circle fill="#000000" cx="5" cy="12" r="2" />
													<circle fill="#000000" cx="12" cy="12" r="2" />
													<circle fill="#000000" cx="19" cy="12" r="2" />
												</g>
											</svg></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i>
												View profile</li>
											<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to
												close friends</li>
											<li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to
												group</li>
											<li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
										</ul>
									</div>
								</div>
								<div class="card-body msg_card_body dlab-scroll" id="dlab_W_Contacts_Body3">
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Hi, how are you samim?
											<span class="msg_time">8:40 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Hi Khalid i am good tnx how about you?
											<span class="msg_time_send">8:55 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am good too, thank you for your chat template
											<span class="msg_time">9:00 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											You are welcome
											<span class="msg_time_send">9:05 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am looking for your next templates
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Ok, thank you have a good day
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Bye, see you
											<span class="msg_time">9:12 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Hi, how are you samim?
											<span class="msg_time">8:40 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Hi Khalid i am good tnx how about you?
											<span class="msg_time_send">8:55 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am good too, thank you for your chat template
											<span class="msg_time">9:00 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											You are welcome
											<span class="msg_time_send">9:05 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											I am looking for your next templates
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Ok, thank you have a good day
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
										</div>
										<div class="msg_cotainer">
											Bye, see you
											<span class="msg_time">9:12 AM, Today</span>
										</div>
									</div>
								</div>
								<div class="card-footer type_msg">
									<div class="input-group">
										<textarea class="form-control" placeholder="Type your message..."></textarea>
										<div class="input-group-append">
											<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="alerts" role="tabpanel">
							<div class="card mb-sm-3 mb-md-0 contacts_card">
								<div class="card-header chat-list-header text-center">
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<circle fill="#000000" cx="5" cy="12" r="2" />
												<circle fill="#000000" cx="12" cy="12" r="2" />
												<circle fill="#000000" cx="19" cy="12" r="2" />
											</g>
										</svg></a>
									<div>
										<h6 class="mb-1">Notications</h6>
										<p class="mb-0">Show All</p>
									</div>
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg></a>
								</div>
								<div class="card-body contacts_body p-0 dlab-scroll" id="dlab_W_Contacts_Body1">
									<ul class="contacts">
										<li class="name-first-letter">SEVER STATUS</li>
										<li class="active">
											<div class="d-flex bd-highlight">
												<div class="img_cont primary">KK</div>
												<div class="user_info">
													<span>David Nester Birthday</span>
													<p class="text-primary">Today</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">SOCIAL</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont success">RU<i class="icon fa-birthday-cake"></i></div>
												<div class="user_info">
													<span>Perfection Simplified</span>
													<p>Jame Smith commented on your status</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">SEVER STATUS</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont primary">AU<i class="icon fa fa-user-plus"></i></div>
												<div class="user_info">
													<span>AharlieKane</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont info">MO<i class="icon fa fa-user-plus"></i></div>
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<div class="card-footer"></div>
							</div>
						</div>
						<div class="tab-pane fade" id="notes">
							<div class="card mb-sm-3 mb-md-0 note_card">
								<div class="card-header chat-list-header text-center">
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
												<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1" />
											</g>
										</svg></a>
									<div>
										<h6 class="mb-1">Notes</h6>
										<p class="mb-0">Add New Nots</p>
									</div>
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg></a>
								</div>
								<div class="card-body contacts_body p-0 dlab-scroll" id="dlab_W_Contacts_Body2">
									<ul class="contacts">
										<li class="active">
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>New order placed..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>Youtube, a video-sharing website..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>john just buy your product..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--**********************************
            Chat box End
        ***********************************-->

			<!--**********************************
            Header start
        ***********************************-->
			<div class="header">
				<div class="header-content">
					<nav class="navbar navbar-expand">
						<div class="collapse navbar-collapse justify-content-between">
							<div class="header-left">
								<div class="dashboard_bar">
									Dashboard
								</div>
							</div>
							<ul class="navbar-nav header-right">
								<!-- <li class="nav-item d-none">
								<div class="input-group search-area d-lg-inline-flex d-none">
									<div class="input-group-append">
										<span class="input-group-text">
											<a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a>
										</span>
									</div>
									<input type="text" class="form-control" placeholder="Search here...">
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown d-none">
								<a class="nav-link bell bell-link" href="javascript:void(0)">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2.23779 10.2492L4.66679 11.7064V8.30554L2.23779 10.2492Z" fill="#67636D" />
										<path d="M1.1665 12.327V23.3334C1.16852 23.8531 1.28817 24.3656 1.5165 24.8325L9.20134 17.15L1.1665 12.327Z" fill="#67636D" />
										<path d="M26.4832 24.8325C26.7115 24.3656 26.8311 23.8531 26.8332 23.3334V12.327L18.7983 17.15L26.4832 24.8325Z" fill="#67636D" />
										<path d="M23.3335 8.30554V11.7064L25.7625 10.2492L23.3335 8.30554Z" fill="#67636D" />
										<path d="M21.0492 13.0772C21.024 12.998 21.0076 12.9162 21.0002 12.8334V7.00004C21.0002 6.69062 20.8773 6.39388 20.6585 6.17508C20.4397 5.95629 20.1429 5.83337 19.8335 5.83337H8.16684C7.85742 5.83337 7.56067 5.95629 7.34188 6.17508C7.12309 6.39388 7.00017 6.69062 7.00017 7.00004V12.8334C6.99274 12.9162 6.97631 12.998 6.95117 13.0772L14.0002 17.3064L21.0492 13.0772Z" fill="#67636D" />
										<path d="M17.3262 3.50003L14.7292 1.4222C14.5222 1.25653 14.2651 1.16626 14 1.16626C13.7349 1.16626 13.4777 1.25653 13.2708 1.4222L10.6738 3.50003H17.3262Z" fill="#67636D" />
										<path d="M16.7358 18.3855L14.6008 19.6688C14.4194 19.7778 14.2117 19.8354 14 19.8354C13.7883 19.8354 13.5806 19.7778 13.3991 19.6688L11.2641 18.3855L3.16748 26.4833C3.63438 26.7117 4.14691 26.8313 4.66665 26.8333H23.3333C23.853 26.8313 24.3656 26.7117 24.8325 26.4833L16.7358 18.3855Z" fill="#67636D" />
									</svg>
									<span class="badge light text-white bg-primary rounded-circle">6</span>
								</a>
							</li>
							<li class="nav-item dropdown notification_dropdown d-none">
								<a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-toggle="dropdown">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#67636D" />
										<path d="M9.98193 24.5C10.3863 25.2088 10.971 25.7981 11.6767 26.2079C12.3823 26.6178 13.1839 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0289 25.7981 17.6136 25.2088 18.0179 24.5H9.98193Z" fill="#67636D" />
									</svg>
									<span class="badge light text-white bg-primary rounded-circle">4</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<div id="dlab_W_Notification1" class="widget-media dlab-scroll p-3 height380">
										<ul class="timeline">
											<li>
												<div class="timeline-panel">
													<div class="media mr-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media mr-2 media-info">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media mr-2 media-success">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media mr-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media mr-2 media-danger">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media mr-2 media-primary">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<a class="all-notification" href="javascript:void(0)">See all notifications <i class="ti-arrow-right"></i></a>
								</div>
							</li> -->
								<li class="nav-item dropdown header-profile">
									<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
										<img src="images/profile/17.jpg" width="20" alt="" />
										<div class="header-info">
											<span class="text-black"><?= isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : "Peter Parkur"; ?></span>
											<p class="fs-12 mb-0">Super Admin</p>
										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#profile_edit" class="dropdown-item ai-icon navigator">
											<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
												<circle cx="12" cy="7" r="4"></circle>
											</svg>
											<span class="ml-2">Profile </span>
										</a>
										<a href="javascript:void(0)" class="dropdown-item ai-icon" id="logout">
											<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
												<polyline points="16 17 21 12 16 7"></polyline>
												<line x1="21" y1="12" x2="9" y2="12"></line>
											</svg>
											<span class="ml-2">Logout </span>
										</a>
									</div>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

			<!--**********************************
            Sidebar start
        ***********************************-->
			<div class="dlabnav">
				<div class="dlabnav-scroll">
					<ul class="metismenu" id="menu">
						<li class="mm-active">
							<a class="ai-icon navigator" href="#Orders" aria-expanded="false">
								<i class="flaticon-381-networking"></i>
								<span class="nav-text">Dashboard</span>
							</a>
						</li>
						<li>
							<a class="ai-icon navigator" href="#Orders" aria-expanded="false">
								<i class="flaticon-381-star"></i>
								<span class="nav-text">Orders</span>
							</a>
						</li>
						<!-- <li>
							<a class="ai-icon navigator" href="#Users" aria-expanded="false">
								<i class="flaticon-381-user-3"></i>
								<span class="nav-text">Users</span>
							</a>
						</li> -->
						<li>
							<a class="ai-icon navigator" href="#Components" aria-expanded="false">
								<i class="flaticon-381-internet"></i>
								<span class="nav-text">Components</span>
							</a>
						</li>
						<li>
							<a class="ai-icon navigator" href="#Upload" aria-expanded="false"> 
								<i class="flaticon-381-upload"></i>
								<span class="nav-text">Upload Components</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!--**********************************
            Sidebar end
        ***********************************-->

			<!--**********************************
            Content body start
        ***********************************-->
			<div class="content-body">
				<!-- row -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="row">
								<!-- Cards -->
								<div class="col-sm-4">
									<div class="card">
										<div class="card-body">
											<div class="media align-items-center">
												<div class="media-body mr-3">
													<h2 class="num-text text-black font-w600"><?php getOrders(); ?></h2>
													<span class="fs-14">Total Orders</span>
												</div>
												<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M34.4221 13.9831C34.3342 13.721 34.1756 13.4884 33.9639 13.3108C33.7521 13.1332 33.4954 13.0175 33.2221 12.9766L23.6491 11.5141L19.3531 2.36408C19.232 2.10638 19.04 1.88849 18.7996 1.73587C18.5592 1.58325 18.2803 1.5022 17.9956 1.5022C17.7108 1.5022 17.432 1.58325 17.1916 1.73587C16.9512 1.88849 16.7592 2.10638 16.6381 2.36408L12.3421 11.5141L2.76908 12.9766C2.49641 13.0181 2.24048 13.1341 2.02943 13.3117C1.81837 13.4892 1.66036 13.7215 1.57277 13.9831C1.48517 14.2446 1.47139 14.5253 1.53293 14.7941C1.59447 15.063 1.72895 15.3097 1.92158 15.5071L8.89808 22.6501L7.24808 32.7571C7.20306 33.0345 7.23685 33.3189 7.34561 33.578C7.45437 33.8371 7.63373 34.0605 7.86325 34.2226C8.09277 34.3847 8.36321 34.4791 8.64377 34.495C8.92432 34.5109 9.20371 34.4477 9.45008 34.3126L18.0001 29.5906L26.5501 34.3126C26.7965 34.4489 27.0762 34.5131 27.3573 34.4978C27.6385 34.4826 27.9097 34.3885 28.1399 34.2264C28.37 34.0643 28.55 33.8406 28.659 33.5811C28.7681 33.3215 28.8019 33.0365 28.7566 32.7586L27.1066 22.6516L34.0786 15.5071C34.2703 15.3091 34.4038 15.0622 34.4644 14.7933C34.525 14.5245 34.5103 14.2441 34.4221 13.9831Z" fill="#2953E8" />
												</svg>
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="col-sm-3">
									<div class="card">
										<div class="card-body">
											<div class="media align-items-center">
												<div class="media-body mr-3">
													<h2 class="num-text text-black font-w600"><?php // getUser(); ?></h2>
													<span class="fs-14">Total Users</span>
												</div>
												<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17.8936 22.4999C23.6925 22.4999 28.3936 17.7989 28.3936 11.9999C28.3936 6.20095 23.6925 1.49994 17.8936 1.49994C12.0946 1.49994 7.39355 6.20095 7.39355 11.9999C7.39355 17.7989 12.0946 22.4999 17.8936 22.4999Z" fill="#2953E8" />
													<path d="M29.5606 21.3344C29.2171 20.9909 28.8511 20.6699 28.4761 20.3564C27.216 21.96 25.6079 23.2562 23.7734 24.1472C21.9389 25.0382 19.926 25.5007 17.8865 25.4996C15.8471 25.4986 13.8346 25.0342 12.001 24.1414C10.1674 23.2486 8.56061 21.9507 7.30209 20.3459C5.4471 21.8906 3.95587 23.8256 2.9348 26.013C1.91373 28.2003 1.38799 30.586 1.39509 32.9999C1.39509 33.3978 1.55313 33.7793 1.83443 34.0606C2.11573 34.3419 2.49727 34.4999 2.89509 34.4999H32.8951C33.2929 34.4999 33.6744 34.3419 33.9557 34.0606C34.2371 33.7793 34.3951 33.3978 34.3951 32.9999C34.4005 30.8324 33.976 28.6854 33.1461 26.683C32.3163 24.6807 31.0976 22.8627 29.5606 21.3344Z" fill="#2953E8" />
												</svg>
											</div>
										</div>
									</div>
								</div> -->
								<div class="col-sm-4">
									<div class="card">
										<div class="card-body">
											<div class="media align-items-center">
												<div class="media-body mr-3">
													<h2 class="num-text text-black font-w600"><?php getComponents(); ?></h2>
													<span class="fs-14">Total Components</span>
												</div>
												<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 1.5H6C3.51472 1.5 1.5 3.51472 1.5 6V29.8125C1.5 32.2977 3.51472 34.3125 6 34.3125H12C14.4853 34.3125 16.5 32.2977 16.5 29.8125V6C16.5 3.51472 14.4853 1.5 12 1.5Z" fill="#2953E8" />
													<path d="M30 1.5H24C21.5147 1.5 19.5 3.51472 19.5 6V12C19.5 14.4853 21.5147 16.5 24 16.5H30C32.4853 16.5 34.5 14.4853 34.5 12V6C34.5 3.51472 32.4853 1.5 30 1.5Z" fill="#2953E8" />
													<path d="M30 19.5H24C21.5147 19.5 19.5 21.5147 19.5 24V30C19.5 32.4853 21.5147 34.5 24 34.5H30C32.4853 34.5 34.5 32.4853 34.5 30V24C34.5 21.5147 32.4853 19.5 30 19.5Z" fill="#2953E8" />
												</svg>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="card">
										<div class="card-body">
											<div class="media align-items-center">
												<div class="media-body mr-3">
													<h2 class="num-text text-black font-w600"><?php getModels(); ?></h2>
													<span class="fs-14">Total Models</span>
												</div>
												<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M34.4998 1.91666H11.4998C8.95911 1.9197 6.52332 2.93035 4.72676 4.72691C2.93019 6.52348 1.91955 8.95927 1.9165 11.5V26.8333C1.91929 29.0417 2.68334 31.1816 4.07988 32.8924C5.47642 34.6031 7.42004 35.7801 9.58317 36.225V42.1667C9.58312 42.5137 9.67727 42.8542 9.85558 43.1518C10.0339 43.4495 10.2897 43.6932 10.5956 43.8569C10.9016 44.0206 11.2462 44.0982 11.5928 44.0814C11.9394 44.0645 12.2749 43.9539 12.5636 43.7613L23.5748 36.4167H34.4998C37.0406 36.4136 39.4764 35.403 41.2729 33.6064C43.0695 31.8098 44.0801 29.374 44.0832 26.8333V11.5C44.0801 8.95927 43.0695 6.52348 41.2729 4.72691C39.4764 2.93035 37.0406 1.9197 34.4998 1.91666ZM30.6665 24.9167H15.3332C14.8248 24.9167 14.3373 24.7147 13.9779 24.3553C13.6184 23.9958 13.4165 23.5083 13.4165 23C13.4165 22.4917 13.6184 22.0041 13.9779 21.6447C14.3373 21.2853 14.8248 21.0833 15.3332 21.0833H30.6665C31.1748 21.0833 31.6623 21.2853 32.0218 21.6447C32.3812 22.0041 32.5832 22.4917 32.5832 23C32.5832 23.5083 32.3812 23.9958 32.0218 24.3553C31.6623 24.7147 31.1748 24.9167 30.6665 24.9167ZM34.4998 17.25H11.4998C10.9915 17.25 10.504 17.0481 10.1446 16.6886C9.78511 16.3292 9.58317 15.8417 9.58317 15.3333C9.58317 14.825 9.78511 14.3375 10.1446 13.978C10.504 13.6186 10.9915 13.4167 11.4998 13.4167H34.4998C35.0082 13.4167 35.4957 13.6186 35.8551 13.978C36.2146 14.3375 36.4165 14.825 36.4165 15.3333C36.4165 15.8417 36.2146 16.3292 35.8551 16.6886C35.4957 17.0481 35.0082 17.25 34.4998 17.25Z" fill="#2953E8" />
												</svg>
											</div>
										</div>
									</div>
								</div>
								<!-- Cards -->

								<div class="col-xl-12">
									<div class="card tab" id="Orders" style="display: block;">
										<div class="card-header mb-0 d-sm-flex flex-wrap d-block shadow-sm border-0 align-items-center">
											<div class="mr-auto pr-3 mb-3">
												<h4 class="text-black fs-20 mb-sm-0 mb-2">Orders</h4>
											</div>
										</div>
										<div class="card-body">
											<div class="tab-content">
												<div class="tab-pane show active" id="" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-body">
															<div class="table-responsive">
																<table id="roof-table" class="display min-w850">
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Order Id</th>
																			<th>Full Name</th>
																			<th>Email</th>
																			<th>Price</th>
																			<th>Phone #</th>
																			<th>Design Url</th>
																			<th>Enquiry Details</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$q = "SELECT * FROM orders ORDER BY orderid desc";
																		$result = mysqli_query($mysqli, $q);
																		$i = 1;
																		foreach ($result as $rows) {
																			$id = $rows['orderid'];
																			$name = $rows['fullname'];
																			$email = $rows['email'];
																			$price = $rows['total_price'];
																			$phone = $rows['phone'];
																			$detail = $rows['enquirydetail'];
																			$design_url = $rows['design_url'];
																		?>
																			<tr>
																				<td><?= $i; ?></td>
																				<td><?= $id; ?></td>
																				<td><?= $name; ?></td>
																				<td><?= $email; ?></td>
																				<td> &dollar; <?= $price; ?></td>
																				<td><?= $phone; ?></td>
																				<td><?= $design_url; ?></td>
																				<td><?= $detail; ?></td>
																				<!-- <td><img class="rounded-circle" width="80" src="<?php  // echo "../" . $img; 
																																		?>" alt=""></td> -->
																				<!-- <td>
																				<div class="d-flex">
																					<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit-com" data-toggle="modal" data-target="#editModal" table-name="patterns" com-id="<?php echo $id; ?>" com-name="<?php echo $name; ?>" com-price="<?php echo $price; ?>" com-url="<?php echo "." . $url; ?>">
																						<i class="fa fa-pencil"></i>
																					</a>
																					<a href="#" class="btn btn-danger shadow btn-xs sharp delete-com" data-toggle="modal" data-target="#deleteModal" table-name="patterns" com-id="<?php echo $id; ?>">
																						<i class="fa fa-trash"></i>
																					</a>
																				</div>
																			</td> -->
																			</tr>
																		<?php
																			$i++;
																		}
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-header">
															<h4 class="card-title">Wall</h4>
														</div>
														<div class="card-body">
															<div class="table-responsive">
																<table id="wall-table" class="display min-w850">
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Component Name</th>
																			<th>Texture</th>
																			<th>Price</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$q = "SELECT * FROM patterns WHERE part_type='wall' ";
																		$result = mysqli_query($mysqli, $q);
																		// print_r($result);
																		$i = 1;
																		foreach ($result as $rows) {
																			$id = $rows['id'];
																			$name = $rows['name'];
																			$image = $url = $rows['url'];
																			$price = $rows['price'];
																			$part_type = $rows['part_type'];
																		?>
																			<tr>
																				<td><?php echo $i; ?></td>
																				<td><?php echo $name; ?></td>
																				<td><img class="rounded-circle" width="80" src="<?php echo "../" . $image; ?>" alt=""></td>
																				<td> &dollar; <?= $price; ?></td>
																				<td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit-com" data-toggle="modal" data-target="#editModal" table-name="patterns" com-id="<?php echo $id; ?>" com-name="<?php echo $name; ?>" com-price="<?php echo $price; ?>" com-url="<?php echo "." . $url; ?>">
																							<i class="fa fa-pencil"></i>
																						</a>
																						<a href="#" class="btn btn-danger shadow btn-xs sharp delete-com" data-toggle="modal" data-target="#deleteModal" table-name="patterns" com-id="<?php echo $id; ?>">
																							<i class="fa fa-trash"></i>
																						</a>
																					</div>
																				</td>
																			</tr>
																		<?php
																			$i++;
																		}
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-header">
															<h4 class="card-title">Floor</h4>
														</div>
														<div class="card-body">
															<div class="table-responsive">
																<table id="floor-table" class="display min-w850">
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Component Name</th>
																			<th>Texture</th>
																			<th>Price</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$q = "SELECT * FROM patterns WHERE part_type='floor' ";
																		$result = mysqli_query($mysqli, $q);
																		// print_r($result);
																		$i = 1;
																		foreach ($result as $rows) {
																			$id = $rows['id'];
																			$name = $rows['name'];
																			$image = $url = $rows['url'];
																			$price = $rows['price'];
																			$part_type = $rows['part_type'];
																		?>
																			<tr>
																				<td><?php echo $i; ?></td>
																				<td><?php echo $name; ?></td>
																				<td><img class="rounded-circle" width="80" src="<?php echo "../" . $image; ?>" alt=""></td>
																				<td> &dollar; <?= $price; ?></td>
																				<td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit-com" data-toggle="modal" data-target="#editModal" table-name="patterns" com-id="<?php echo $id; ?>" com-name="<?php echo $name; ?>" com-price="<?php echo $price; ?>" com-url="<?php echo "." . $url; ?>">
																							<i class="fa fa-pencil"></i>
																						</a>
																						<a href="#" class="btn btn-danger shadow btn-xs sharp delete-com" data-toggle="modal" data-target="#deleteModal" table-name="patterns" com-id="<?php echo $id; ?>">
																							<i class="fa fa-trash"></i>
																						</a>
																					</div>
																				</td>
																			</tr>
																		<?php
																			$i++;
																		}
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="card tab" id="Users" style="display: none;">
										<div class="card-header mb-0 d-sm-flex flex-wrap d-block shadow-sm border-0 align-items-center">
											<div class="mr-auto pr-3 mb-3">
												<h4 class="text-black fs-20 mb-sm-0 mb-2">Users</h4>
											</div>
										</div>
										<div class="card-body">
											<div class="tab-content">
												<div class="tab-pane show active" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-body">
															<div class="table-responsive">
																<table id="roof-table" class="display min-w850">
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>User Id</th>
																			<th>Full Name</th>
																			<th>Email</th>
																			<th>Phone #</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$q = "SELECT * FROM orders ORDER BY orderid desc";
																		$result = mysqli_query($mysqli, $q);
																		$i = 1;
																		foreach ($result as $rows) {
																			$id = $rows['orderid'];
																			$name = $rows['fullname'];
																			$email = $rows['email'];
																			$phone = $rows['phone'];
																		?>
																			<tr>
																				<td><?= $i; ?></td>
																				<td><?= $id; ?></td>
																				<td><?= $name; ?></td>
																				<td><?= $email; ?></td>
																				<td><?= $phone; ?></td>
																				<!-- <td>
																				<div class="d-flex">
																					<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit-com" data-toggle="modal" data-target="#editModal" table-name="patterns" com-id="<?php echo $id; ?>" com-name="<?php echo $name; ?>" com-price="<?php echo $price; ?>" com-url="<?php echo "." . $url; ?>">
																						<i class="fa fa-pencil"></i>
																					</a>
																					<a href="#" class="btn btn-danger shadow btn-xs sharp delete-com" data-toggle="modal" data-target="#deleteModal" table-name="patterns" com-id="<?php echo $id; ?>">
																						<i class="fa fa-trash"></i>
																					</a>
																				</div>
																			</td> -->
																			</tr>
																		<?php
																			$i++;
																		}
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="card tab" id="Components" style="display: none;">
										<div class="card-header mb-0 d-sm-flex flex-wrap d-block shadow-sm border-0 align-items-center">
											<div class="mr-auto pr-3 mb-3">
												<h4 class="text-black fs-20 mb-sm-0 mb-2">House Components</h4>
											</div>
											<div class="card-action card-tabs mb-3">
												<ul class="nav nav-tabs" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" data-toggle="tab" href="#Models" role="tab" aria-selected="false">
															Models
														</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#Roof" role="tab" aria-selected="false">
															Roof
														</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#Wall" role="tab" aria-selected="false">
															Wall
														</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#Floor" role="tab" aria-selected="true">
															Floor
														</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="card-body">
											<div class="tab-content">
												<div class="tab-pane show active" id="Models" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-header">
															<h4 class="card-title">Models</h4>
														</div>
														<div class="card-body">
															<div class="table-responsive">
																<table id="roof-table" class="display min-w850">
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Model Name</th>
																			<th>Image</th>
																			<th>Price</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$q = "SELECT * FROM models ";
																		$result = mysqli_query($mysqli, $q);
																		// print_r($result);
																		$i = 1;
																		foreach ($result as $rows) {
																			$id = $rows['id'];
																			$name = $rows['name'];
																			$image = $url = $rows['image'];
																			$price = $rows['price'];
																		?>
																			<tr>
																				<td><?php echo $i; ?></td>
																				<td><?php echo $name; ?></td>
																				<td><img class="rounded-circle" width="80" src="<?php echo "../" . $image; ?>" alt=""></td>
																				<td> &dollar; <?= $price; ?></td>
																				<td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit-com" data-toggle="modal" data-target="#editModal" table-name="models" com-id="<?php echo $id; ?>" com-name="<?php echo $name; ?>" com-price="<?php echo $price; ?>" com-url="<?php echo "." . $url; ?>">
																							<i class="fa fa-pencil"></i>
																						</a>
																						<a href="#" class="btn btn-danger shadow btn-xs sharp delete-com" data-toggle="modal" data-target="#deleteModal" table-name="models" com-id="<?php echo $id; ?>">
																							<i class="fa fa-trash"></i>
																						</a>
																					</div>
																				</td>
																			</tr>
																		<?php
																			$i++;
																		}
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="Roof" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-header">
															<h4 class="card-title">Roof</h4>
														</div>
														<div class="card-body">
															<div class="table-responsive">
																<table id="roof-table" class="display min-w850">
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Component Name</th>
																			<th>Texture</th>
																			<th>Price</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$q = "SELECT * FROM patterns WHERE part_type='roof' ";
																		$result = mysqli_query($mysqli, $q);
																		// print_r($result);
																		$i = 1;
																		foreach ($result as $rows) {
																			$id = $rows['id'];
																			$name = $rows['name'];
																			$image = $url = $rows['url'];
																			$price = $rows['price'];
																			$part_type = $rows['part_type'];
																		?>
																			<tr>
																				<td><?php echo $i; ?></td>
																				<td><?php echo $name; ?></td>
																				<td><img class="rounded-circle" width="80" src="<?php echo "../" . $image; ?>" alt=""></td>
																				<td> &dollar; <?= $price; ?></td>
																				<td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit-com" data-toggle="modal" data-target="#editModal" table-name="patterns" com-id="<?php echo $id; ?>" com-name="<?php echo $name; ?>" com-price="<?php echo $price; ?>" com-url="<?php echo "." . $url; ?>">
																							<i class="fa fa-pencil"></i>
																						</a>
																						<a href="#" class="btn btn-danger shadow btn-xs sharp delete-com" data-toggle="modal" data-target="#deleteModal" table-name="patterns" com-id="<?php echo $id; ?>">
																							<i class="fa fa-trash"></i>
																						</a>
																					</div>
																				</td>
																			</tr>
																		<?php
																			$i++;
																		}
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="Wall" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-header">
															<h4 class="card-title">Wall</h4>
														</div>
														<div class="card-body">
															<div class="table-responsive">
																<table id="wall-table" class="display min-w850">
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Component Name</th>
																			<th>Texture</th>
																			<th>Price</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$q = "SELECT * FROM patterns WHERE part_type='wall' ";
																		$result = mysqli_query($mysqli, $q);
																		// print_r($result);
																		$i = 1;
																		foreach ($result as $rows) {
																			$id = $rows['id'];
																			$name = $rows['name'];
																			$image = $url = $rows['url'];
																			$price = $rows['price'];
																			$part_type = $rows['part_type'];
																		?>
																			<tr>
																				<td><?php echo $i; ?></td>
																				<td><?php echo $name; ?></td>
																				<td><img class="rounded-circle" width="80" src="<?php echo "../" . $image; ?>" alt=""></td>
																				<td> &dollar; <?= $price; ?></td>
																				<td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit-com" data-toggle="modal" data-target="#editModal" table-name="patterns" com-id="<?php echo $id; ?>" com-name="<?php echo $name; ?>" com-price="<?php echo $price; ?>" com-url="<?php echo "." . $url; ?>">
																							<i class="fa fa-pencil"></i>
																						</a>
																						<a href="#" class="btn btn-danger shadow btn-xs sharp delete-com" data-toggle="modal" data-target="#deleteModal" table-name="patterns" com-id="<?php echo $id; ?>">
																							<i class="fa fa-trash"></i>
																						</a>
																					</div>
																				</td>
																			</tr>
																		<?php
																			$i++;
																		}
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="Floor" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-header">
															<h4 class="card-title">Floor</h4>
														</div>
														<div class="card-body">
															<div class="table-responsive">
																<table id="floor-table" class="display min-w850">
																	<thead>
																		<tr>
																			<th>#</th>
																			<th>Component Name</th>
																			<th>Texture</th>
																			<th>Price</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$q = "SELECT * FROM patterns WHERE part_type='floor' ";
																		$result = mysqli_query($mysqli, $q);
																		// print_r($result);
																		$i = 1;
																		foreach ($result as $rows) {
																			$id = $rows['id'];
																			$name = $rows['name'];
																			$image = $url = $rows['url'];
																			$price = $rows['price'];
																			$part_type = $rows['part_type'];
																		?>
																			<tr>
																				<td><?php echo $i; ?></td>
																				<td><?php echo $name; ?></td>
																				<td><img class="rounded-circle" width="80" src="<?php echo "../" . $image; ?>" alt=""></td>
																				<td> &dollar; <?= $price; ?></td>
																				<td>
																					<div class="d-flex">
																						<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit-com" data-toggle="modal" data-target="#editModal" table-name="patterns" com-id="<?php echo $id; ?>" com-name="<?php echo $name; ?>" com-price="<?php echo $price; ?>" com-url="<?php echo "." . $url; ?>">
																							<i class="fa fa-pencil"></i>
																						</a>
																						<a href="#" class="btn btn-danger shadow btn-xs sharp delete-com" data-toggle="modal" data-target="#deleteModal" table-name="patterns" com-id="<?php echo $id; ?>">
																							<i class="fa fa-trash"></i>
																						</a>
																					</div>
																				</td>
																			</tr>
																		<?php
																			$i++;
																		}
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="card tab" id="Upload" style="display: none;">
										<div class="card-header mb-0 d-sm-flex flex-wrap d-block shadow-sm border-0 align-items-center">
											<div class="mr-auto pr-3 mb-3">
												<h4 class="text-black fs-20 mb-sm-0 mb-2">Upload Textures</h4>
											</div>
											<div class="card-action card-tabs mb-3">
												<ul class="nav nav-tabs" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" data-toggle="tab" href="#Upload-Roof" role="tab" aria-selected="false">
															Roof
														</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#Upload-Wall" role="tab" aria-selected="false">
															Wall
														</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#Upload-Floor" role="tab" aria-selected="true">
															Floor
														</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="card-body">
											<div class="tab-content">
												<div class="tab-pane show active" id="Upload-Roof" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-header">
															<h4 class="card-title">Roof Texture</h4>
														</div>
														<div class="card-body">
															<form class="p-2" action="./index.php" id="roofForm" method="post" enctype="multipart/form-data">
																<div id="RoofNotify"></div>
																<div class="form-group mb-3">
																	<input type="text" class="form-control form-control-lg TextureName" name="textureName" placeholder="Texture Name">
																</div>
																<div class="form-group mb-3">
																	<input type="number" class="form-control form-control-lg TexturePrice" name="texturePrice" placeholder="10.00">
																</div>
																<div class="custom-file mb-3">
																	<input type="file" class="custom-file-input TextureImg" name="textureImg">
																	<label class="custom-file-label">Choose file</label>
																</div>
																<input type="hidden" value="roof" class="TextureType" name="textureType">
																<div class="my-3">
																	<button type="submit" class="btn btn-primary">
																		<i class="fa fa-plus mx-1"></i> Add Texture
																	</button>
																</div>
															</form>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="Upload-Wall" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-header">
															<h4 class="card-title">Wall Texture</h4>
														</div>
														<div class="card-body">
															<form class="p-2" action="./index.php" id="wallForm" method="post" enctype="multipart/form-data">
																<div id="WallNotify"></div>
																<div class="form-group mb-3">
																	<input type="text" class="form-control form-control-lg TextureName" name="textureName" placeholder="Texture Name">
																</div>
																<div class="form-group mb-3">
																	<input type="number" class="form-control form-control-lg TexturePrice" name="texturePrice" placeholder="10.00">
																</div>
																<div class="custom-file mb-3">
																	<input type="file" class="custom-file-input TextureImg" name="textureImg">
																	<label class="custom-file-label">Choose file</label>
																</div>
																<input type="hidden" value="wall" class="TextureType" name="textureType">
																<div class="my-3">
																	<button type="submit" class="btn btn-primary">
																		<i class="fa fa-plus mx-1"></i> Add Texture
																	</button>
																</div>
															</form>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="Upload-Floor" role="tabpanel" style="position: relative;">
													<div class="card">
														<div class="card-header">
															<h4 class="card-title">Floor Texture</h4>
														</div>
														<div class="card-body">
															<form class="p-2" action="./index.php" id="floorForm" method="post" enctype="multipart/form-data">
																<div id="FloorNotify"></div>
																<div class="form-group mb-3">
																	<input type="text" class="form-control form-control-lg TextureName" placeholder="Texture Name">
																</div>
																<div class="form-group mb-3">
																	<input type="number" class="form-control form-control-lg TexturePrice" name="texturePrice" placeholder="10.00">
																</div>
																<div class="custom-file mb-3">
																	<input type="file" class="custom-file-input TextureImg" name="textureImg">
																	<label class="custom-file-label">Choose file</label>
																</div>
																<input type="hidden" value="floor" class="TextureType" name="textureType">
																<div class="my-3">
																	<button type="submit" class="btn btn-primary">
																		<i class="fa fa-plus mx-1"></i> Add Texture
																	</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="card tab" id="profile_edit" style="display: none;">
										<div class="card-header mb-0 d-sm-flex flex-wrap d-block shadow-sm border-0 align-items-center">
											<div class="mr-auto pr-3 mb-3">
												<h4 class="text-black fs-20 mb-sm-0 mb-2">Profile</h4>
											</div>
										</div>
										<div class="card-body">
											<div class="tab-content">
												<div class="tab-pane show active" id="" role="tabpanel" style="position: relative;">
													<div class="card">

														<div class="card-body">
															<div class="updNotify"></div>
															<div class="basic-form">
																<?php
																$res = mysqli_query($mysqli, "SELECT * from admin where id=$admin_id");
																// var_dump($res);
																foreach ($res as $key) {
																	$a_id = $key['id'];
																	$name = $key['name'];
																	$email = $key['email'];
																}
																?>
																<form id="edit_prof">
																	<div class="form-group">
																		<label>Name</label>
																		<input type="hidden" class="prof_id " value="<?= $a_id; ?>">
																		<input type="text" class="form-control input-default prof_name " value="<?= $name ?>" placeholder="Name">
																	</div>
																	<div class="form-group">
																		<label>Email</label>
																		<input type="email" class="form-control input-default prof_email" value="<?= $email ?>" placeholder="Email Address">
																	</div>
																	<!-- <div class="form-group">
																		<label>Current Password</label>
																		<input type="password" class="form-control input-default prof_op" placeholder="Current Password">
																	</div>
																	<div class="form-group">
																		<label>New Password</label>
																		<input type="password" class="form-control input-default prof_np" placeholder="New Password">
																	</div> -->
																	<button type="submit" class="btn btn-primary">Submit</button>
																</form>
															</div>

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--**********************************
            Content body end
        ***********************************-->

			<!--**********************************
            Footer start
        ***********************************-->
			<!-- <div class="footer d-none">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a href="http://dexignlab.com/" target="_blank">DexignLab</a>
					2021</p>
			</div>
		</div> -->
			<!--**********************************
            Footer end
        ***********************************-->

			<!-- ModalL start -->

			<!-- Add Edit Component -->
			<div class="modal fade" id="editModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Component</h5>
							<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="editNotify"></div>
							<div class="mb-3">
								<input type="hidden" id="com-id">
								<input type="hidden" id="table-name">
								<label for="com-name" class="form-label">Component Name</label>
								<input type="text" class="form-control" id="com-name">
							</div>
							<div class="mb-3">
								<input type="number" class="form-control" id="com-price">
							</div>
							<div class="">
								<label for="com-img" class="form-label">Component Image</label>
								<img class="img-fluid" id="com-img" style="height:300px !important;margin:-13px 0px" src="" alt="">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-primary saveChangesBtn">Save changes</button>
							<button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- ModalL end -->


			<!-- Add Edit Component -->
			<div class="modal fade" id="deleteModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Delete Component</h5>
							<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="deleteNotify"></div>
							<div class="mb-3">
								<input type="hidden" id="delete-id">
								<input type="hidden" id="delete-table-name">
								<h5>Are you sure?</h5>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger deletesBtn">Confirm</button>
							<button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- ModalL end -->

		</div>
		<!--**********************************
        Main wrapper end
    ***********************************-->
	</body>

	<!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.js"></script>
	<script src="js/upload.js"></script>


	<!-- Chart piety plugin files -->
	<script src="vendor/peity/jquery.peity.min.js"></script>


	<!-- Dashboard 1 -->
	<!-- <script src="js/dashboard/dashboard-1.js"></script> -->


	<!-- Apex Chart -->
	<!-- <script src="vendor/apexchart/apexchart.js"></script> -->


	<!-- Datatable -->
	<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="js/plugins-init/datatables.init.js"></script>

	<script>
		$(document).ready(() => {

			var table = $('#roof-table, #wall-table, #floor-table').DataTable();
			// console.log(table);
			// // $(table + ' tbody').on('click', 'tr', function() {
			// $(document).on('click', '.table-responsive table tbody tr', function() {
			// 	var data = table.row(this).data();
			// 	// console.log(data);
			// });

			// handling deletes component btn
			$(document).on('submit', '#edit_prof', function(e) {
				e.preventDefault();
				let prof_id = $(".prof_id").val().trim();
				let prof_name = $(".prof_name").val().trim();
				let prof_email = $(".prof_email").val().trim();
				// let prof_op = $(".prof_op").val().trim();
				// let prof_np = $(".prof_np").val().trim();

				if (prof_id == "" || prof_name == "" || prof_email == "") {
					$(".updNotify").html(`
				<div class="alert alert-danger alert-dismissible fade show">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    <strong>All fields are required!</strong>
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
                </div>
				`);
				} else {
					// let dataString = `act=updateAdminInfo&prof_id=${prof_id}&prof_name=${prof_name}&prof_email=${prof_email}&prof_op=${prof_op}&prof_np=${prof_np}`;
					let dataString = `act=updateAdminInfo&prof_id=${prof_id}&prof_name=${prof_name}&prof_email=${prof_email}`;
					console.log(dataString);
					$.ajax({
						url: "./admin_func.php",
						method: "POST",
						data: dataString,
						caches: false,
						success: (res) => {
							// console.log(res);
							if (res == "success") {
								$(".updNotify").html(`
								<div class="alert alert-success alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
									<strong>Profile Updated Successfully!</strong>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
								</div> `);
								$("#com-id").val('');
								// setTimeout(() => $("button[data-dismiss='modal']").trigger("click"), 1000);
							}
						},
						error: (err) => {
							console.log(err);
						}
					})
				}
			})



			// adding data in modal for editing
			$(document).on("click", ".edit-com", function() {
				let id = $(this).attr('com-id');
				let name = $(this).attr('com-name');
				let url = $(this).attr('com-url');
				let price = $(this).attr('com-price');
				let table_name = $(this).attr('table-name');
				$("#com-id").val(id);
				$("#com-name").val(name);
				$("#com-price").val(price);
				$("#com-img").attr("src", url);
				$("#table-name").val(table_name);
				// console.log(id, name, url, table_name);
			})

			// handling savechanges btn
			$(".saveChangesBtn").click(function() {
				let edit_id = $("#com-id").val();
				let edit_name = $("#com-name").val();
				let edit_price = $("#com-price").val();
				let table_name = $("#table-name").val();
				if (edit_id == "" || edit_name == "" || edit_price == "" || table_name == "") {
					$(".editNotify").html(`
				<div class="alert alert-danger alert-dismissible fade show">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    <strong>Component Name Required!</strong>
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                </div>
				`);
				} else {
					let dataString = `act=updateComponent&com_id=${edit_id}&com_name=${edit_name}&com_price=${edit_price}&table_name=${table_name}`;
					// console.log(dataString);
					$.ajax({
						url: "./admin_func.php",
						method: "POST",
						data: dataString,
						caches: false,
						success: (res) => {
							// console.log(res);
							if (res == "success") {
								$(".editNotify").html(`
								<div class="alert alert-success alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
									<strong>Component Updated Successfully!</strong>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
								</div> `);
								$("#com-id").val('');
								$("#com-name").val('');
								$("#com-price").val('');
								setTimeout(() => $("button[data-dismiss='modal']").trigger("click"), 1000);
							}
						},
						error: (err) => {
							console.log(err);
						}
					})
				}
			})

			// adding data in delete modal 
			$(document).on("click", ".delete-com", function() {
				let id = $(this).attr('com-id');

				let table_name = $(this).attr('table-name');
				$("#delete-id").val(id);

				$("#delete-table-name").val(table_name);
				// console.log(id, name, url, table_name);
			})

			// handling deletes component btn
			$(".deletesBtn").click(function() {
				let delete_id = $("#delete-id").val();

				let table_name = $("#delete-table-name").val();
				if (delete_id == "" || table_name == "") {
					$(".editNotify").html(`
				<div class="alert alert-danger alert-dismissible fade show">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    <strong>Something went wrong!</strong>
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                </div>
				`);
				} else {
					let dataString = `act=deleteComponent&delete_id=${delete_id}&table_name=${table_name}`;
					// console.log(dataString);
					$.ajax({
						url: "./admin_func.php",
						method: "POST",
						data: dataString,
						caches: false,
						success: (res) => {
							// console.log(res);
							if (res == "success") {
								$(".editNotify").html(`
								<div class="alert alert-success alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
									<strong>Component Deleted Successfully!</strong>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
								</div> `);
								$("#com-id").val('');
								setTimeout(() => $("button[data-dismiss='modal']").trigger("click"), 1000);
							}
						},
						error: (err) => {
							console.log(err);
						}
					})
				}
			})

			// handling logout button
			$(document).on("click", "#logout", function() {
				let dataString = `act=adminlogout`;
				$.ajax({
					url: "./admin_func.php",
					method: "POST",
					data: dataString,
					caches: false,
					success: (res) => {
						if (res == "success") {
							setTimeout(function() {
								window.location.href = "./login.php";
							}, 1000)
						}
					},
					error: (err) => {
						console.log(err);
					}
				})
			})
		});
	</script>

	</html>

<?php } ?>