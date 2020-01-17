
<?php 
get_header();
include( get_template_directory(). '/includes/breadcrumb.php');
?>
<!-- Start
    make the post dinamc where you can bring
    the contant from your information.....
-->

<div class ='container post-single'>
 
 
       <?php 
          // this loop to check if there are posts or not
           if( have_posts()){
            while( have_posts()){
            the_post();?>
    
        <div class = 'main-post single-post'>
             <!-- Start to add icon to edite the post -->
          
            <!-- end to add icon to edite the post -->

            <!-- Start this function bring the title dinamic -->
            <h3 class="post-title">
                <a href="<?php  the_permalink() ?>">
            <?php the_title() ?>
            </a>
            </h3>
            <!-- End this function bring the title dinamic -->

             <!-- Start this function bring the rest of stuffs dinamic -->
            <span class = 'post-auther'>  <i class ='fa fa-user fa-fw '></i> <?php the_author_posts_link()  ?>, </span>
            <span class = 'post-date'> <i class ='fa fa-calendar fa-fw '></i> <?php the_time('F  j, Y')?> </span>
            <span class = 'post-comments'> <i class ='fa fa-comment fa-fw '></i> <?php comments_popup_link('0 comments' ,'1 comment' , '% comments') ?> </span>
            <div class="img-width">
                <?php the_post_thumbnail('',['class' =>'img-responsive img-thumbnail '])?>
            </div>
            <div class="post-content"> 
                <?php the_content(); ?> </div>          
            <hr>
            <div class ='post-categories'> 
                <i class ='fa fa-tags fa-fw  '></i>
               <?php the_category(', ') ?>
            </div>
            <hr>    
            <p class ='post-tags'> 
               <?php the_tags() ?>
            </p>
        </div>
   
            <?php

            }//end while loop

        }//end if loop
 
        echo'<div class=" clearfix"></div>';
        // start of creating random posts
        // define new varible to sign the array to use wp_Query
        $random_posts_argument = array(
            'post_per_page' => 2 , // get the number posts that you want to show
            'orderby'    => 'rand', // make the show of posts random
            // this function use to get the categories id by using malti functions 
            'category__in' => wp_get_post_categories(get_queried_object_id()),
            'post__not_in' => array(get_queried_object_id())

        );
        // here we define new varible to handle the wp_Query
        $random_posts = new wp_Query($random_posts_argument);
        // sign the wp_Query to our posts using its variable
        ?> 
        <div class ='row'>
        <div class ='col-sm-9'>
        <h1 class='title-random'> Random-Related-Posts </h1>
        <?php
            if(  $random_posts -> have_posts()){ 
            while( $random_posts -> have_posts()){ 
                $random_posts -> the_post()
            ?> 
            <div class ='author-posts'>
            
                <h3 class="post-title">
                    <a href="<?php  the_permalink() ?>">
                <?php the_title() ?>
                </a>
                </h3>
       
        </div>
<?php
    }//end while loop

    }//end if loop
else{
    echo '<h3 class = "empty-post "> sorry there is no related posts to this post </h3>';
}//end of else
//end of creating random posts
?> 
</div>
</div><!-- End of row of random posts-->

<?php
    wp_reset_postdata();// use this comment to get the orginal-data if there is any wrong

    // here we define new array to get the comments information
    ?>


         <!-- Start The Author area-->

         <!-- Start graid system to design the information-->
        
    <div class ='row author-info'>
        <div class ='col-md-2 '>
            <!-- display the avatar detalis from database. 
            and design the avtar-->

            <?php 
            $avatar_arg = array( //avatar argument to disgin it
                'class' => 'img-responsive img-thumbnail center-block '
            );
            echo get_avatar(get_the_author_meta('ID'), 95 ,'' ,'',$avatar_arg); ?>
            <!-- display the author detalis from database.-->
        </div>
        <div class ='col-md-9 '>
            <h4>
                <?php the_author_meta('first_name') ?>
                <?php the_author_meta('last_name') ?>
               (<span class ='nickname'><?php the_author_meta('nickname') ?></span>) 
                </h4>
                <?php if(get_the_author('description')){ ?>
                <p><?php the_author_meta('description') ?></p>
                <?php } else {

                    echo' There is no description for the author';
                    }
                ?>
        </div>  
        <hr>
        <p class ='author-stats'>
        <i class="fa fa-calculator"></i> User posts count : <span class =' posts-count'> <?php echo count_user_posts(get_the_author_meta('ID')); // use to get the number of posts (posts counts)?> </span>
        <br>
        <i class="fa fa-link"></i> User profile link : <?php the_author_posts_link(); ?>
        </p>
    </div>
      <!-- End of the graid system.-->
      <hr>
 <!-- End The Author area-->
        <?php
 //pagination section to show the word prev and next and to check the next post
        echo '<div class ="post-single-pagination">';
        if(get_previous_post_link()){
            previous_post_link('%link' ,'<i class="fa fa-chevron-left fa-lg"></i>  %title' ,true , 'love');
        }else{
            echo'<span class ="previous-span">Prev-Post</span>' ;
        }
        if(get_next_post_link()){
            next_post_link('%link' ,'%title <i class="fa fa-chevron-right fa-lg "></i> ');
        }else{
            echo'<span class ="next-span">Next-Post</span>' ;
        }
        echo'</div>';

        // show the comments section
        comments_template();

        //display the comments form to reply or to comment
        comment_form();

        ?>

</div>
<!-- End
    make the post dinamc where you can bring
    the contant from your information.....
-->
<?php get_footer(); ?>


