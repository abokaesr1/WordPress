<?php
require_once ('wp-bootsrap-navwalker.php');
/* 
in this page i put each function with it actoin 
but if you would like you can change it to your
own and type it as you like.

made by Abo

**this page made to add links to main theme such as { jquary , bootsrap , css and fontawsome}** 
*/
//add feature image support
add_theme_support('post-thumbnails');

//create the path to get the css files
 function abo_add_style(){
    wp_enqueue_style("bootstrap-css" ,  get_template_directory_uri().'/css/bootstrap.min.css'); // add the bootstrap link 
   
    wp_enqueue_style("main" ,  get_template_directory_uri().'/css/main.css'); // add the main page to css
}
//create the path to get the javaScript files
function abo_add_script(){
    //remove the old jquery
    wp_deregister_script('jquery');
    //add the new jquery
    wp_register_script('jquery',includes_url("/js/jquery/jquery.js"),false,'',true);
    //now get jquery again
    wp_enqueue_script('jquery');
    wp_enqueue_script("bootstrap-js" ,  get_template_directory_uri().'/js/bootstrap.min.js' ,array() , false ,true);
    wp_enqueue_script("main-js" ,  get_template_directory_uri().'/js/main.js' ,array() , false ,true);
}
   

/*

*** 
---> custme features use to add the menue to 
wordpress where you can bring the detalies of 
navbar to show it to user <----
***

*/

//add custme features and intial it to be use in navbar 
function custm_feature(){
    register_nav_menus(array(
        'bootstrap-menu' => 'Navigation',
        'Footer-menu' =>'Footer Bar'
));
}

//add navgation_bar and desgin it to be shown to user
function menu_abo(){
    wp_nav_menu(array(
        'theme_location' => 'bootstrap-menu', // get the navbar detalis to show it to user
        'menu_class'      => 'nav navbar-nav navbar-right', // add class to navbar to desgin it
        'container' => false, // delete the div tag 
        'depth' => 2,
        'walker' => new wp_bootstrap_navwalker()
    ));

}
/*
in this section we will cut the text of post using function EXCERPT
*/
function abo_extend_excerpt($length){
    if(is_author()){
        return 20;
    }elseif(is_category()){
        return 20;
    }else{
        return 300;
    } 
}
    add_filter('excerpt_length' , 'abo_extend_excerpt');
    
    function abo_extend_excerpt_change_doat($more){
        return '....';
    }
add_filter('excerpt_more' , 'abo_extend_excerpt_change_doat');
//create the path to get all files (css and JavaScript)
add_action('wp_enqueue_scripts' ,'abo_add_style'); // bring the links of style in function to add them to main page
add_action('wp_enqueue_scripts' ,'abo_add_script'); // bring the links of script to add them to main page
add_action('init' ,'custm_feature'); // make the cutme feature work 


// this function  use to get the number of pages
function change_pagination_number() {

    global $wp_query; // make wp_query globle to use it anywhere
    $all_pages = $wp_query -> max_num_pages ; // get all posts 
    $current_page = max(1,get_query_var('paged')); // get the number of current page
    if($all_pages > 1){ // check if we have more than 1 page 
        return paginate_links(array( // here we return function to check more detalies
            'base' => get_pagenum_link().'%_%', // get the link of page
            'format' => '?paged=%#%', // here add the format of link
            'total' => $all_pages,
            'current' => $current_page, 
        ));
    }

}
// register sidebar
/* 
1-) start with build the function
2-) define the register_sidebar function
3-) bulid the array
4-) fill the content below
*/
function abo_sidebar(){ 

    register_sidebar(array(
     "name" =>'Main Sidebar',
     "id"=> 'main-sidebar',
     "description"=> 'This is a sidebar for abo',
     "class" => 'main-sidebar',
     "before_widget"=>"<div class='widget-content'>",
     "after_widget"=> "</div>",
     "before_title"=>"<h3 class='widget-title'>",
     "after_title"=> "</h3>"
     
    ));
}
  add_action("widgets_init","abo_sidebar");

  //remove tag p from posts 
  function abo_remove_p($content){
      remove_filter(' the_content' , 'wpautop ');
      return $content;


  }
  add_filter('the_content' , 'abo_remove_p',0)
?>
