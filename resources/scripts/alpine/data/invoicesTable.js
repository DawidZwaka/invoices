import { ajaxEndpoint } from '../../util/wp';

export default (invoices) => ({
    'list': [],
    'filtersForm': null,
    'loading': false,
    'action': 'fetch_invoices',
    'page': 0,
    init() {
        this.filtersForm = this.$refs.filtersForm;
        console.log(invoices);
        this.list = invoices;

        this.$watch('list', () => this.renderList());
    },

    onFilterChange() {
        const formData = new FormData(this.filtersForm);
        
        this.loading = true;

        formData.append('action', this.action);
        formData.append('page', this.page);

        fetch(ajaxEndpoint, {
            method: "POST",
            body: formData,
        })
            .then(res => res.json())
            .then(({items}) => {
                this.list = items;

                this.loading = false;
            });
    },

    onMarkAsPaidClick() {

    },

    renderList() {

    }
});