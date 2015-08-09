<div class="row">

    <?php
    $args = array(
        'posts_per_page' => $posts_per_page,
        'offset' => 0,
        'category' => '',
        'category_name' => $cat,
        'faqcategory' => $faqcat,
        'orderby' => 'post_date',
        'order' => $ord,
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'faq',
        'post_mime_type' => '',
        'post_parent' => 0,
        'post_status' => 'publish',
    );

    $all_questions = get_posts($args);

    $count = count($all_questions);

    $i = 1;

    foreach ($all_questions as $question) {

        setup_postdata($question);

        ?>

        <?php if ($i == 1 OR $i == ceil($count / 2) + 1) { ?>

            <div class="panel-group col-sm-6" id="accordion" role="tablist" aria-multiselectable="true">

        <?php } ?>


        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo $question->ID ?>">
                <span class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapse<?php echo $question->ID ?>"
                       aria-expanded="true" aria-controls="collapse<?php echo $question->ID ?>">
                        <?php echo $question->post_title; ?>
                    </a>

                </span>

            </div>
            <div id="collapse<?php echo $question->ID ?>" class="panel-collapse collapse" role="tabpanel"
                 aria-labelledby="headin<?php echo $question->ID ?>">
                <div class="panel-body">
                    <?php echo apply_filters('the_content', $question->post_content); ?>
                </div>
            </div>
        </div>

        <?php if ($i == ceil($count / 2) OR $i == $count) { ?>

            </div>

        <?php } ?>

        <?php

        $i++;

    }

    wp_reset_postdata();
    ?>

</8div>