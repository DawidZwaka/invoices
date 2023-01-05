import { ajaxEndpoint } from '../../util/wp';

export default (invoices, maxPage) => ({
    'list': [],
    'filtersForm': null,
    'loading': false,
    'maxPage': 1,
    'activePage': 1,
    init() {
        this.filtersForm = this.$refs.filtersForm;
        this.list = invoices;
        this.maxPage = maxPage;
    },

    onFilterChange() {

        this.activePage = 1;
        this.fetchItems();
    },

    onPaginationClick(index) {
        this.activePage = index;

        this.fetchItems();
    },

    fetchItems() {
        const formData = new FormData(this.filtersForm);
        
        this.loading = true;

        formData.append('action', 'fetch_invoices');
        formData.append('page', this.activePage - 1);

        fetch(ajaxEndpoint, {
            method: "POST",
            body: formData,
        })
            .then(res => res.json())
            .then(({items, maxPage}) => {
                this.list = items;
                this.maxPage = maxPage;

                this.loading = false;
            });
    },

    getCheckboxes() {
        return document.querySelectorAll('[x-ref="markAsPaid"]');
    },

    onMarkAsPaidClick() {
        const checks = this.getCheckboxes();
        const formData = new FormData(this.filtersForm);
        
        this.loading = true;

        formData.append('action', 'invoice_mark_as_paid');

        checks.forEach( check => {
            formData.append('checks[]', check.value);
        });

        fetch(ajaxEndpoint, {
            method: "POST",
            body: formData,
        })
            .then(() => this.fetchItems());
    },

    onSelectAll() {
        const checks = this.getCheckboxes();

        checks.forEach( check => check.checked = this.$el.checked);
    },
});