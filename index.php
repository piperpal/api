<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <title>Piperpal</title>
    <!--[if IE 8]>
	<link href="/css/common_o2.1_ie8-91981ea8f3932c01fab677a25d869e49.css" media="all" rel="stylesheet" type="text/css" />
	<![endif]-->
    <!--[if !(IE 8)]><!-->
	<link href="/css/common_o2.1-858f47868a8d0e12dfa7eb60fa84fb17.css" media="all" rel="stylesheet" type="text/css" />
	<!--<![endif]-->
	
        <!--[if lt IE 9]>
	    <link href="/css/airglyphs-ie8-9f053f042e0a4f621cbc0cd75a0a520c.css" media="all" rel="stylesheet" type="text/css" />
	    <![endif]-->
	
	<link href="/css/main-f3fcc4027aaa2c83f08a1d51ae189e3b.css" media="screen" rel="stylesheet" type="text/css" />
	<!--[if IE 7]>
	    <link href="/css/p1_ie_7-0ab7be89d3999d751ac0e89c44a0ab50.css" media="screen" rel="stylesheet" type="text/css" />
	    <![endif]-->
	<!--[if IE 6]>
	    <link href="/css/p1_ie_6-7d6a1fd8fe9fdf1ce357f6b864c83979.css" media="screen" rel="stylesheet" type="text/css" />
	    <![endif]-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="dns-prefetch" href="//maps.googleapis.com">
	<link rel="dns-prefetch" href="//maps.gstatic.com">
	<link rel="dns-prefetch" href="//mts0.googleapis.com">
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="dns-prefetch" href="//www.piperpal.com">
	<title>piperpal.com - Location-based Search Engine</title>
	<link href="my_style_form.css" type="text/css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>    
  </head>
  <body>
    <style>
      #name label{
	  display: inline-block;
	  width: 100px;
	  text-align: right;
      }
      #name_submit{
	  padding-left: 100px;
      }
      #name div{
	  margin-top: 1em;
      }
      textarea{
    vertical-align: top;
    height: 5em;
      }
      
      .error{
	  display: none;
	  margin-left: 10px;
      }
      
      .error_show{
	  color: red;
	  margin-left: 10px;
    }
      
      input.invalid, textarea.invalid{
	  border: 2px solid red;
      }
      
      input.valid, textarea.valid{
	  border: 2px solid green;
      }
      input {
	  padding: 10px;
    font: 20px Arial;
    width: 70%;
      }
    </style>
    <table>
      <tr>
	<td>
	  <div id="log"></div>	 
	  <script>
	    $(document).ready(function(){
		
		setInterval(function(){
		    
		    if (navigator.geolocation) {
						 navigator.geolocation.getCurrentPosition(ajaxCall);         
		    } else{
			$('#log').html("GPS is not available");
					 }
		    
		    function ajaxCall(position){
			
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;
			var location = window.location.pathname.substr(1);
			var queryString = window.location.search;
			var urlParams = new URLSearchParams(queryString);
			// alert(queryString+":("+latitude+","+longitude+")");
			$.ajax({
			    url: "https://api.piperpal.com/pull.php", 
			    type: 'POST', //I want a type as POST
                            data: {'glat' : latitude, 'glon' : longitude, 'location' : location, 'name' : urlParams.get('name'), 'service' : urlParams.get('service'), 'radius' : urlParams.get('radius') },
			    success: function(response) {
				$('#log').html(response);
				// alert(response);
			    }
						   });
		    }       
		},15000);
	    });
	  </script>
	  <h1><img src="https://www.piperpal.com/Logo.png" alt="Piperpal (Logo)" /></h1>
	  <h2>Documentation</h2>
	  <h3>Location JavaScript API</h3>
	  <h4>Pull</h4>
	  <span style="color: #ff0000">Example</span>    
	  <pre>
	    &lt;script type="text/javascript" src="https://api.piperpal.com/location/json.php?service=Books&glat=37.4375596&glon=-122.11922789999998"&gt;&lt;/script&gt;
	  </pre>
	  <h4>Push</h4>
	  <span style="color: #ff0000">Example</span>    
	  <pre>
	    https://api.piperpal.com/location/push.php?name=<span style="color: #ff0000">Google</span>&location=<span style="color: #ff0000">http://www.google.com/</span>&service=<span style="color: #ff0000">Books</span>&glat=<span style="color: #ff0000">37.4375596</span>&glon=<span style="color: #ff0000">-122.11922789999998</span>&paid=<span style="color: #ff0000">50</span>
	  </pre>
	</td>
      </tr>
    </table>
    <p>Copyright &copy; 2024 <a href="https://aamot.engineering/">Aamot Engineering</a></p>
  </body>
</html>
