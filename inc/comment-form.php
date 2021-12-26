<?php 

$comments_args = array(
  // change the title of send button 
  'label_submit'=> pll__('Post Comment'),
  // change the title of the reply section
  'title_reply'=> pll__('Leave a Reply'),
  // remove "Text or HTML to be displayed after the set of comment fields"
  'comment_notes_after' => '',
  // redefine your own textarea (the comment body)
  'comment_field' => '<p class="comment-form-comment"><label for="comment">' . pll__('Comment') . '</label><br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
);

comment_form($comments_args);

?>