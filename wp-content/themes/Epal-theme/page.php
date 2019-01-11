<!--File Template Mặc Định Của Wordpress-->



<?php get_header();
    get_template_part('sections/top-header')
?>




<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post();

            get_template_part( 'content', 'page' );

        endwhile; ?>

    </main>
</div>

<?php get_footer() ?>