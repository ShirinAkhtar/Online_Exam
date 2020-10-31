<!DOCTYPE html>
<html>
<head>
	<title>
		Exam Dashboard
	</title>
  <link type = "text/css" rel = "stylesheet" href = "style.css">
  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
nav {    
display: block;
text-align: center;
}
nav ul {
  margin: 0;
  padding:0;
  list-style: none;
}
.nav a {
  display:block; 
  background: #62959D; 
  color: #334C50 ; 
  text-decoration: none;
  padding: 0.8em 1.8em;
  text-transform: uppercase;
  font-size: 80%;
  letter-spacing: 2px;
  text-shadow: 0 -1px 0 #000;
  position: relative;
}
.nav{  
  vertical-align: top; 
  display: inline-block;
  box-shadow: 
    1px -1px -1px 1px #000, 
    -1px 1px -1px 1px #fff, 
    0 0 6px 3px #fff;
  border-radius:6px;
}
.nav li {
  position: relative;
}
.nav > li { 
  float: left; 
  border-bottom: 4px #aaa solid; 
  margin-right: 1px; 
} 
.nav > li > a { 
  margin-bottom: 1px;
  box-shadow: inset 0 2em .33em -0.5em #555; 
}
.nav > li:hover, 
.nav > li:hover > a { 
  border-bottom-color: #24C1D8 ;
}
.nav li:hover > a { 
  color:orange; 
}
.nav > li:first-child { 
  border-radius: 4px 0 0 4px;
} 
.nav > li:first-child > a { 
  border-radius: 4px 0 0 0;
}
.nav > li:last-child { 
  border-radius: 0 0 4px 0; 
  margin-right: 0;
} 
.nav > li:last-child > a { 
  border-radius: 0 4px 0 0;
}
.nav li li a { 
  margin-top: 1px;
}
.nav li a:first-child:nth-last-child(2):before { 
  content: ""; 
  position: absolute; 
  height: 0; 
  width: 0; 
  border: 5px solid transparent; 
  top: 50% ;
  right:5px;  
 }
 /* submenu positioning*/
.nav ul {
  position: absolute;
  white-space: nowrap;
  border-bottom: 5px solid  #24C1D8 ;
  z-index: 1;
  left: -99999em;
}
.nav > li:hover > ul {
  left: auto;
  margin-top: 5px;
  min-width: 100%;
}
.nav > li li:hover > ul { 
  left: 100%;
  margin-left: 1px;
  top: -1px;
}
/* arrow hover styling */
.nav > li > a:first-child:nth-last-child(2):before { 
  border-top-color: #aaa; 
}
.nav > li:hover > a:first-child:nth-last-child(2):before {
  border: 5px solid transparent; 
  border-bottom-color: orange; 
  margin-top:-5px
}
.nav li li > a:first-child:nth-last-child(2):before {  
  border-left-color: #aaa; 
  margin-top: -5px
}
.nav li li:hover > a:first-child:nth-last-child(2):before {
  border: 5px solid transparent; 
  border-right-color: orange;
  right: 10px; 
}
  </style>
</head>

<body>
<nav>
  <ul class="nav">
    <li><a href="admin.php">Dashboard</a></li>
    <li><a href="exam.php">Exam</a>
    </li>
    <li><a href="#">Questions</a>
    <ul>
    
    <li><a href="manage.php">Manage Question</a></li>
</ul>
    </li>
    <li><a href="user1.php">Users</a></li>
    
        
    <li><a href="logout.php">Logout</a></li>
    
  </ul>
</nav>