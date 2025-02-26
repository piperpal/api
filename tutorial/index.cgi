#!/usr/bin/perl

# Copyright (C) 2015-2022  Aamot Software
#
# Author: ole@aamot.software
#
# Date: 2022-11-10T10:15:00+02
#
# Field: Incremental, location, sql, perl
#
# URL: http://www.piperpal.com/index.cgi

use strict;
use warnings;
print "Content-Type: text/html\n\n";
print <<EOF;
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="dns-prefetch" href="//maps.googleapis.com">
    <link rel="dns-prefetch" href="//maps.gstatic.com">
    <link rel="dns-prefetch" href="//mts0.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//yay.oka.no">
    
    <title>piperpal.com - Location-based Search Engine - Location JavaScript API</title>
    <link href="https://www.piperpal.com/my_style_form.css" type="text/css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <meta charset="utf-8" />
    </head>
    <body>
      <img src="https://www.piperpal.com/piperpal.png" width="600" alt="Logo" />
      <h2>API Tutorial for Piperpal Location JavaScript API</h2>

      <h3>Introduction:</h3>

      <p>Piperpal Location JavaScript API provides a simple way to retrieve location information based on geographical coordinates and to push new location data to the server. This tutorial will guide you through the process of making requests to the API for both reading (pull) and writing (push) location data.</p>

      <h4>Pull/API Read Endpoint</h4>

      <p><b>Endpoint:</b></p>

      <pre>
      arduino

      https://api.piperpal.com/location/json.php
      </pre>

      <p><b>Query Parameters:</b></p>

      <pre>
      service (required): Specifies the type of location/service you are searching for.
      glat (required): Latitude of the location.
      glon (required): Longitude of the location.
      </pre>

      <p><b>Example Usage:</b></p>

      <pre>
      html

      &lt;script type="text/javascript" src="https://api.piperpal.com/location/json.php?service=Books&glat=37.4375596&glon=-122.11922789999998"&gt;&lt;/script&gt;
      &lt;script language="JavaScript"&gt;
          var obj = JSON.parse(locations);
          for (i = 0; i &lt; obj.locations.length; i++) {
          // Process and display location data as needed
          }
     &lt;/script&gt;
     </pre>

     <h3>Push/API Write Endpoint</h3>

     <p><b>Endpoint:</b></p>

     <pre>
     arduino

     https://api.piperpal.com/location/push.php
     </pre>

     <p><b>Query Parameters:</b></p>

     <pre>
     name (required): Name of the location.
     location (required): URL of the location.
     service (required): Type of service associated with the location.
     glat (required): Latitude of the location.
     glon (required): Longitude of the location.
     paid (optional): Amount paid for the service.
     </pre>

     <p><b>Example Usage:</b></p>

     <pre>
     html

     &lt;script type="text/javascript" src="https://api.piperpal.com/location/push.php?name=Google&location=http://www.google.com/&service=Books&glat=37.4375596&glon=-122.11922789999998&paid=50"&gt;&lt;/script&gt;
     </pre>

     <p><b>Notes:</b></p>

     <p>For the pull API, include the script tag with the API URL and necessary query parameters. The response will be available as a JavaScript object named locations.</p>
     <p>For the push API, include the script tag with the API URL and required query parameters. This will push the specified location data to the server.</p>

     <p>Ensure that you replace placeholder values with your actual data when making API requests. The pull API is designed to retrieve location information, while the push API is used to add new locations to the Piperpal database.</p>

<p>In this tutorial, we'll guide you through creating an HTML document with embedded JavaScript to interact with Piperpal's Location API. This example will focus on a simple web page that allows users to submit location data and retrieve nearby locations using the API.

<h3>Prerequisites:</h3>

    <ol><li>Piperpal API Access:
    <ul><li>Make sure you have access to Piperpal's Location API and understand the available endpoints for both reading and writing data.</li></ul>
    
    <li>Text Editor:
    <ul><li>Use a text editor of your choice. Visual Studio Code, Sublime Text, or Atom are popular choices.</li></ul>
    </ol>

<h4>Step 1: Set Up Your HTML Document</h4>

<p>Create a new HTML file (e.g., index.html) and set up the basic structure:</p>

<pre>
html

&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Piperpal Location API Demo&lt;/title&gt;
    &lt;!-- Include necessary stylesheets or link to external styles --&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;!-- Content will go here --&gt;
    &lt;!-- Include necessary scripts, such as jQuery and Piperpal's API script --&gt;
&lt;/body&gt;
&lt;/html&gt;
</pre>

<h4>Step 2: Include External Scripts and Styles</h4>

<p>Include necessary external scripts and stylesheets in the <head> section of your HTML file. For example, include jQuery and Piperpal's API script:</p>

<pre>
html

&lt;!-- Include jQuery --&gt;
&lt;script src="https://code.jquery.com/jquery-3.3.1.min.js"&gt;&lt;/script&gt;

&lt;!-- Include Piperpal's Location API Script --&gt;
&lt;script src="https://api.piperpal.com/location/json.php"&gt;&lt;/script&gt;

&lt;!-- Include any additional stylesheets --&gt;
&lt;link rel="stylesheet" href="styles.css"&gt;
</pre>

<h4>Step 3: Build the Location Submission Form</h4>

<p>Create a form that allows users to submit location data. Include fields for name, service, location, and any other relevant information:</p>

<pre>
html

&lt;form id="locationForm"&gt;
    &lt;label for="name"&gt;Name:&lt;/label&gt;
    &lt;input type="text" id="name" name="name" required&gt;

    &lt;label for="service"&gt;Service:&lt;/label&gt;
    &lt;select id="service" name="service"&gt;
        &lt;option value="Restaurant"&gt;Restaurant&lt;/option&gt;
        &lt;!-- Add other service options --&gt;
    &lt;/select&gt;

    &lt;label for="location"&gt;Location:&lt;/label&gt;
    &lt;input type="text" id="location" name="location" required&gt;

    &lt;!-- Add more fields as needed --&gt;

    &lt;button type="button" onclick="submitLocation()"&gt;Submit Location&lt;/button&gt;
&lt;/form&gt;
</pre>

<h4>Step 4: Write JavaScript for Location Submission</h4>

<p>Write JavaScript code to handle location submission. Define the submitLocation function that will be called when the user clicks the submit button:</p>

<pre>
html

&lt;script&gt;
    function submitLocation() {
        // Get values from form fields
        const name = document.getElementById('name').value;
        const service = document.getElementById('service').value;
        const location = document.getElementById('location').value;

        // Use Piperpal's API endpoint to push location data
        const apiUrl = `https://api.piperpal.com/location/push.php?name=\${name}&service=\${service}&location=\${location}`;
        
        // Make an AJAX request to submit data
        \$.get(apiUrl, function(response) {
            // Handle the response if needed
            console.log(response);
        });
    }
&lt;/script&gt;
</pre>

<h4>Step 5: Display Nearby Locations</h4>

<p>Create a section on the page to display nearby locations retrieved from Piperpal's API:</p>

<pre>
html

&lt;div id="nearbyLocations"&gt;
    &lt;!-- Nearby locations will be displayed here --&gt;
&lt;/div&gt;
</pre>

<p><b>Write JavaScript code to fetch and display nearby locations:</b></p>

<pre>
html

&lt;script&gt;
    // Use Piperpal's API endpoint to pull nearby locations
    const readApiUrl = 'https://api.piperpal.com/location/json.php?service=Search&glat=37.4375596&glon=-122.11922789999998';

    // Make an AJAX request to fetch data
    \$.get(readApiUrl, function(response) {
        // Handle the response and display nearby locations
        const nearbyLocations = response.locations;
        const nearbyLocationsDiv = document.getElementById('nearbyLocations');

        nearbyLocations.forEach(location =&gt; {
            const locationInfo = `&lt;p&gt;&lt;strong&gt;\${location.name}&lt;/strong&gt; (\${location.distance} away) - \${location.service}&lt;/p&gt;`;
            nearbyLocationsDiv.innerHTML += locationInfo;
        });
    });
&lt;/script&gt;
</pre>

    <h4>Step 6: Test Your Web Page</h4>

    <p>Save your HTML file and open it in a web browser. Test the location submission form and check if nearby locations are displayed.</h2>

    <p>Congratulations! You've created a simple web page that interacts with Piperpal's Location API. You can customize and expand upon this example based on your specific needs.</p>

     <p>&copy; 2023 Aamot Engineering</p>
   </center>
  </body>
</html>
EOF
