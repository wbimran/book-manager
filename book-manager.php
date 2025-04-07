<?php
/**
 * Plugin Name: Book Manager
 * Description: The Book Manager plugin allows you to manage books as a custom post type (CPT). It provides a powerful shortcode to display a listing of books, with the ability to filter books by author and year.
 * Version: 1.0
 * Author: Mohammad Imran
 * Text Domain: book-manager
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Include necessary files
require_once plugin_dir_path( __FILE__ ) . 'book-manager-functions.php';

// Hook into WordPress to register the custom post type
add_action( 'init', 'imr_register_books_post_type' );

// Register Book custom post type
function imr_register_books_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Books',
            'singular_name'      => 'Book',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Book',
            'edit_item'          => 'Edit Book',
            'new_item'           => 'New Book',
            'view_item'          => 'View Book',
            'search_items'       => 'Search Books',
            'not_found'          => 'No books found',
            'not_found_in_trash' => 'No books found in Trash',
            'all_items'          => 'All Books',
            'menu_name'          => 'Books',
        ),
        'public' => true,
        'has_archive' => true, // Make sure this is set to true for an archive page
        'rewrite' => array(
            'slug' => 'book',   // This defines the URL structure
            'with_front' => false, // Removes "category" or "archive" prefixes
        ),
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail' ),
        'menu_icon' => 'dashicons-book',
    );
    register_post_type( 'book', $args );
}

// Send email on new book creation
add_action( 'save_post', 'imr_send_new_book_notification' );
function imr_send_new_book_notification( $post_id ) {
    if ( 'book' == get_post_type( $post_id ) && 'publish' == get_post_status( $post_id ) ) {
        $admin_email = get_option( 'admin_email' );
        $book_title = get_the_title( $post_id );
        wp_mail( $admin_email, 'New Book Added: ' . $book_title, 'A new book has been added to the collection.' );
    }
}
