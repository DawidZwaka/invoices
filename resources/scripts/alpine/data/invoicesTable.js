import { ajaxEndpoint } from '../../util/wp';

export default (invoices, maxPage) => ({
    'list': [],
    'filtersForm': null,
    'loading': false,
    'action': 'fetch_invoices',
    'maxPage': 1,
    'activePage': 1,
    init() {
        this.filtersForm = this.$refs.filtersForm;
        this.list = invoices;
        this.maxPage = maxPage;

        this.$watch('list', () => this.renderList());
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

        formData.append('action', this.action);
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

    onMarkAsPaidClick() {

    },

    renderList() {

    }
});