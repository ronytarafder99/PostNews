<?php
if(is_tag()){
    $tag_id = get_queried_object()->term_id;
    $term = get_tag($tag_id);
    $image_id = get_term_meta( $term->term_id, 'showcase-taxonomy-image-id', true );
    $url = get_tag_link($tag_id);
    $title = $term->name;
    if( $image_id ) {
        $media = wp_get_attachment_image_url( $image_id, 'full',true );
    } ?>
<ul class="share-buttons">
    <li>
        <a class="share-twitter"
            href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;"
            target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
    </li>
    <li>
        <a class="share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"
            target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
    </li>
    <li>
        <a class="share-facebook" href="whatsapp://send?text=<?php echo ($title . " " . $url); ?>" target="_blank">
            <i class="fab fA-whatsapp"></i>
        </a>
    </li>
</ul>
<?php } elseif(is_author()){
    $author = get_user_by('slug', get_query_var('author_name'));
    $image_id = esc_url(get_avatar_url($author->ID));
    $url = get_author_posts_url($author->ID);
    $title = $author->display_name;
    if( $image_id ) {
        $media = wp_get_attachment_image_url( $image_id, 'full',true );
    } ?>
    
<ul class="share-buttons">
    <li>
        <a class="share-twitter"
            href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;"
            target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
    </li>
    <li>
        <a class="share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"
            target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
    </li>
    <li>
        <a class="share-facebook" href="whatsapp://send?text=<?php echo ($title . " " . $url); ?>" target="_blank">
            <i class="fab Fa-whatsapp"></i>
        </a>
    </li>
</ul>
<?php 
} else{
        $url = urlencode(get_the_permalink());
        $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
        $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>
<ul class="share-buttons">
    <li>
        <a class="share-twitter"
            href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;"
            target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
    </li>
    <li>
        <a class="share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"
            target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
    </li>
    <li>
        <a class="share-facebook" href="whatsapp://send?text=<?php echo ($title . " " . $url); ?>" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    </li>
</uL>
<?php } ?>