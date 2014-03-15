<?php
/*
Plugin Name: Simple Admin Thumbnail Column
Description: Adds support for a featured image thumbnail column in admin post editor list
Version: 1.0
Author: Scot Rumery
Author URI: http://rumspeed.com/scot-rumery/
License: GPLv2
*/

/*  Copyright 2012  Scot Rumery (email : scot@rumspeed.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


//ADDING SUPPORT FOR FEATURED IMAGE THUMBNAIL IN ADMIN POST LIST
function rum_simple_thumbnail_column($columns) {
    $columns['thumbnail'] = 'Thumbnail';
    return $columns;
}
add_filter('manage_posts_columns', 'rum_simple_thumbnail_column');


function rum_show_thumbnail_column($name) {
    global $post;
    switch ($name) {
        case 'thumbnail':
            $thumbnail = get_the_post_thumbnail($post->ID, array(50,50));
            echo $thumbnail;
    }
}
// for hierarchical => fales post types, use 'manage_posts_custom_column' action hook
add_action('manage_posts_custom_column',  'rum_show_thumbnail_column');



?>