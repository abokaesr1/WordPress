
<?php get_header();?>
<!-- 
    cetagory page 
-->
<div class =' container '>
 
    <div class ='text-center category-info '>
        <h1 class=" category-title "><?php single_cat_title() ?> </h1>
        <div class = "category-desc">
        <?php echo category_description() ?>
        </div>
    </div>
  <div class="row">
        <div class = 'col-sm-9'>
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
   
      <div class = 'main-post category-main-post'>
        <div class ='row'>  
             <div class = 'col-sm-4'>
                 
                <?php the_post_thumbnail('',['class' =>'img-responsive img-thumbnail'])?>

            </div>
            <div class ='col-sm-8'>
       
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
        
           
            <div class="post-content"> 
               <?php the_excerpt(); ?> </div>          
            
            <!-- Start to get the type of post such as  HTML,PHP,LOVE -->
            <div class ='post-categories'> 
                <i class ='fa fa-tags fa-fw  '></i>
               <?php the_category(', ') ?>
            </div>
             <!-- end to get the type of post such as  HTML,PHP,LOVE -->
            
             <!-- Start to get the tags of post such as  HTML,PHP,LOVE -->   
            <p class ='post-tags'> 
               <?php the_tags() ?>
            </p>
            </div>  <!-- end the col-sm-8 -->
            </div>  <!-- end the second row -->
            </div>  <!-- end the main-post -->
            
    
    <?php

            }//end while loop

        }//end if loop
            ?>
            </div>  <!-- end the col-sm-9 -->
            <!-- Start the sidebar -->
            <div class = 'col-sm-3 sidebar'>
              <?php

                 /*if( is_active_sidebar('main-sidebar') ){
                    dynamic_sidebar('main-sidebar');

                    }*/

                    get_sidebar('JavaScript');


                 ?>
            </div>
            <!-- End the sidebar -->

 </div> <!--End the row -->
                        <!-- Start the pagination -->
                    <div class=" clearfix"></div>
                    <div class ="post-pagination">
                        <?php echo change_pagination_number();?>
                        </div>

                        <!-- End the pagination -->
   
</div><!--End the container -->


                        <!-- End
                            make the post dinamc where you can bring
                            the contant from your information.....
                        -->


                        <?php get_footer();?>