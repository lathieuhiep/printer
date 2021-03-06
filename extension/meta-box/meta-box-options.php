<?php

add_filter( 'rwmb_meta_boxes', 'printer_register_meta_boxes' );

function printer_register_meta_boxes() {

    /* Start meta box post */
    $printer_meta_boxes[] = array(
        'id'         => 'post_format_option',
        'title'      => esc_html__( 'Post Format', 'printer' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'id'               => 'printer_gallery_post',
                'name'             => 'Gallery',
                'type'             => 'image_advanced',
                'force_delete'     => false,
                'max_status'       => false,
                'image_size'       => 'thumbnail',
            ),

            array(
                'id'            => 'printer_video_post',
                'name'          => 'Video Or Audio',
                'type'          => 'oembed',
            ),


        )
    );
    /* End meta box post */

    return $printer_meta_boxes;

}