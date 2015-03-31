<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
	
	<meta charset='utf-8' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
<script src='calendar/js/moment.min.js'></script>
<link href='calendar/css/fullcalendar.css' rel='stylesheet' />
<script src='calendar/js/fullcalendar.js'></script>
<script src='calendar/js/bootstrap.js'></script>


<title>Home</title>
<link rel="icon" href="images/favicon.ico"/>

</head>
<body>
<!-- start header -->
<div id="header">
<a href="index.php"><img src="images/WMT.png" alt="Smiley face"></img></a>
<!-- end header -->
</div>



<!-- start page -->

<!-- -----------------------------------------------------NAV START--------------------------------------------------- -->
<nav class="navbar navbar-inverse">
  <div class="navbar-header">
    <a class="navbar-brand" href="#">Wealth Management Tool</a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="Clients.php">Clients</a></li>
      <li><a href="StockMarket.php">Stock Market</a></li>
      
      <?php
      
      
      
      include('conn.php');

	session_start();

	$faid = $_SESSION['id'];
	
	if($faid == NULL){
	
	header("Location: Login.php");
}
		
	$query = "SELECT fa_admin FROM financial_advisors WHERE id=$faid limit 1";
	
	$result = mysql_query($query) or die(mysql_error());
	
	while($row = mysql_fetch_array($result)){
    

     $boolean = $row['fa_admin'];
   
   
}
	
	if($boolean == 1){
		echo '
       <li><a href="transHistory.php">Transaction History</a></li>
      <li><a href = "falist.php">FA List</a></li>
      ';
  }
     ?> 
      
    </ul>
   <ul class="nav navbar-nav navbar-right">
        <li><a href="Login.php">Log out</a></li>
   </ul>
  </div>
</nav>

<!-- -----------------------------------------------------NAV END--------------------------------------------------- -->
<div class="row">


<div class="col-md-3">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Newsupdate</h3>
  </div>
  <div class="panel-body">
   <!-- start feedwind code --><script type="text/javascript">document.write('\x3Cscript type="text/javascript" src="' + ('https:' == document.location.protocol ? 'https://' : 'http://') + 'feed.mikle.com/js/rssmikle.js">\x3C/script>');</script><script type="text/javascript">(function() {var params = {rssmikle_url: "https://uk.finance.yahoo.com/news/sector-financial-services/?format=rss",rssmikle_frame_width: "430",rssmikle_frame_height: "600",frame_height_by_article: "",rssmikle_target: "_blank",rssmikle_font: "Arial, Helvetica, sans-serif",rssmikle_font_size: "12",rssmikle_border: "off",responsive: "off",rssmikle_css_url: "",text_align: "left",text_align2: "left",corner: "off",scrollbar: "on",autoscroll: "on",scrolldirection: "up",scrollstep: "3",mcspeed: "20",sort: "New",rssmikle_title: "on",rssmikle_title_sentence: "",rssmikle_title_link: "",rssmikle_title_bgcolor: "#0066FF",rssmikle_title_color: "#FFFFFF",rssmikle_title_bgimage: "",rssmikle_item_bgcolor: "#FFFFFF",rssmikle_item_bgimage: "",rssmikle_item_title_length: "55",rssmikle_item_title_color: "#74C4BD",rssmikle_item_border_bottom: "on",rssmikle_item_description: "on",item_link: "off",rssmikle_item_description_length: "150",rssmikle_item_description_color: "#666666",rssmikle_item_date: "gl1",rssmikle_timezone: "Etc/GMT",datetime_format: "%b %e, %Y %l:%M:%S %p",item_description_style: "text+tn",item_thumbnail: "full",article_num: "15",rssmikle_item_podcast: "off",keyword_inc: "",keyword_exc: ""};feedwind_show_widget_iframe(params);})();</script><div style="font-size:10px; text-align:center; width:430px;"><a href="http://feed.mikle.com/" target="_blank" style="color:#CCCCCC;">RSS Feed Widget</a><!--Please display the above link in your web page according to Terms of Service.--></div><!-- end feedwind code -->
  </div>
</div>
</div>


<!------------------------------------------------------CALENDAR START---------------------------------------->
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			//editable: true;
			header: 
			{
				left:'prev, next today',
				center:'title',
				right: 'month,agendaWeek,agendaDay'
			},
			selectable: true,
			selectHelper: true,
			defaultView: 'agendaWeek',

			/*events: 
			[
		        {
		            title: 'Work out',
		            start: '2015-03-29T08:30:00',
		            end: '2015-03-29T09:30:00'
		        },
		        {
		            title: 'Gon get me some shoes',
		            start: '2015-03-29T14:30:00',
		            end: '2015-03-29T15:30:00'
		        },
		        {
		            title: 'Meeting with Tom',
		            start: '2015-03-26T10:30:00',
		            end: '2015-03-26T12:30:00'
		        }
    		],*/

			events: 
			{
				url:'calendar/events.php',
				error: function()
				{
					alert('There was an error loading.');
				}
			},
			
			eventRender: function(event, element, view) 
			{
				if (event.allDay === 'true') 
				{
					event.allDay = true;
				} else 
					{
						event.allDay = false;
					}
		   },
			
			select: function(start, end) 
			{
				var startTime = start.toISOString();
        		var endTime = end.toISOString();
        		$('#start').attr("value",startTime);
        		$('#end').attr("value",endTime);
				$('#calendarModal').modal('toggle');
				//$('#calendar').fullCalendar('unselect');
			},

			eventClick: function(calEvent, jsEvent, view)
			{
				
				
				//alert('Event: ' + calEvent.title);
        		//alert('Start: ' + calEvent.start);
        		//alert('View: ' + view.name);
        		var title = "Title: " + calEvent.title;
        		var startTime = calEvent.start.toString();
        		var endTime = calEvent.end.toString();
        		var id = calEvent.id;
        		document.getElementById("titleDiv").innerHTML = "Title: " + title;
        		document.getElementById("startDiv").innerHTML = "Start: " + startTime;
        		document.getElementById("endDiv").innerHTML = "End: " + endTime;
        		$('#eventid').attr("value",id);
        		if(document.getElementById("evedetail").style.display="none")
        		{
					$("#evedetail").toggle();
				}
        		
        		//$('#infoModal').modal('toggle');
        		return false;
			}


		});
		
	});

</script>
<?php
session_start();
$faID = $_SESSION['id'];
if($faID == NULL)
{
	header("Location: ../Login.php");
}
?>

<style>

	#calendarBody {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 80%;
		margin: 0 auto;
	}

</style>


<div class="col-md-6">
	<div class="jquery-calendar"></div> 
	<div class="panel panel-default events">
  <div class="panel-heading">
    <h3 class="panel-title">Meetings for this day</h3>
  </div>
  <div class="panel-body">
	<div id="calendarBody">
		<div id='calendar'></div>
	</div>
	- Drag to change duration of event</br>
	- Clicking will create a 30 minute long event
  </div>
</div>
</div>

<!-- ----------------------------------------------------Calendar Modal------------------------------ -->
<div id="calendarModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="font-family:Arial">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><b>Please enter your details</b></h4>
      	</div>
      <div class="modal-body">
		  <form role="form" action="calendar/add_events.php" method="post">
		    <div class="form-group">
		      	<label for="title">Title:</label>
		      	<input class="form-control" id="title" name="title" placeholder="Title" required>
		    </div>
		    <div>
		    	<label for="title">Url:</label>
		      	<input class="form-control" id="url" name="url" placeholder="url">
		    </div></br>
		    <div>
				<label for="Client">Client:</label>
				<input class="form-control" id="client" name="client" placeholder="Client">
		    </div></br>
				<input type="hidden" id="start" name="start">
				<input type="hidden" id="end" name="end">
				<input type="hidden" id="fa" name="fa">
		    <div class="form-group">
		      	<label for="notes">Additonal Notes:</label>
		      	<textarea class="form-control" id="notes" name="notes" placeholder="Note"></textarea>
		    </div>
		    <button type="submit" class="btn btn-default">Submit</button>
		  </form>
      </div>
    </div>
  </div>
</div>
<!-- -----------------------------------------------End of Calendar Modal---------------------------- -->


<!-----------------------------------------------------CALENDAR END -------------------------------------------->

<div class="col-md-3"  id="evedetail"  style="display: none;">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Event Details</h3>
  </div>
  <div class="panel-body">
    <div id="titleDiv"></div></br>
	<div id="startDiv"></div></br>
	<div id="endDiv"></div></br>
	<div id="buttonDiv">
	<form role="form" action="calendar/remove_events.php" method="post">
			<div class="form-group">
			<input type="hidden" id="eventid" name="eventid">
			<button type="submit" id="myButton" class="btn btn-primary" >
			Delete Event
			</button>
			</div>
	</form>
	</div>
    </div>

    </div>
  </div>
</div>
</div>




</div>


<div id="footer">
	<p class="links"> <a href="http://validator.w3.org/check/referer" class="xhtml" title="This page validates as XHTML">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> &nbsp;&bull;&nbsp; <a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="This page validates as CSS">Valid <abbr title="Cascading Style Sheets">CSS</abbr></a> </p>
</div>
<!-- end footer -->
</body>
</html>

