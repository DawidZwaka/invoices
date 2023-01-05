<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Util\InvoicesLoop;

class InvoicesArchive extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive-invoices',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'invoices' => InvoicesLoop::getPosts(),
            'maxPage' => InvoicesLoop::getMaxPage(),
        ];
    }

    public function getInvoices() {
        
    }
}
