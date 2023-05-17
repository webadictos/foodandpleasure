<?php

/**
 * Funciones útiles para obtener la categoría principal de una entrada
 */


class WA_Articles extends WA_Module
{

    public function init()
    {
        $this->loader->add_filter('reading_time', $this, 'reading_time', 10, 1);
    }

    public function article_item_attributes($_atts = array(), $post_id = 0)
    {
        global $post;

        if (!$post_id) $post_id = get_the_ID();

        $atts = array(
            'post-id' => $post_id,
        );

        $atts = array_merge($atts, $_atts);

        $attributes = apply_filters('article_item_attributes', $atts, $post_id);

        $data_attributes = array();

        foreach ($attributes as $attribute_key => $attribute_value) {
            $data_attributes[] = "data-{$attribute_key}=\"{$attribute_value}\"";
        }

        echo implode(" ", $data_attributes);
    }

    public function article_attributes($_atts = array(), $post_id = 0)
    {
        if (!$post_id) $post_id = get_the_ID();

        $slug = str_replace(get_home_url(), "", get_the_permalink($post_id));

        $atts = array(
            'post-id' => $post_id,
            'slug' => $slug,
        );

        $atts = array_merge($atts, $_atts);

        $attributes = apply_filters('article_item_attributes', $atts, $post_id);

        $data_attributes = array();

        foreach ($attributes as $attribute_key => $attribute_value) {
            $data_attributes[] = "data-{$attribute_key}=\"{$attribute_value}\"";
        }

        echo implode(" ", $data_attributes);
    }

    public function reading_time($post_id = 0)
    {
        if (!$post_id) $post_id = get_the_ID();

        $content = get_post_field('post_content', $post_id);
        $word_count = str_word_count(strip_tags($content));
        $readingtime = ceil($word_count / 200);
        if ($readingtime == 1) {
            $timer = " min.";
        } else {
            $timer = " mins.";
        }
        $totalreadingtime = $readingtime . $timer;

        return $totalreadingtime;
    }
}

function wa_article_item_attributes($atts = array(), $post_id = 0)
{
    if (is_a($GLOBALS['WA_Theme'], 'WA_Theme')) {

        global $post;

        if (!$post_id) $post_id = get_the_ID();

        $GLOBALS['WA_Theme']->helper('articles')->article_item_attributes($atts, $post_id);
    }
}



function wa_article_attributes($atts = array(), $post_id = 0)
{
    if (is_a($GLOBALS['WA_Theme'], 'WA_Theme')) {

        global $post;

        if (!$post_id) $post_id = get_the_ID();

        $GLOBALS['WA_Theme']->helper('articles')->article_attributes($atts, $post_id);
    }
}
