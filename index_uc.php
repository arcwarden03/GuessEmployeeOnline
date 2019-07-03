<?php


?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en">
<head>
<title>Guess? Online Forms</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/ui.all.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link href="js/thickbox.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
A{text-decoration:none}
-->
</style>

<script type="text/javascript">
//-----------------------------------------
// Confirm Actions (delete, uninstall)
//-----------------------------------------
$(document).ready(function(){
	
    // Confirm Delete
    $('#form').submit(function(){
        if ($(this).attr('action').indexOf('delete',1) != -1) {
            if (!confirm ('Delete/Uninstall cannot be undone! Are you sure you want to do this?')) {
                return false;
            }
        }
    });
    	
    // Confirm Uninstall
    $('a').click(function(){
        if ($(this).attr('href') != null && $(this).attr('href').indexOf('uninstall',1) != -1) {
            if (!confirm ('Delete/Uninstall cannot be undone! Are you sure you want to do this?')) {
                return false;
            }
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $(".scrollbox").each(function(i) {
    	$(this).attr('id', 'scrollbox_' + i);
		sbox = '#' + $(this).attr('id');
    	$(this).after('<span><a onclick="$(\'' + sbox + ' :checkbox\').attr(\'checked\', \'checked\');"><u>Select All</u></a> / <a onclick="$(\'' + sbox + ' :checkbox\').attr(\'checked\', \'\');"><u>Unselect All</u></a></span>');
	});
});
</script>
</head>
<body>
<div id="container">
<div id="header">
    <div class="div2"><img src="image/lock.png" alt="" style="position: relative; top: 3px;" /><span>
		
    </span></div>
  <!-- <div class="div1">Employee Management System</div> -->
  </div>

<div id="content">
<div class="box">
  <div class="left"></div>
  <div class="right"></div>
  <div class="heading">
   <!-- <h1 style="background-image: url('image/home.png');">
    
    </h1> -->
  </div>
  <div class="content">
    <div style="display: inline-block; width: 100%; margin-bottom: 15px; clear: both;">

      <div style="float: left; width: 100%;" align="center">
        
	<img src="Images/Website_Under_Construction2.png" width="1500" height="650" align="center">
      </div>
    </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery.flot.js"></script>
</div></div>
<div id="footer">
</div>
</body>
</html>