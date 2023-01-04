<?php

namespace App\Util;

use Exception;
use WP_Post;
use WP_Query;

abstract class Loop
{
    const POSTS_PER_PAGE = 8;
    const action = null;
    const post_type = null;

    /**
     * @param WP_Query $query
     * @param int $currentPage
     * @return void
     * @throws Exception
     */
    protected function sendItems(WP_Query $query, int $currentPage)
    {
        $loadMore = true;

        $resources = array_map(
            fn($item) => static::getItemData($item),
            $query->posts
        );

        if (($currentPage + 1) * static::POSTS_PER_PAGE >= $query->found_posts) {
            $loadMore = false;
        }

        wp_send_json([
            'items' => $resources,
            'loadMore' => $loadMore
        ]);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function handleFetchItemsRequest(): void
    {
        $currentPage = sanitize_text_field($_POST['page']);

        if (!isset($currentPage)) {
            wp_send_json_error('Page is undefined!', 422);
        }

        $query = static::buildQuery($currentPage);

        $this->sendItems($query, $currentPage);
    }

    /**
     * @param WP_Post $item
     * @return array
     */
    public static function getItemData(WP_Post $item): array
    {
        try {
            throw new Exception('You should implement this method!');
        } catch (Exception $er) {
            echo $er;
        }
    }

    /**
     * @param int $page
     * @param array | null $tax_query
     * @return WP_Query
     */
    public static function buildQuery(int $page = 0, array $tax_query = null): WP_Query
    {
        return new WP_Query([
            'post_type' => static::post_type,
            'post_status' => 'publish',
            'order' => 'DESC',
            'orderby' => 'date',
            'posts_per_page' => static::POSTS_PER_PAGE,
            'offset' => static::POSTS_PER_PAGE * $page,
            'tax_query' => $tax_query,
        ]);
    }

    public static function getPosts(int $page = 0): array
    {
        return array_map(
            fn($item) => static::getItemData($item),
            static::buildQuery($page)->posts
        );
    }

    public static function loadMore($taxQuery = null): bool
    {
        $query = static::buildQuery(0, $taxQuery);

        return $query->found_posts > static::POSTS_PER_PAGE;
    }
}