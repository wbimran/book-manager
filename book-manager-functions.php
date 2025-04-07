<?php
// Shortcode for displaying books in a grid format
function imr_display_books_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'author' => '',
        'year'   => '',
    ), $atts, 'book_list' );

    $args = array(
        'post_type' => 'book',
        'posts_per_page' => -1,
    );

    // Filter by author
    if ( !empty( $atts['author'] ) ) {
        $user = get_user_by( 'slug', $atts['author'] ); // Get user by slug (username)
        if ( $user ) {
            $args['author'] = $user->ID; // Filter by user ID
        }
    }

    // Filter by year
    if ( !empty( $atts['year'] ) ) {
        $args['date_query'] = array(
            array(
                'year' => $atts['year'],
            ),
        );
    }

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        $output = '<div class="book-grid-container">';
        while ( $query->have_posts() ) {
            $query->the_post();
            $output .= '<a class="book-link" href=" ' . get_the_permalink() . ' ">';
            $output .= '<div class="book-grid-item">';
            $output .= '<h3 class="book-title">' . get_the_title() . '</h3>';
            $output .= '<p class="book-excerpt">' . get_the_excerpt() . '</p>';
            $output .= '</div>';
            $output .= '</a>';
        }
        $output .= '</a>';
        wp_reset_postdata();
    } else {
        $output = '<p>No books found.</p>';
    }

    return $output;
}
add_shortcode( 'book_list', 'imr_display_books_shortcode' );
