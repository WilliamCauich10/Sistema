<?php
header("Content-type: text/css");
?>
label{
  position: relative;

  width:550px;
  text-align: center;
  <!-- font-size: 15px; -->
}
.texto{
  width:450px;
    height: 40px;
    text-align: center;
    font-size: 20px;
}
.header {
    color: #167F92;
    font-size: 27px;
    padding: 10px;
    font: bold 150% sans-serif;
}
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #FFF;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #167F92;
}
.responstable tr {
  border: 1px solid #D9E4E6;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #167F92;
  color: #FFF;
  padding: 1em;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}

body {
  padding: 0 2em;
  font-family: Arial, sans-serif;
  color: #024457;
  background: #f2f2f2;
}

h1 {
  font-family: Verdana;
  font-weight: normal;
  color: #024457;
}
h1 span {
  color: #167F92;
}
.MenuPrincipal{
   position: relative;
   background-color: #f2f2f2;
   width: 100%;
   height: 60px;
}
.MenuPrincipal ul {
   position: relative;
   list-style-type: none;
   margin: 0;
   padding: 0;
   overflow: hidden;
   background-color: #F0F0F0;
   width: 100%;
}

.MenuPrincipal li {
   float: left;
   width: 280px;
}

.MenuPrincipal li a {
    display: block;
    color: black;
    text-align: center;
    padding: 19px;
    text-decoration: none;
    font-size: 16px;
}

.MenuPrincipal li a:hover {
    background-color: #5A9BD5;
    color: white;
}
.Perfil{
  position: center;
}
.Perfil li{
  font-size: 30px; 
}