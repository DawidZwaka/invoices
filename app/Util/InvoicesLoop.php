<?php

namespace App\Util;

use App\Util\Loop;
use App\Enums\FieldTypes;
use App\Options\Settings;

use WP_Post;

class InvoicesLoop extends Loop
{
    const POSTS_PER_PAGE = 12;
    const action = 'fetch_invoices';
    const post_type = 'invoices';

    public function __construct() {
        $this->registerAjaxListeners();
    }

    public static function getItemData(WP_Post $item): array
    {

        $fields = get_fields($item->ID);

        return [
            'fields' => [
                [
                    'type' => FieldTypes::CHECKBOX,
                    'text' =>  $item->ID
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => "#" . $item->ID
                ],
                [
                    'type' => FieldTypes::IMAGE_WITH_TEXT,
                    'text' => isset($fields['company']) ? get_the_title($fields['company']) : '-',
                    'image' => isset($fields['company']) ? get_the_post_thumbnail_url($fields['company']) : '',
                ],
                [
                    'type' => FieldTypes::STATUS,
                    'text' => $fields['status'] ?? ''
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => $fields['start_date'] ?? '-'
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => $fields['end_date'] ?? '-'
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => isset($fields['total']) ? Settings::currency . $fields['total'] :  '-'
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => isset($fields['fees']) ? Settings::currency . $fields['fees'] :  '-'
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => isset($fields['transfer']) ? Settings::currency . $fields['transfer'] :  '-'
                ],
                [
                    'type' => FieldTypes::TEXT,
                    'text' => $fields['orders'] ?? '-'
                ],
            ],
        ];
    }

    public static function prepareMetaQueryData(): array {
        $status = sanitize_text_field($_POST['status']);
        $startDate = preg_replace("([^0-9/])", "", $_POST['start']);
        $endDate = preg_replace("([^0-9/])", "", $_POST['end']);
        $meta_query = [
            'relation'      => 'AND',
        ];

        if($status) {
            $meta_query[] = [
                'key'       => 'status',
                'value'     => $status,
                'compare'   => '='
            ];
        }

        if($startDate) {
            $meta_query[] = [
                'key'       => 'start_date',
                'value'     => date('Ydm',strtotime($startDate)),
                'type'      => 'NUMERIC',
                'compare'   => '<='
            ];
        }

        if($endDate) {
            $meta_query[] = [
                'key'       => 'end_date',
                'value'     => date('Ydm',strtotime($endDate)),
                'type'      => 'NUMERIC',
                'compare'   => '>='
            ];
        }

        return $meta_query;
    }
}