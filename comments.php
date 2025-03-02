<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Don't load comments if password is required
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ($comment_count === 1) {
                echo '1 Comment';
            } else {
                echo $comment_count . ' Comments';
            }
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
            ));
            ?>
        </ol>

        <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
        <nav class="comment-navigation">
            <div class="nav-previous"><?php previous_comments_link('Older Comments'); ?></div>
            <div class="nav-next"><?php next_comments_link('Newer Comments'); ?></div>
        </nav>
        <?php endif; ?>

    <?php endif; // Check for have_comments() ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note.
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
        <p class="no-comments">Comments are closed.</p>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply'          => 'Leave a Comment',
        'title_reply_to'       => 'Reply to %s',
        'comment_notes_before' => '<p class="comment-notes">Your email address will not be published.</p>',
        'label_submit'         => 'Post Comment',
        'class_submit'         => 'submit-comment',
    ));
    ?>
</div>