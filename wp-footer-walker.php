<?php if (!class_exists('Footer_Menu_Walker')) {
  /**
  * Menu Walker that traverses the footer menu, laying out the first level as
  * columns and any subsequent levels as rows.
  *
  * @extends Walker_Nav_Menu
  */
  class Footer_Menu_Walker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
      $indent  = str_repeat("\t", $depth);
      if ($depth > 0) {
        $output .= "\n$indent<ul class=\"footer-menu depth_$depth\">\n";
      } else {
        $output .= "\n$indent<div class=\"col\">\n";
      }
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
      $indent = $depth ? str_repeat("\t", $depth) : '';
      $output .= $indent;

      $attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
      $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
      $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
      $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

      //$item_output = $args->before;
      $item_output .= '<a' . $attributes . '>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</a>';
      //$item_output .= $args->after;

      $output .= ($depth > 0) ? '<li>' : '';
      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
      $output .= ($depth > 0) ? '</li>' : '';
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
      $indent  = str_repeat("\t", $depth);
      if ($depth > 0) {
        $output .= "\n$indent</ul>\n";
      } else {
        $output .= "\n$indent</div>\n";
      }
    }
  }
}
