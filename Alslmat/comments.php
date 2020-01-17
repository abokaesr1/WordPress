<?php
/* if statment to check is there is any comment 
then print them out otherwise print a message */
if(comments_open()){ ?>
    <!--start the array to desgin the comments-->
    <h3 class = 'h3-comments '><?php comments_number(); ?></h3>
    <?php
    echo '<ul class= "list-unstyled comments-list">';
    $dis_comments = array(
        'avatar_size' => 60,
        'max_depth' => 4
        );
 //show the result
 wp_list_comments( $dis_comments);
 echo '</ul>';
}else{
    echo 'you dont have any comments  ';
}
//end of the comments
?>  