<?php
  class Walker_Header_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
      // print "<pre>";
      // print_r($item);
      // print "</pre>";
      // die();

      if ($depth == 0) {
        $isActive = $item->current || $item->current_item_parent ? 'active' : null;
        $tooltip = $args->walker->has_children ? 'tooltip' : null;

        $output .= '<kemet-popover '. $tooltip .' effect="fade" position="bottom" '. $isActive .'><a slot="trigger" href="'. $item->url .'">'. $item->title . '</a><div slot="content">';
      } else {
        $output .= '<li><a href="' . $item->url . '">'. $item->title;
      }
    }

    function end_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
      if ($depth == 0) {
        $output .= '</div></kemet-popover>';
      } else {
        $output .= '</a></li>';
      }
    }
  }
