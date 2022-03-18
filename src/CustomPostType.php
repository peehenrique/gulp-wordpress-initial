<?php

namespace Visia;

use PostTypes\PostType;

class CustomPostType {

    public function __construct() {
        $this->registerExample();
    }

    public function registerExample() {
        $names = [
            'name' => 'example',
            'singular' => 'Example',
            'plural' => 'Examples',
            'slug' => 'example'
        ];

        (new PostType($names))
            ->labels([
                'add_new' => __('Add new example'),
                'add_new_item' => __('Add example'),
                'new_item' => __('New example'),
                'edit_item' => __('Edit example'),
                'view_item' => __('Show example'),
                'view_items' => __('Show examples'),
                'search_items' => __('Search examples'),
                'all_items' => __('All examples'),
                'not_found' => __('Example not found'),
                'not_found_in_trash' => __('Example not found in trash')
            ])
            ->options([
                'has_archive' => false,
                'supports' => ['title'],
                'publicly_queryable' => true,
                'show_in_rest' => false,
                'rewrite' => array('slug' => 'example', 'with_front' => false)
            ])
            ->register();
    }
}
