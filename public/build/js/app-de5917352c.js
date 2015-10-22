// #1 - Search configuration - To replace with your own
var ALGOLIA_APPID = '9JUTOYSC0P';
var ALGOLIA_SEARCH_APIKEY = '1a8a0bdc9bf17ec7fea1046d16055136'
var ALGOLIA_INDEX_NAME = 'users';
var NB_RESULTS_DISPLAYED = 5;

// #2- Algolia API Client Initialization
var algoliaClient = new algoliasearch(ALGOLIA_APPID, ALGOLIA_SEARCH_APIKEY);
var index = algoliaClient.initIndex(ALGOLIA_INDEX_NAME);

var lastQuery = '';
$('#autocomplete-textarea').textcomplete([
    {
        // #3 - Regular expression used to trigger the autocomplete dropdown
        match: /(^|\s)@(\w*(?:\s*\w*))$/,
        // #4 - Function called at every new keystroke
        search: function(query, callback) {
            lastQuery = query;
            index.search(lastQuery, { hitsPerPage: NB_RESULTS_DISPLAYED })
                .then(function searchSuccess(content) {
                    if (content.query === lastQuery) {
                        callback(content.hits);
                    }
                })
                .catch(function searchFailure(err) {
                    console.error(err);
                });
        },
        // #5 - Template used to display each result obtained by the Algolia API
        template: function (hit) {
            // Returns the highlighted version of the name attribute
            return hit._highlightResult.username.value;
        },
        // #6 - Template used to display the selected result in the textarea
        replace: function (hit) {
            return ' @' + hit.username.trim() + ' ';
        }
    }
], {
    footer: '<div style="text-align: center; display: block; font-size:12px; margin: 5px 0 0 0;">Powered by <a href="http://www.algolia.com"><img src="https://www.algolia.com/assets/algolia128x40.png" style="height: 14px;" /></a></div>'
});
//# sourceMappingURL=app.js.map
