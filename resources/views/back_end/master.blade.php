<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Ogani Admin dashboard</title>

  <!-- Favicons -->
  <link href="{{asset('public/back_end/img/favicon.png')}}" rel="icon">
  <link href="{{asset('public/back_end/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('public/back_end/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('public/back_end/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('public/back_end/css/zabuto_calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/back_end/lib/gritter/css/jquery.gritter.css')}}" />
  <!-- Custom styles for this template -->
  <link href="{{asset('public/back_end/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('public/back_end/css/style-responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/back_end/lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <script src="{{asset('public/back_end/lib/chart-master/Chart.js')}}"></script>
</head>

<body>
  <section id="container">
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="{{ url('admin_dashboard') }}" class="logo"><b>OGA<span>NI</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->

@php
 $order =  DB::table('order')->where('status',0)->get();
 $message = DB::table('contact_info')->get();
 $r_orders = DB::table('order')->where('status',5)->get();
@endphp
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">@php
                echo sizeof($order);
              @endphp</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have @php
                echo sizeof($order);
              @endphp pending Orders</p>
              </li>
              <li class="external">
                <a href="{{ url('New-Pending-Orders') }}">See All Pending Orders</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">@php
                echo sizeof($message);
              @endphp</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have @php
                echo sizeof($message);
              @endphp new messages</p>
              </li>
              @foreach ($message as $row)
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="{{asset('public/back_end/img/ui-zac.jpg')}}"></span>
                  <span class="subject">
                  <span class="from">{{$row->user_name}}</span>
                  <span class="time">Just now</span>
                  </span>
                  </a>
              </li>
              @endforeach
              <li>
                <a href="{{ url('new_message') }}">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">@php
                echo sizeof($r_orders);
              @endphp</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">Product Return Request</p>
              </li>

              <li>
                <a href="{{ url('return_order_request') }}">See all Return Orders</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ url('log_out') }}">Logout</a></li>
        </ul>
      </div>
    </header>

    <!--sidebar start-->
      @yield('sidebar')
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
      @yield('dashboard')
    </section>
    <!--main content end-->
    <!--footer start-->
    {{-- <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>OGANI</strong>. All Rights Reserved
        </p>

      <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
    </footer> --}}
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('public/back_end/lib/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('public/back_end/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('public/back_end/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('public/back_end/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('public/back_end/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{asset('public/back_end/lib/jquery.sparkline.js')}}"></script>
  <!--common script for all pages-->
  <script src="{{asset('public/back_end/lib/common-scripts.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/back_end/lib/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/back_end/lib/gritter-conf.js')}}"></script>
  <!--script for this page-->
  <script src="{{asset('public/back_end/lib/sparkline-chart.js')}}"></script>
  <script src="{{asset('public/back_end/lib/zabuto_calendar.js')}}"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{asset('public/back_end/lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
 {{--  <script type="text/javascript">
     $(document).ready( function () {
    $('#myTable').DataTable();
} );


    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: '{{asset("public/back_end/img/ui-sam.jpg")}}',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script> --}}
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
