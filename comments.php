<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

  <?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
  <h4 class="comments-title">

    <?php
			$sensive_comment_count = get_comments_number();
			if ( '1' === $sensive_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'Один комментарий &ldquo;%1$s&rdquo;', 'sensive' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s комментарий &ldquo;%2$s&rdquo;', '%1$s Комментариев', $sensive_comment_count, 'comments title', 'sensive' ) ),
					number_format_i18n( $sensive_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
  </h4><!-- .comments-title -->

  <?php the_comments_navigation(); ?>

  <div class="comment-list">
    <?php
			wp_list_comments(
				array(
					'walker'            => new Bootstrap_Walker_Comment(),
          'max_depth'         => '2',
          'style'             => 'ol',
          'type'              => 'all',
          'reply_text'        => 'Ответить',
          'per_page'          => '10',
          'avatar_size'       => 60,
          'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
          'echo'              => true,     // true или false
				)
			);
			?>
  </div><!-- .comment-list -->

  <?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
  <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sensive' ); ?></p>
  <?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->

<div class="comments-area">

  <div class="comment-list">
    <div class="single-comment justify-content-between d-flex">
      <div class="user justify-content-between d-flex">
        <div class="thumb">
          <img src="img/blog/c1.jpg" alt="">
        </div>
        <div class="desc">
          <h5><a href="#">Emilly Blunt</a></h5>
          <p class="date">December 4, 2017 at 3:12 pm </p>
          <p class="comment">
            Never say goodbye till the end comes!
          </p>
        </div>
      </div>
      <div class="reply-btn"><a href="" class="btn-reply text-uppercase">reply</a></div>
    </div>
  </div>
  <div class="comment-list left-padding">
    <div class="single-comment justify-content-between d-flex">
      <div class="user justify-content-between d-flex">
        <div class="thumb">
          <img src="img/blog/c2.jpg" alt="">
        </div>
        <div class="desc">
          <h5><a href="#">Elsie Cunningham</a></h5>
          <p class="date">December 4, 2017 at 3:12 pm </p>
          <p class="comment">
            Never say goodbye till the end comes!
          </p>
        </div>
      </div>
      <div class="reply-btn">
        <a href="" class="btn-reply text-uppercase">reply</a>
      </div>
    </div>
  </div>
  <div class="comment-list left-padding">
    <div class="single-comment justify-content-between d-flex">
      <div class="user justify-content-between d-flex">
        <div class="thumb">
          <img src="img/blog/c3.jpg" alt="">
        </div>
        <div class="desc">
          <h5><a href="#">Annie Stephens</a></h5>
          <p class="date">December 4, 2017 at 3:12 pm </p>
          <p class="comment">
            Never say goodbye till the end comes!
          </p>
        </div>
      </div>
      <div class="reply-btn">
        <a href="" class="btn-reply text-uppercase">reply</a>
      </div>
    </div>
  </div>
  <div class="comment-list">
    <div class="single-comment justify-content-between d-flex">
      <div class="user justify-content-between d-flex">
        <div class="thumb">
          <img src="img/blog/c4.jpg" alt="">
        </div>
        <div class="desc">
          <h5><a href="#">Maria Luna</a></h5>
          <p class="date">December 4, 2017 at 3:12 pm </p>
          <p class="comment">
            Never say goodbye till the end comes!
          </p>
        </div>
      </div>
      <div class="reply-btn">
        <a href="" class="btn-reply text-uppercase">reply</a>
      </div>
    </div>
  </div>
  <div class="comment-list">
    <div class="single-comment justify-content-between d-flex">
      <div class="user justify-content-between d-flex">
        <div class="thumb">
          <img src="img/blog/c5.jpg" alt="">
        </div>
        <div class="desc">
          <h5><a href="#">Ina Hayes</a></h5>
          <p class="date">December 4, 2017 at 3:12 pm </p>
          <p class="comment">
            Never say goodbye till the end comes!
          </p>
        </div>
      </div>
      <div class="reply-btn">
        <a href="" class="btn-reply text-uppercase">reply</a>
      </div>
    </div>
  </div>
</div>