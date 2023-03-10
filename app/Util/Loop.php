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

    public function registerAjaxListeners() {
        add_action('wp_ajax_nopriv_' . static::action, [$this, 'handleFetchItemsRequest']);
        add_action('wp_ajax_' . static::action, [$this, 'handleFetchItemsRequest']);
    }

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
        
        wp_send_json([
            'items' => $resources,
            'maxPage' => $query->max_num_pages,
            'activePage' => $query->page_id + 1
        ]);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function handleFetchItemsRequest(): void
    {
        $currentPage = sanitize_text_field($_POST['page']);
        $search = sanitize_text_field($_POST['search']);

        if (!isset($currentPage)) {
            wp_send_json_error('Page is undefined!', 422);
        }

        $query = static::buildQuery($currentPage, static::prepareMetaQueryData(), $search);

        $this->sendItems($query, $currentPage);
    }

    /**
     * @return array
     */
    public static function prepareMetaQueryData(): array
    {
        try {
            throw new Exception('You should implement this method!');
        } catch (Exception $er) {
            echo $er;
        }
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
    public static function buildQuery(int $page = 0, array $meta_query = null, string $search = null): WP_Query
    {
        return new WP_Query([
            'post_type' => static::post_type,
            'post_status' => 'publish',
            's' => $search,
            'order' => 'DESC',
            'orderby' => 'date',
            'posts_per_page' => static::POSTS_PER_PAGE,
            'offset' => static::POSTS_PER_PAGE * $page,
            'meta_query'    => $meta_query
        ]);
    }

    public static function getPosts(int $page = 0): array
    {
        return array_map(
            fn($item) => static::getItemData($item),
            static::buildQuery($page)->posts
        );
    }

    public static function getMaxPage(): float
    {
        return static::buildQuery()->max_num_pages;
    }

}