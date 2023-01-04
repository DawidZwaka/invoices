<?php

namespace App\Util;

use App\Util\Loop;
use App\Enums\FieldTypes;
use App\Options\Settings;

use WP_Post;

class InvoicesLoop extends Loop
{
    const POSTS_PER_PAGE = 9;
    const action = 'fetch_invoices';
    const post_type = 'invoices';

    public static function getItemData(WP_Post $item): array
    {

        $fields = get_fields($item->ID);

        return [
            'fields' => [
                [
                    'type' => FieldTypes::TEXT,
                    'text' => "#" . $item->ID
                ],
                [
                    'type' => FieldTypes::IMAGE_WITH_TEXT,
                    'text' => get_the_title($fields['company']) ?: '',
                    'image' => get_the_post_thumbnail($fields['company']),
                ],
                [
                    'type' => FieldTypes::STATUS,
                    'text' => $fields['status'] ?: ''
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => $fields['start_date'] ?: ''
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => $fields['end_date'] ?: ''
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => Settings::currency . $fields['total'] ?: ''
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => Settings::currency . $fields['fees'] ?: ''
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => Settings::currency . $fields['transfer'] ?: ''
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => $fields['orders'] ?: ''
                ],
            ],
        ];
    }

    /**
     * Gets the mapped version of WP_Post categories
     *
     * @param WP_Post|null $item
     * @return array
     */
    public static function getItemCategories(?WP_Post $item): array
    {
        $categories = $item ? wp_get_post_categories($item->ID) : get_categories();

        if (is_wp_error($categories) || empty($categories)) {
            return [];
        }

        return array_map(
            fn($cat) => ([
                'name' => get_category($cat)->name,
                'url' => static::getTaxUrl(get_category($cat))
            ]),
            $categories
        );
    }

    /**
     * Gets the mapped version of WP_Post tags
     *
     * @param WP_Post|null $item
     * @return array
     */
    public static function getItemTags(?WP_Post $item): array
    {
        $tags = $item ? get_the_tags($item) : get_the_tags();

        if (is_wp_error($tags) || false === $tags || empty($tags)) {
            return [];
        }

        return array_map(
            fn($tag) => ([
                'name' => $tag->name,
                'url' => static::getTaxUrl($tag)
            ]),
            $tags
        );
    }

    public static function getTaxUrl($tax): string {
        $blog_url = get_permalink( get_field('blog', 'options')['blog_link'] );

        return add_query_arg([
            $tax->taxonomy => $tax->term_id
        ], $blog_url);
    }

    public static function getFilters(): array
    {
        $term_ids = static::getTermsFromRequest();

        $cats = array_map(fn($cat) => [
            'active' => in_array($cat->term_id, $term_ids),
            'id' => $cat->term_id,
            'name' => $cat->name,
            'term_type' => $cat->taxonomy,
            'slug' => $cat->slug,
        ], get_terms(['taxonomy' => 'category', 'hide_empty' => true ]));

        $tags = array_map(fn($cat) => [
            'active' => in_array($cat->term_id, $term_ids),
            'id' => $cat->term_id,
            'name' => "#" . $cat->name,
            'term_type' => $cat->taxonomy,
            'slug' => $cat->slug,
        ], get_terms(['taxonomy' => 'post_tag', 'hide_empty' => true ]));

        return ["categories" => $cats, "tags" => $tags];
    }

    public static function getCurrentFilter(): array
    {
        $term = get_queried_object();

        return [
          'id' => $term->term_id,
        ];
    }
}