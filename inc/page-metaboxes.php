<?php
//register page checkbox options
function wha_get_options_checkboxes()
{
return array(
array('wha_hide_header', 'Hide Header'),
array('wha_hide_footer', 'Hide Footer')
);
}

//return HTML for checkbox
function wha_return_checkbox($postID, $slug, $title)
{
$value = get_post_meta($postID, '_' . $slug, true);
?>
<div class="wha-field wha-checkbox">
    <input type="checkbox" id="<?php echo $slug; ?>" name="<?php echo $slug; ?>" <?php checked($value, 'on'); ?>>
    <label for="<?php echo $slug; ?>"><?php echo $title; ?></label>
</div>
<?php
}

//register page options group
function wha_page_add_custom_box()
{
    $screens = ['page'];
    foreach ($screens as $screen) {
        add_meta_box(
            'wha_box_id',           // Unique ID
            'Page Options Group',  // Box title
            'wha_page_options_group',  // Content callback, must be of type callable
            $screen                   // Post type
        );
    }
}
add_action('add_meta_boxes', 'wha_page_add_custom_box', 10, 0);

function wha_page_options_group($post)
{
    $checkboxes = wha_get_options_checkboxes();

    foreach ($checkboxes as $checkbox) {
        echo wha_return_checkbox($post->ID, $checkbox[0], $checkbox[1]);
    }
}

function wha_page_save_postdata($post_id)
{
    $checkboxes = wha_get_options_checkboxes();
    foreach ($checkboxes as $checkbox) {
        update_post_meta(
            $post_id,
            '_' . $checkbox[0],
            $_POST[$checkbox[0]]
        );
    }

}

add_action('save_post', 'wha_page_save_postdata');