<?php
/*
*---------------------------------------------------------------------
* this file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'AnHaiShipWebsite_create_project', 10);

function AnHaiShipWebsite_create_project() {

    /* Start post type template */
    $labels = array(   
        'name'                  =>  _x( 'Dự án', 'post type general name', 'AnHaiShipWebsite' ),
        'singular_name'         =>  _x( 'Dự án', 'post type singular name', 'AnHaiShipWebsite' ),
        'menu_name'             =>  _x( 'Dự án', 'admin menu', 'AnHaiShipWebsite' ),
        'name_admin_bar'        =>  _x( 'Danh sách Dự án', 'add new on admin bar', 'AnHaiShipWebsite' ),
        'add_new'               =>  _x( 'Thêm mới', 'Dự án', 'AnHaiShipWebsite' ),
        'add_new_item'          =>  esc_html__( 'Thêm Dự án', 'AnHaiShipWebsite' ),
        'edit_item'             =>  esc_html__( 'Sửa Dự án', 'AnHaiShipWebsite' ),
        'new_item'              =>  esc_html__( 'Dự án mới', 'AnHaiShipWebsite' ),
        'view_item'             =>  esc_html__( 'Xem dự án', 'AnHaiShipWebsite' ),
        'all_items'             =>  esc_html__( 'Tất cả dự án', 'AnHaiShipWebsite' ),
        'search_items'          =>  esc_html__( 'Tìm kiếm dự án', 'AnHaiShipWebsite' ),
        'not_found'             =>  esc_html__( 'Không tìm thấy', 'AnHaiShipWebsite' ),
        'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thùng rác', 'AnHaiShipWebsite' ),
        'parent_item_colon'     =>  ''
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_icon'          => 'dashicons-open-folder',
        'capability_type'    => 'post',
        'rewrite'            => array('slug' => 'du-an' ),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type('AnHaiShipWebsite_project', $args );
    /* End post type template */

    /* Start taxonomy */
    $taxonomy_labels = array(
        'name'              => _x( 'Danh mục dự án', 'taxonomy general name', 'AnHaiShipWebsite' ),
        'singular_name'     => _x( 'Danh mục dự án', 'taxonomy singular name', 'AnHaiShipWebsite' ),
        'search_items'      => __( 'Tìm kiếm danh mục', 'AnHaiShipWebsite' ),
        'all_items'         => __( 'Tất cả danh mục', 'AnHaiShipWebsite' ),
        'parent_item'       => __( 'Danh mục cha', 'AnHaiShipWebsite' ),
        'parent_item_colon' => __( 'Danh mục cha:', 'AnHaiShipWebsite' ),
        'edit_item'         => __( 'Sửa', 'AnHaiShipWebsite' ),
        'update_item'       => __( 'Cập nhật', 'AnHaiShipWebsite' ),
        'add_new_item'      => __( 'Thêm mới', 'AnHaiShipWebsite' ),
        'new_item_name'     => __( 'Tên mới', 'AnHaiShipWebsite' ),
        'menu_name'         => __( 'Danh mục', 'AnHaiShipWebsite' ),
    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'danh-muc-du-an' ),
    );

    register_taxonomy( 'AnHaiShipWebsite_project_cat', array( 'AnHaiShipWebsite_project' ), $taxonomy_args );
    /* End taxonomy */

}