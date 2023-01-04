<?php

namespace App\Util;

use Exception;
use WP_Term;

abstract class TaxLoop extends Loop
{
    /**
     * @return void
     * @throws Exception
     */
    public function handleFetchItemsRequest(): void
    {
        $currentPage = sanitize_text_field($_POST['page']);
        $taxQuery = [];

        if (isset($_POST['term_id'])) {
            $taxonomyId = sanitize_text_field($_POST['term_id']);
            $taxonomy = get_term($taxonomyId);

            $taxQuery = [static::buildTaxQueryProp($taxonomy)];
        }

        if (!isset($currentPage)) {
            wp_send_json_error('Page is undefined!', 422);
        }

        $query = static::buildQuery($currentPage, $taxQuery);

        $this->sendItems($query, $currentPage);
    }

    /**
     * @param WP_Term $taxonomy
     * @return array
     */
    public static function buildTaxQueryProp(WP_Term $taxonomy): array
    {
        return [
            'taxonomy' => $taxonomy->taxonomy,
            'field' => 'term_id',
            'terms' => $taxonomy->term_id,
        ];
    }

    protected static function getFiltersFromRequest(): array
    {
        $queryStr = $_SERVER['QUERY_STRING'];
        $term_ids = [];

        if (strlen($queryStr) > 0) {
            $term_ids = array_map(
                fn($param) => explode("=", $param)[1],
                explode("&", $_SERVER['QUERY_STRING'])
            );
        }

        return $term_ids;
    }

    public static function getTaxQueryFromRequest(): array {
        $params = static::getTermsFromRequest();
        $taxQuery = [];

        foreach ($params as $tax_id) {
            $taxQuery[] = static::buildTaxQueryProp(get_term($tax_id));
        }

        return $taxQuery;
    }

    public static function getPosts(int $page = 0): array
    {
        $taxQuery = static::getTaxQueryFromRequest();

        return static::buildQuery($page, $taxQuery)->posts;
    }

    public static function loadMore($taxQuery = null): bool
    {
        $taxQuery = static::getTaxQueryFromRequest();

        return parent::loadMore($taxQuery);
    }
}