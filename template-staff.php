<?php
/*
Template Name: スタッフ一覧テンプレート
*/


  /**
   * The WordPress Query class.
   * @link http://codex.wordpress.org/Function_Reference/WP_Query
   *
   */
  $args = array(

    //Type & Status Parameters
    'post_type'   => array( 'staff' ),

    'post_status' => array(
      'publish',
      'pending',
      'draft',
      'auto-draft',
      'future',
      'private',
      'inherit',
      'trash'
      ),
  );

  $query = new WP_Query( $args );
?>

  <section id="primary" class="content-area post-contents">
    <main id="main" class="site-main main-block" role="main ">

    <?php if ( $query->have_posts() ) : ?>

      <h2 class="page-title sub-title01">
        <?php

        if ( is_taxonomy_hierarchical( 'topics_category' ) ) {

          single_cat_title();

        } else if ( is_post_type_archive( 'topics' ) ) {

          echo 'お知らせ一覧';

        } else if ( is_post_type_archive( 'staff' ) ) {

          echo 'スタッフ紹介';

        } else if ( is_archive()  ) {

          echo 'スタッフブログ';

        }

        ?>
      </h2>
        <?php
          // Show an optional term description.
          $term_description = term_description();
          if ( ! empty( $term_description ) ) :
            printf( '<div class="taxonomy-description">%s</div>', $term_description );
          endif;
        ?>
      <div class="clearfix row">
      <?php
      while ( $query->have_posts() ) :
        $query->the_post();
        $staff['charge']       = esc_html( get_post_meta( $post->ID, 'staff_charge', true ) );
        $staff['comment']      = esc_html( get_post_meta( $post->ID, 'staff_comment', true ) );
        $staff['facebook_url'] = esc_html( get_post_meta( $post->ID, 'staff_facebook_url', true ) );
        $staff['twitter_url']  = esc_html( get_post_meta( $post->ID, 'staff_twitter_url', true ) );
        $facebook_id = '';
        if ( $staff['facebook_url'] ) {
          if ( strstr( $staff['facebook_url'], 'https://www.facebook.com/') ) {
            $facebook_id = str_replace( 'https://www.facebook.com/', '', $staff['facebook_url'] );
          } else {
            $facebook_id = $staff['facebook_url'];
          }
        }

        ?>

        <div class="col-xs-12 staff-module">
          <div class="clearfix">
            <div class="staff-thumbnail">
              <img src="https://graph.facebook.com/<?php echo $facebook_id ;?>/picture/?type=normal" alt="placeholder+image" class="thumbnail">
            </div>
            <div class="staff-contents">
              <p class="lead staff-lead"><small><?php echo $staff['charge']; ?></small></p>
              <h3 class="staff-name"><?php the_title(); ?></h3>
              <ul class="staff-icons inline-list">
                <li><a href="<?php echo $staff['facebook_url'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/subpage/facebook.gif" alt="Facebook"></a></li>
                <li><a href="<?php echo $staff['twitter_url'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/subpage/twitter.gif" alt="Twitter"></a></li>
              </ul>
            </div>
          </div>
          <div class="staff-comment">
            <?php echo $staff['comment']; ?>
          </div>
        </div>

      <?php endwhile; ?>
      </div>
      <?php //wordfes2014_paging_nav(); ?>

    <?php else : ?>

      <?php get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>

      <nav class="text-center">
      <?php
      // wp_pagenavi
      if ( function_exists( 'wp_pagenavi' ) ) {
        wp_pagenavi();
      } ?>
      </nav>
    </main><!-- #main -->
  </section><!-- #primary -->
