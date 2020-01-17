<?php
// get the comments 
$get_comments = array(

'status' => 'approve' // only approve comments

);
$comments_count =0; //start with 0
$all_comments = get_comments($get_comments); //get all comments
foreach ($all_comments as $comment){ // do a loob to  go through all comments
    
    $post_id = $comment ->comment_post_ID ;// get the post_id of comments
    if (!in_category('windows-10' , $post_id)){ // check if post is not in the category
        continue;
    }
    $comments_count++ ; //counter to increase the comments

    
};

// get category posts count
$cat = get_queried_object(); // get the globle post_count
$post_count = $cat -> count; // get the count of category

?>




<div class=" sidebar">
    <div class='widget1'>
        <div class='widget-title'>
            <h1>
                <?php
                // use to get current category-page title 
                single_cat_title() 
                ?>

            </h1>
        </div>
        <div class='widget-content'>
            <ul>
                <li>
                    <span> Comments Count : <?php echo $comments_count ?> </span>
                </li>
                <li>
                    <span> Posts Count : <?php echo $post_count ?> </span>
                </li>
            </ul>
        </div>
    </div>
    <div class='widget2'>
        <div class='widget-title'>
            <h1>Latest Love Posts</h1>
        </div>

        <div class='widget-content'>
            <ul>
                <?php
                    // array to get the posts by using category ID
                    $posts_arg =array(
                        'posts_per_page' => 4, // number of posts to show
                        'cat' => 17, // category ID

                    );
                    // create new Query to get the posts
                    $query = new WP_Query($posts_arg);
                    // loop statment to check the post if exist 
                    if($query -> have_posts()){
                        while($query -> have_posts()){
                            $query -> the_post(); // print the posts
                            ?>
                <li>
                    <!-- This statment to print the title of post and 
                                 the link that take you to same post when you click
                            -->
                    <a target=" _blank" href="<?php the_permalink() // to get related link  ?>">
                        <?php the_title() // to print the post's title ?></a>
                </li>



                <?php
                        } //end while
                    } //end if
                    ?>

            </ul>
        </div>
    </div>
    <div class='widget3'>
        <div class='widget-title'>
            <h5> Hot Posts By Comments </h5>
        </div>

        <div class='widget-content'>
            <ul>
                <?php
                    // array to get the posts by using category ID
                    $Hot_posts_arg =array(
                        'posts_per_page' => 3, // number of posts to show
                        'orderby' => 'comment_count' // get the hiegest post by using number of comments

                    );
                    // create new Query to get the posts
                    $query = new WP_Query($Hot_posts_arg);
                    // loop statment to check the post if exist 
                    if($query -> have_posts()){
                        while($query -> have_posts()){
                            $query -> the_post(); // print the posts
                            ?>
                <li>
                    <!-- This statment to print the title of post and 
                                 the link that take you to same post when you click
                            -->
                    <a target=" _blank" href="<?php the_permalink() // to get related link  ?>">
                        <?php the_title() // to print the post's title ?></a>
                </li>



                <?php
                        } //end while
                    } //end if
                    ?>

            </ul>
        </div>
    </div>
</div>
