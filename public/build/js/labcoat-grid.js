//Set up the data object with everything you need to be reactive. this includes
//pagination, current page, search strings, and the data object for each tab.
//currently, the labcoat_grid object is defined in the view template.

labcoat_grid.pagination = { activeTab: "" };
//labcoat_grid.search = {};
$.each(labcoat_grid.tabs, function (index, value) {
    if (typeof (value.itemsPerPage) === 'undefined') {
        labcoat_grid.tabs[index].itemsPerPage = 10;
    }
    if (typeof (value.deleteUrl) === 'undefined') {
        labcoat_grid.tabs[index].deleteUrl = null;
    }
    if (typeof (value.resetPaginationOnSort) === 'undefined') {
        labcoat_grid.tabs[index].resetPaginationOnSort = false;
    }
    if (typeof (value.exclude) === 'undefined') {
        labcoat_grid.tabs[index].exclude = [];
    }
    if (typeof (value.include) === 'undefined') {
        labcoat_grid.tabs[index].include = [];
    }
    if(labcoat_grid.tabs[index].include.length > 0 && labcoat_grid.tabs[index].exclude.length > 0) {
        console.error(labcoat_grid.tabs[index].label + " Grid: Please specify EITHER an array of columns to include OR an array of columns to exclude.");
    }
    if (typeof (value.data) === 'undefined') {
        labcoat_grid.tabs[index].data = [];
    }
    if (typeof (value.loaded) === 'undefined') {
        labcoat_grid.tabs[index].loaded = false;
    }
    if (typeof (value.sortOrder) === 'undefined') {
        labcoat_grid.tabs[index].sortOrder = 1;
    } else {
        switch (value.sortOrder) {
            case "desc":
                labcoat_grid.tabs[index].sortOrder = -1;
                break;
            case "asc":
                labcoat_grid.tabs[index].sortOrder = 1;
                break;
            default:
                labcoat_grid.tabs[index].sortOrder = 1;
                break;
        }
    }
    labcoat_grid.search = "";
    labcoat_grid.selector = ".tab-content td:visible";
    labcoat_grid.pagination[value.label] = {
        itemsPerPage: value.itemsPerPage,
        currentPage: 0,
        search: "",
        totalPages: 0,
        resultCount: 0,
        sortKey: "",
        render: {
            pageNumbers: [],
            ellipses: []
        }
    };
});

Vue.component('anchor-tag', {
    template: "{{{anchorLink}}}",
    props: {
        attributes: {
            type: Object,
            required: true
        },
        contents: {
            type: String,
            required: true
        }
    },
    computed: {
        anchorLink: function(){
            var link = "<a";
            for (var property in this.attributes) {
                if (this.attributes.hasOwnProperty(property) && property != "textContent") {
                    link += " " + property + '="' + this.attributes[property] + '"';
                }
            }
            link += ">" + this.attributes.textContent + "</a>";
            return link;
        }
    }
});
Vue.component('input-tag', {
    template: "{{{inputField}}}",
    props: {
        attributes: {
            type: Object,
            required: true
        },
    },
    computed: {
        inputField: function(){
            var input = "<input";
            for (var property in this.attributes) {
                if (["checked", "disabled", "readonly", "selected", "required", "multiple"].indexOf(property) >= 0 && this.attributes[property] === false) {
                    delete(this.attributes[property]);
                }
                if (this.attributes.hasOwnProperty(property)) {
                    input += " " + property + '="' + this.attributes[property] + '"';
                }
            }
            input += ">";
            return input;
        }
    }
});

var vm = new Vue({
    el: '#tabbed-table',
    data: labcoat_grid,
    filters: {
        //cribbed from https://github.com/vuejs/Discussion/issues/181
        paginate: function (list, tabLabel) {
            //must specify which tab is being processed to prevent crossing the streams
            this.updatePageCount(tabLabel);
            this.pagination[tabLabel].resultCount = list.length;
            if (list.length === 0) {
                return false;
            }

            this.defineVisiblePageNumbers(tabLabel);

            var index = this.pagination[tabLabel].currentPage * this.pagination[tabLabel].itemsPerPage;
            return list.slice(index, index + this.pagination[tabLabel].itemsPerPage);
        },
        highlightResults: function (arr, search) {
            if (search == "") {
                $(this.selector).removeHighlight();
            }
            if (search != this.search) {
                this.search = search;
                this.highlightResults();
            }
            return arr;
        }
    },
    methods: {
        setPage: function (tabLabel, pageNumber) {
            if (this.pagination[tabLabel].currentPage != pageNumber) {
                this.pagination[tabLabel].currentPage = pageNumber;
            }
            this.$nextTick(function () {
                this.initializeDeleteButton();
                this.highlightResults();
            });
        },
        previousPage: function (tabLabel) {
            var pageNumber = this.pagination[tabLabel].currentPage;
            if (pageNumber > 0) {
                this.setPage(tabLabel, pageNumber - 1);
            }
        },
        nextPage: function (tabLabel) {
            var pageNumber = this.pagination[tabLabel].currentPage;
            if (pageNumber < this.pagination[tabLabel].totalPages - 1) {
                this.setPage(tabLabel, pageNumber + 1);
            }
        },
        setActiveTab: function (tabLabel) {
            if (this.pagination.activeTab != tabLabel) {
                this.pagination.activeTab = tabLabel;
                this.search = this.pagination[tabLabel].search;
                this.$nextTick(function () {
                    this.highlightResults();
                });
            }
            this.initializeDeleteButton();
            this.$nextTick(function () {
                this.highlightResults();
            });
        },
        getActiveIndex: function (tabLabel) {
            for (var index=0, len = this.$data.tabs.length; index < len; index++) {
                if (this.$data.tabs[index].label.toLowerCase() == tabLabel.toLowerCase()) {
                    return index;
                }
            }
        },
        sortBy: function (event) {
            //if column isn't intended to be sortable, bail.
            if ($(event.target).data("column").search("_input") != -1) {
                return false;
            }
            //alter selected column state to indicate new sort order
            if($(event.target).data("sort-order") == "asc") {
                $(event.target).data("sort-order", "desc");
            } else {
                $(event.target).data("sort-order", "asc");
            }

            var index = this.getActiveIndex($(event.target).closest(".tab-pane").attr("id"));
            //check config value of resetPaginationOnSort and set page to 1 if true.
            if (this.$data.tabs[index].resetPaginationOnSort) {
                this.setPage(this.$data.tabs[index].label, 0);
            }

            this.$data.tabs[index].sortKey = $(event.target).data("column");
            if (this.$data.tabs[index].data[0].hasOwnProperty(this.$data.tabs[index].sortKey + "_sort")) {
                this.$data.tabs[index].sortKey += "_sort";
            }
            if (this.$data.tabs[index].data[0][$(event.target).data("column")].hasOwnProperty("textContent")) {
                this.$data.tabs[index].sortKey += ".textContent";
            }
            this.$data.tabs[index].sortOrder = $(event.target).data("sort-order") == "asc" ? 1 : -1;
            this.$root.$options.filters.orderBy(
                this.$data.tabs[index],
                $(event.target).data("column"),
                this.$data.tabs[index].sortKey
            );
        },
        updatePageCount: function (tabLabel) {
            var resultCount = this.pagination[tabLabel].resultCount,
                pageCount = Math.ceil(resultCount / this.pagination[tabLabel].itemsPerPage);
            this.pagination[tabLabel].totalPages = pageCount;
            if (this.pagination[tabLabel].currentPage >= pageCount && pageCount > 0) {
                this.setPage(tabLabel, pageCount - 1, null);
            }
            this.initializeDeleteButton();
        },
        defineVisiblePageNumbers: function (tabLabel) {
            var pages = [];
            var countPages = this.pagination[tabLabel].totalPages;
            if (this.pagination[tabLabel].totalPages <= 10) {
                for (i=1; i <= countPages; i++) {
                    pages.push(i);
                }
                this.pagination[tabLabel].render.pageNumbers = pages;
                return true;
            }
            var countAround = 1;
            var out = '';
            var current = this.pagination[tabLabel].currentPage;
            var ellipses = [];
            for (i=1; i <= countPages; i++) {
                if (countAround >= 1 && i > 2 && i < countPages && Math.abs(i - current) > countAround) {
                    pages.push(i);
                    ellipses.push(i);
                    i = (i < current ? current - countAround : countPages - 1);
                }
                pages.push(i);
            }
            this.pagination[tabLabel].render.pageNumbers = pages;
            this.pagination[tabLabel].render.ellipses = ellipses;
            return true;
        },
        /*
        * Vue needs some time to update the model binding before highlighting can work.
        * use this.$nextTick() to delay that process.
        */
        highlightResults() {
            this.$nextTick(function () {
                $(this.selector).removeHighlight().highlight(this.search);
            });
        },
        initializeDeleteButton() {
            $("#tabbed-table a[data-delete-url], #tabbed-table button[data-delete-url]").attr('data-delete-url', function(){
                var url = $(this).attr('data-delete-url');
                url = url.replace(/%7B\S+%7D/g, $(this).attr('data-delete-id'));
                $(this).attr('data-delete-url', url);
            })
            deleteSetup();
        }
    },
    created: function () {
        var self = this;
        $.each(this.tabs, function (index, value) {
            if (self.pagination.activeTab === "") {
                self.pagination.activeTab = value.label;
            }
            $.getJSON(this.url, function (data) {
                this.data = data;
                self.tabs[index].loaded = !self.tabs[index].loaded;
            }.bind(this), function (data, index) {
                var tabLabel = data.label;
                self.updatePageCount(tabLabel);
            });
        });
    }
});
