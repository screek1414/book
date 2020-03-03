export default {
    data() {
        return {
            page: 1,
            pageSize: 12,
            pageCount: 0,
            allItems: [],
            items: [],
            search_word: ''
        }
    },
    created() {
        this.setupPage()
        this.setupPagination()
    },
    methods: {
        changePage(page) {
            this.setupState(page)
            if (Boolean(this.search_word) === false) {
                window.axios.post(window.location.origin + '/book/items', {
                    page: page,
                    size: this.pageSize
                })
                    .then((response) => {
                        this.items = response.data.books.data
                        this.pageCount = response.data.books.last_page
                    })
            } else {
                window.axios.post(window.location.origin + '/book/search', {
                    page: page,
                    size: this.pageSize,
                    search: this.search_word
                })
                    .then((response) => {
                        this.items = response.data.books.data
                        this.pageCount = response.data.books.last_page
                        window.location += '?current_page=' + this.current_page + '&page_size=' + this.pageSize
                    })
            }
        },
        setupPagination() {
            this.setupPage()
            if (Boolean(this.search_word) === false) {
                window.axios.post(window.location.origin + '/book/items', {
                    page: this.page
                })
                    .then((response) => {
                        this.items = response.data.books.data
                        this.pageCount = response.data.books.last_page
                    });
            } else {
                window.axios.post(window.location.origin + '/book/search', {
                    search: this.search_word
                })
                    .then((response) => {
                        this.items = response.data.books.data
                        this.pageCount = response.data.books.last_page
                    })

            }
        },
        setupState(page) {
            this.page = page
            history.pushState({page: page}, 'title', '?page=' + page)
        },
        setupPage() {
            console.log(history.state)
            this.page = (history.state !== null) ? history.state.page : 1;
        }
    }
}
