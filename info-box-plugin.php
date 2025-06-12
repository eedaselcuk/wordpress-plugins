<?php
/*
Plugin Name: Info Box Plugin
Description: Sayfalara bilgi kutusu ekler.
Version: 1.0
Author: Elif Eda Selçuk
*/

function info_box_shortcode($atts) {
    $atts = shortcode_atts([
        'title' => __('Bilgi Kutusu', 'info-box-plugin'),
        'content' => __('Bu bir örnek içeriktir.', 'info-box-plugin'),
    ], $atts);

    return "<div style='border:1px solid #ccc;padding:10px;'>
                <h3>{$atts['title']}</h3>
                <p>{$atts['content']}</p>
            </div>";
}
add_shortcode('info_box', 'info_box_shortcode');
