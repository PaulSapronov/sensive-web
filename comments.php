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
      $sensive_comment_count = comments_number(); // возвратит число
      if ( comments_open() ) {
        if ( $sensive_comment_count == 0 ) {
          $comments = __('No Comments');
        } elseif ( $sensive_comment_count > 1 ) {
          $comments = $sensive_comment_count . __(' Comments');
        } else {
          $comments = __('1 Comment');
        }
        $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
      } else {
        $write_comments =  __('Comments are off for this post.');
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

  $defaults = [
    'fields'               => [
      'author'             => '<div class="form-group form-inline"><div class="form-group col-lg-6 col-md-6 name">
        <input type="text" class="form-control" id="author" name="author"  value="" placeholder="Ваше Имя"' . esc_attr( $commenter['comment_author'] ) . '" size="30" />
      </div>',
      'email'              => '<div class="form-group col-lg-6 col-md-6 email">
        <input type="email" class="form-control" id="email" name="email" value="" placeholder="Ваш Email адрес"' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"/>
      </div></div>',
      'subject'              => '<div class="form-group ">
        <input type="email" class="form-control" id="subject" name="subject" value="" placeholder="Тема сообщения"' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"/>
      </div>',
      'cookies' => '<p  "class="comment-form-cookies-consent">'.
			'<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="hidden"/>', '
		</p>',
    ],
    'comment_field'        => '<div class="form-group">
      <textarea id="comment" class="form-control mb-10" name="comment" rows="5" placeholder="Сообщение" aria-required="true" required="required"></textarea>
    </div>',
    'must_log_in'          => '<p class="must-log-in">' .
      sprintf( __( 'Вы должны <a href="%s">войти</a> чтобы оставить комментарий.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '
    </p>',
    'logged_in_as'         => '<p class="logged-in-as">' .
      sprintf( __( '<a href="%1$s" aria-label="Вы вошли как %2$s.">Вы вошли как %2$s</a>. <a href="%3$s">Выйти?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '
    </p>',
    'comment_notes_before' => '<p class="comment-notes">
      <span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'.'
    </p>',
    'comment_notes_after'  => '',
    'id_form'              => 'commentform',
    'id_submit'            => 'submit',
    'class_form'           => 'comment-form',
    'class_submit'         => 'button submit_btn',
    'name_submit'          => 'submit',
    'title_reply'          => __( 'Оставьте комментарий' ),
    'title_reply_to'       => __( 'Оставить комментарий %s' ),
    'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
    'title_reply_after'    => '</h4>',
    'cancel_reply_link'    => __( 'Отменить отправку' ),
    'label_submit'         => __( 'Отправить комментарий' ),
    'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
    'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
    'format'               => 'html5',
    'class_container'      => 'comment-form',
  ];
  
  comment_form( $defaults );
	?>
</div><!-- #comments -->