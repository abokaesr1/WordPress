
<?php get_header();?>
<!-- Start
    make the post dinamc where you can bring
    the contant from your information.....
-->

<div class =' container'>
   <div class="row">
       <?php 
          /* 
          this loop to check if there are posts or not
          so if there is any post the loop will work and 
          show the information while the loop is true 
          */
           if( have_posts()){ //check if there is any post
            while( have_posts()){ // run the while loop if it is true
            the_post(); // bring all post while the if statment is true
            
            ?> 
            <!-- 
                after doing the if statment here we start to desgin the 
                posts and get the informations dinamices
            -->
    <div class = 'col-sm-6'>
        <div class = 'main-post'>
            <!-- Start this function bring the title dinamic -->
            <h3 class="post-title">
                <a href="<?php  the_permalink() ?>"> <!-- this function help us to get the link that will take us to main post -->
            <?php the_title() ?>
            </a>
            </h3>
            <!-- End this function bring the title dinamic -->

            <!-- 
                Start to get the information of autor of the post such as his name 
                and the time that he post the post and how many comments he has

            ----@in other word this is the head of the post 
            -->
            <span class = 'post-auther'>  <i class ='fa fa-user fa-fw '></i> <?php the_author_posts_link()  ?>, </span><!-- get the autor name -->
            <span class = 'post-date'> <i class ='fa fa-calendar fa-fw '></i> <?php the_time('F  j, Y')?> </span><!-- get the time of author post  -->
            <span class = 'post-comments'> <i class ='fa fa-comment fa-fw '></i> <?php comments_popup_link('0 comments' ,'1 comment' , '% comments') ?> </span><!-- get the number of his comments -->
           
            <!-- The end of the head post information -->


            <?php the_post_thumbnail('',['class' =>'img-responsive img-thumbnail'])?>
            <div class="post-content"> 
                <?php the_content(); ?> </div>          
            <hr>
            <!-- Start to get the type of post such as  HTML,PHP,LOVE -->
            <div class ='post-categories'> 
                <i class ='fa fa-tags fa-fw  '></i>
               <?php the_category(', ') ?>
            </div>
             <!-- end to get the type of post such as  HTML,PHP,LOVE -->
            <hr> 
             <!-- Start to get the tags of post such as  HTML,PHP,LOVE -->   
            <p class ='post-tags'> 
               <?php the_tags() ?>
            </p>
    </div>
    </div>
    <?php

            }//end while loop

        }//end if loop

            /*
             in this section we build a buttons to move between 
             posts one for next and the other one is for prev 
             
            */
            //pagination section to show the word prev and next and to check the next posts
            echo'<div class=" clearfix"></div>';
            echo '<div class ="post-pagination">';
            if(get_previous_posts_link()){
                previous_posts_link('<i class="fa fa-chevron-left  fa-lg"></i>  Prev-Page');
            }else{
                echo'<span class ="previous-span">Prev-page</span>' ;
            }
            if(get_next_posts_link()){
                next_posts_link('Next-page <i class="fa fa-chevron-right fa-lg"></i>');
            }else{
                echo'<span class ="next-span">Next-page</span>' ;
            }
      
            echo'</div>';

            //Start with pagination number 

           
             //End with pagination number 
             
    ?>
    </div>
 </div>


            <!-- End
                make the post dinamc where you can bring
                the contant from your information.....
            -->


            <?php get_footer();?>