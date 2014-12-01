<?php

// Custom main-nav walker. http://www.kriesi.at/archives/improve-your-wordpress-navigation-menu-output

class nav_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		 
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
		$output .= $indent . '<li id="item-'. $item->ID . '"' . $value . $class_names .'>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span class="menu-element">';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );	
	}
}

// Custom sub-menu Walker

class sub_nav_walker extends Walker_Nav_Menu {
	var $found_parents = array();

	function start_el(&$output, $item, $depth, $args) {
		
	
		global $wp_query, $item_output;		
		$parent_item_id = 0;		
		$indent = ($depth) ? str_repeat("\t", $depth) : '';		
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
		$class_names = ' class="'.esc_attr($class_names).'"';		
		if (strpos($class_names, 'current-menu-item') || strpos($class_names, 'current-menu-parent') || strpos($class_names, 'current-menu-ancestor') || (is_array($this->found_parents) && in_array($item->menu_item_parent, $this->found_parents))) {			
			$this->found_parents[] = $item->ID;			
			if ($item->menu_item_parent != $parent_item_id) {
				$output .= $indent.'<li'.$class_names.'>';						
				$attributes = !empty($item->attr_title) ? ' title="'.esc_attr($item->attr_title).'"' : '';
				$attributes .= !empty($item->target) ? ' target="'.esc_attr($item->target).'"' : '';
				$attributes .= !empty($item->xfn) ? ' rel="'.esc_attr($item->xfn).'"' : '';
				$attributes .= !empty($item->url) ? ' href="'.esc_attr($item->url).'"' : '';				
				$item_output = $args->before;
				$item_output .= '<a'.$attributes.'>';
				$item_output .= $args->link_before.apply_filters('the_title', $item->title, $item->ID).$args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;
			}
			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		}
	}

	function end_el(&$output, $item, $depth) {
		$parent_item_id = 0;		
		$class_names = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
		$class_names = ' class="'.esc_attr($class_names).'"';
		if (strpos($class_names, 'current-menu-item') || strpos($class_names, 'current-menu-parent') || strpos($class_names, 'current-menu-ancestor') || (is_array($this->found_parents) && in_array($item->menu_item_parent, $this->found_parents))) {
			if (is_array($this->found_parents) && in_array($item->ID, $this->found_parents) && $item->menu_item_parent != $parent_item_id) {
				$output .= "</li>\n";
			}
		}
	}

	function end_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		if (substr($output, -22) == "<ul class=\"sub-menu\">\n") {
			$output = substr($output, 0, strlen($output) - 23);
		} else {
			$output .= "$indent</ul>\n";
		}
	}
}

class sitemap_walker extends Walker_page {
        function start_el(&$output, $page, $depth, $args, $current_page) {
        if ( $depth )
            $indent = str_repeat("\t", $depth);
        else
            $indent = '';
 
        extract($args, EXTR_SKIP);
        $css_class = array('page_item', 'page-item-'.$page->ID);
        if ( !empty($current_page) ) {
            $_current_page = get_page( $current_page );
            _get_post_ancestors($_current_page);
            if ( isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors) )
                $css_class[] = 'current_page_ancestor';
            if ( $page->ID == $current_page )
                $css_class[] = 'current_page_item';
            elseif ( $_current_page && $page->ID == $_current_page->post_parent )
                $css_class[] = 'current_page_parent';
        } elseif ( $page->ID == get_option('page_for_posts') ) {
            $css_class[] = 'current_page_parent';
        }
 
        $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
		
		$visibility = (array)get_post_meta($page->ID, THEME_SLUG.'_visibility', true);
		if(!in_array('sitemap', $visibility)){
		
			$output .= $indent . '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . get_the_title($page->ID) . $link_after .'</a>';
		}
		
        if ( !empty($show_date) ) {
            if ( 'modified' == $show_date )
                $time = $page->post_modified;
            else
                $time = $page->post_date;
 
            $output .= " " . mysql2date($date_format, $time);
        }
    }
}

/***** Sub-Menu *****/

function theme_submenu() {
	
	if (function_exists('wp_nav_menu')) {	
		echo '<div class="sidebar-widget" id="sub-nav">';
		
		wp_nav_menu( array(
			 'container' =>false,
			 'theme_location' => 'Primary Navigation',
			 'sort_column' => 'menu_order',
			 'menu_class' => '',
			 'echo' => true,
			 'before' => '',
			 'after' => '',
			 'link_before' => '',
			 'link_after' => '',
			 'depth' => 0,
			 'walker' => new sub_nav_walker())
		);
		echo '</div><!-- #sub-nav -->';
	}
}
?>