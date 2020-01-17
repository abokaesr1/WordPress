
<?php

$all_cats = get_the_category();

?>

<div class =' breadcrumb-holder'>
    <div class="container">
        <div class ='row'>
            <div class="col-sm-9">
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo get_home_url()?>"> <?php echo get_bloginfo('name')?>  </a>
            </li>
            <li>
                <a href="<?php echo esc_url(get_category_link($all_cats[0] ->term_id)); ?>">  <?php  echo esc_html($all_cats[0] ->name ); ?>  </a>
             
            </li>
            <li class='active bg-primary '>
                <strong> <?php  echo get_the_title(); ?></strong>
            </li>
        </ol>
    </div>
    </div>
</div>
</div>