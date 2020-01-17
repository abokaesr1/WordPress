    <?php get_header();?>


    <!-- Start the desgin of contanier -->
    <div class="container author-page">
        <!-- Start first row -->
        
        <h1 class ='profile-header text-center'>

        <span class ='nickname'><?php the_author_meta('nickname') ?></span> 

        </h1>
        <div class='main-info'>
        <div class="row">
    
        <div class = 'col-md-3'>
            <?php 
                $avatar_arg = array( //avatar argument to disgin it
                    'class' => 'img-responsive img-thumbnail center-block '
                );
                echo get_avatar(get_the_author_meta('ID'), 200 ,'' ,'',$avatar_arg); ?>
        </div>
        <div class = 'col-md-9'>
            <ul class = ' author-name list-unstyled'>
            <li> <span>First Name : </span><?php the_author_meta('first_name')// print first name?>  </li> 
            <li><span>Last Name : </span><?php the_author_meta('last_name') //print last name?>   </li>
            <li><span>Nick Name : </span><?php the_author_meta('nickname')// print nick name?> </li> 
            </ul>
            <hr>
            <?php if(get_the_author('description')){ //check if the user has desciption?>
            <p><?php the_author_meta('description') //print the desciption of user?></p>
            <?php } else {

                echo' There is no description for the author';
                        }
            ?>
            
        </div>
        </div>
    <!-- End first row -->
    </div> <!-- End main-info  -->
    <!-- Start second row -->
    <div class="row author-stats">
        <div class ='col-md-3'> 
            <div class="stats">
                <p>Posts count</p>
                <span> <?php echo count_user_posts(get_the_author_meta('ID')); // use to get the number of posts (posts counts)?> </span>
            </div>
            </div>
        <div class ='col-md-3'> 
            <div class="stats">
                <p> Comments Count </p> 
                <span> 
                    <?php
                    $comments_count =array( // declair vaeiable to get the user comments 
                        'user_id' => get_the_author_meta('ID'), // use to get the user to print his comments 
                        'count'   => true // use to get the number of comments 
    
                    );
                    echo get_comments($comments_count); // print the comments
                    
                    ?>
                </span>
                </div>
            </div>
        <div class ='col-md-3'>
            <div class="stats">
                <p>Total Posts View</p>
                <span> 0 </span>
            </div>
        </div>
        <div class ='col-md-3'>
            <div class="stats">
                <p>Testing</p>
                <span> 0 </span>
            </div>
        </div>

    </div>
    <!-- End second row -->
    

        <?php 
        // define new varible to sign the array to use wp_Query
        $abo_Query = array(
            'author' => get_the_author_meta('ID'),
            'posts_per_page' => 3,
            
        );
        // here we define new varible to handle thewp_Query
        $author_posts = new wp_Query($abo_Query);
        // sign the wp_Query to our posts using its variable
            if(  $author_posts -> have_posts()){ 
            ?> 

            <h3 class='author-posts-title text-center'>
                The Last Posts Of <?php the_author_meta('nickname'); ?> 
            </h3>
            <?php while( $author_posts -> have_posts()){ 
                $author_posts -> the_post()
            ?> 
            <div class ='author-posts'>
            <div class = 'row'>
            <div class ='col-sm-2'>
            <?php the_post_thumbnail('',['class' =>'img-responsive img-thumbnail'])?>

            </div>
        <div class = 'col-sm-9'>
            
                <h3 class="post-title">
                    <a href="<?php  the_permalink() ?>">
                <?php the_title() ?>
                </a>
                </h3>
                <span class = 'post-date'> <i class ='fa fa-calendar fa-fw '></i> <?php the_time('F  j, Y')?> </span>
                <span class = 'post-comments'> <i class ='fa fa-comment fa-fw '></i> <?php comments_popup_link('0 comments' ,'1 comment' , '% comments') ?> </span>
                <div class="post-content"> 
                    <?php the_excerpt(); ?> </div>              
            
        </div>
        </div>
    <div class ='clearfix'></div>
    <?php

    }//end while loop

    }//end if loop
    wp_reset_postdata();// use this comment to get the orginal-data if there is any wrong

    // here we define new array to get the comments information
    ?>
    <h3 class='author-comments-title text-center'>
                The Last [ 3 ]  Comments Of <?php the_author_meta('nickname'); ?> 
    </h3>
    <?php
    $abo_comments = array(
        'user_id' => get_the_author_meta('ID'),
        'number' => 3 ,
        'status' => 'approve',
        'post_type' => 'post',
        'post_status' => 'publish'
    );
    $comments_abo = get_comments($abo_comments);
    ?>
    <div class='comment-desgin'>
    <?php
    /* 
    this section we print the title and date of 
    posting comment by using many functions

    ** comment_post_id very important to get the post id
    ** comment_date to get the when the comment posted
    ** comment_ content get the information of comment

    we put all inside loop to reach all comment by the author
    */
    if($abo_comments){
    foreach($comments_abo  as $comments){?>
    <div class = 'author-commetns-info '>
        <a href="<?php echo get_permalink($comments -> comment_post_ID) ?>">
        <strong class='title-of-post'>Title-Of-Post : </strong><?php echo get_the_title($comments -> comment_post_ID) ?>
        </a>
        <span class ='comment-date'><i class='fa fa-calendar '></i> <strong class='comment-date'>Date-Of-Comment : </strong><?php echo mysql2date('l , F , j ,Y ' ,$comments-> comment_date) ?></span> 
        <span class ='comment-info'><i class='fa fa-envelope'></i> <strong class='comment-date'>Content-Of-Comment : </strong><?php echo $comments-> comment_content ?></span> 
    </div>
        <?php
    }//end foreach
    }//end if and start else 
    else{
    echo ' This author has no comments ';
    } //end else
    // End of get comments informations
    ?>
    </div><!--End comment desgin-->
    </div><!--End row-->
    </div><!--End contanier-->
            
    <?php get_footer();?>


