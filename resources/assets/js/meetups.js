$(document).ready(function() {

    var APPLICATION_ID = 'KAOHBYN8XP'; // Your app id
    var SEARCH_ONLY_API_KEY = 'b12be27d85808a64a0ceb2c7f5bbcc87'; // Please insert you own key
    var INDEX_NAME = 'meetups_production';
    var PARAMS = {
        hitsPerPage: 10000,
    };

    var algolia = algoliasearch(APPLICATION_ID, SEARCH_ONLY_API_KEY);
    var algoliaHelper = algoliasearchHelper(algolia, INDEX_NAME, PARAMS);

    $searchInput = $('#search-input');
    $searchInputIcon = $('#search-input-icon');
    $main = $('main');
    $hits = $('#hits');
    $pagination = $('#pagination');

    var hitTemplate = Hogan.compile($('#hit-template').text());
    var paginationTemplate = Hogan.compile($('#pagination-template').text());
    var noResultsTemplate = Hogan.compile($('#no-results-template').text());

    $searchInput
        .on('keyup', function() {
            var query = $(this).val();
            toggleIconEmptyInput(query);
            algoliaHelper.setQuery(query).search();
        })
        .focus();

    algoliaHelper.on('error', function(error) {
        console.log(error);
    });

    algoliaHelper.on('change', function(state) {
        setURLParams();
    });

    algoliaHelper.on('result', function(content, state) {
        renderHits(content);
        handleNoResults(content);
        renderPagination(content);
    });

    initFromURLParams();
    algoliaHelper.search();


    function renderHits(content) {
        $hits.html(hitTemplate.render(content));
    }

    function handleNoResults(content) {
        if (content.nbHits > 0) {
            $main.removeClass('no-results');
            return;
        }
        $main.addClass('no-results');
        $hits.html(noResultsTemplate.render({query: content.query}));
    }

    function renderPagination(content) {
        var pages = [];
        if (content.page > 3) {
            pages.push({current: false, number: 1});
            pages.push({current: false, number: '...', disabled: true});
        }
        for (var p = content.page - 3; p < content.page + 3; ++p) {
            if (p < 0 || p >= content.nbPages) continue;
            pages.push({current: content.page === p, number: p + 1});
        }
        if (content.page + 3 < content.nbPages) {
            pages.push({current: false, number: '...', disabled: true});
            pages.push({current: false, number: content.nbPages});
        }
        var pagination = {
            pages: pages,
            prev_page: content.page > 0 ? content.page : false,
            next_page: content.page + 1 < content.nbPages ? content.page + 2 : false
        };
        $pagination.html(paginationTemplate.render(pagination));
    }



    $(document).on('click', '.toggle-refine', function(e) {
        e.preventDefault();
        algoliaHelper.toggleRefine($(this).data('facet'), $(this).data('value')).search();
    });
    $(document).on('click', '.go-to-page', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '500', 'swing');
        algoliaHelper.setCurrentPage(+$(this).data('page') - 1).search();
    });
    $searchInputIcon.on('click', function(e) {
        e.preventDefault();
        $searchInput.val('').keyup().focus();
    });
    $(document).on('click', '.remove-numeric-refine', function(e) {
        e.preventDefault();
        algoliaHelper.removeNumericRefinement($(this).data('facet'), $(this).data('value')).search();
    });
    $(document).on('click', '.clear-all', function(e) {
        e.preventDefault();
        $searchInput.val('').focus();
        algoliaHelper.setQuery('').clearRefinements().search();
    });


    function initFromURLParams() {
        var URLString = window.location.search.slice(1);
        var URLParams = algoliasearchHelper.url.getStateFromQueryString(URLString);
        if (URLParams.query) $searchInput.val(URLParams.query);
        if (URLParams.index) $sortBySelect.val(URLParams.index.replace(INDEX_NAME, ''));
        algoliaHelper.overrideStateWithoutTriggeringChangeEvent(algoliaHelper.state.setQueryParameters(URLParams));
    }

    var URLHistoryTimer = Date.now();
    var URLHistoryThreshold = 700;
    function setURLParams() {
        var trackedParameters = ['attribute:*'];
        if (algoliaHelper.state.query.trim() !== '')  trackedParameters.push('query');
        if (algoliaHelper.state.page !== 0)           trackedParameters.push('page');
        if (algoliaHelper.state.index !== INDEX_NAME) trackedParameters.push('index');

        var URLParams = window.location.search.slice(1);
        var nonAlgoliaURLParams = algoliasearchHelper.url.getUnrecognizedParametersInQueryString(URLParams);
        var nonAlgoliaURLHash = window.location.hash;
        var helperParams = algoliaHelper.getStateAsQueryString({filters: trackedParameters, moreAttributes: nonAlgoliaURLParams});
        if (URLParams === helperParams) return;

        var now = Date.now();
        if (URLHistoryTimer > now) {
            window.history.replaceState(null, '', '?' + helperParams + nonAlgoliaURLHash);
        } else {
            window.history.pushState(null, '', '?' + helperParams + nonAlgoliaURLHash);
        }
        URLHistoryTimer = now+URLHistoryThreshold;
    }

    window.addEventListener('popstate', function() {
        initFromURLParams();
        algoliaHelper.search();
    });

    function toggleIconEmptyInput(query) {
        $searchInputIcon.toggleClass('empty', query.trim() !== '');
    }


});