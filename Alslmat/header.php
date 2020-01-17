<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
    <meta charset ="<?php bloginfo('charset');?>" /> 
        <title>
        <?php the_title(' | ' ,' true  ' ,'right' );?>  
        <?php bloginfo('name');?>
    
    </title>
       <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
        <?php wp_head();?>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body >
 
<nav class="navbar navbar-expand-lg navbar-dark ">
    <!-- here we put bloginfo to bring the detalis from  our website and link it to the url-->
  <a class="navbar-brand" href="<?php bloginfo('url')?>"><i class="fa fa-home"></i>  <?php bloginfo('name')?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
     <!-- this function use to pass the functions detalies inside the header
     *** its add the contant to the header
       --> 
  <?php menu_abo(); ?> 
   
</div>
</nav>
 

