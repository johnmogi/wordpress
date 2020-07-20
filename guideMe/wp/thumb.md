https://wordpress.stackexchange.com/questions/241880/if-featured-image-doesnt-exist-show-post-content

if ( has_post_thumbnail() ) {
  the_post_thumbnail();
} else {
  the_content();
}