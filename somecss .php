<?php 
echo ' 
.modal { 
display: none; 
position: fixed; 
z-index: 10; 
padding-top: 100px; 
left: 0; 
top: 0; 
width: 100%; 
height: 100%; 
overflow: auto; 
background-color: rgb(0, 0, 0); 
background-color: rgba(0, 0, 0, 0.4); 
} 
.modal-content { 
position: relative; 
background-color: #fefefe; 
margin: auto; 
padding: 0; 
border: 1px solid #888; 
width: 60%; 
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
-webkit-animation-name: animatetop; 
-webkit-animation-duration: 0.4s; 
animation-name: animatetop; 
animation-duration: 0.4s 
} 
@-webkit-keyframes animatetop { 
from { 
top: -300px; 
opacity: 0 
} 
to { 
top: 0; 
opacity: 1 
} 
} 
@keyframes animatetop { 
from { 
top: -300px; 
opacity: 0 
} 
to { 
top: 0; 
opacity: 1 
} 
} 
.close, .rc { 
color: white; 
float: right; 
font-size: 28px; 
font-weight: bold; 
} 
.close:hover, 
.close:focus, 
.rc:hover, 
.rc:focus { 
color: #000; 
text-decoration: none; 
cursor: pointer; 
} 
.modal-header { 
text-align: center; 
padding: 2px 16px; 
background-color: #0084FF; 
color: white; 
} 
.modal-body { 
padding: 2px 16px; 
} 
.modal-footer { 
padding: 2px 16px; 
background-color: #5cb85c; 
color: white; 
} 
  
.modal-body * { 
color: black !important; 
} 
'; 
?> 