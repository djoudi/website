//var ALGOLIA_APPID = '9JUTOYSC0P';
//var ALGOLIA_SEARCH_APIKEY = '1a8a0bdc9bf17ec7fea1046d16055136'
//var ALGOLIA_INDEX_NAME = 'users';
//var NB_RESULTS_DISPLAYED = 5;
//
//var algoliaClient = new algoliasearch(ALGOLIA_APPID, ALGOLIA_SEARCH_APIKEY);
//var index = algoliaClient.initIndex(ALGOLIA_INDEX_NAME);
//
//var lastQuery = '';
//$('#autocomplete-textarea').textcomplete([
//    {
//        match: /(^|\s)@(\w*(?:\s*\w*))$/,
//        search: function(query, callback) {
//            lastQuery = query;
//            index.search(lastQuery, { hitsPerPage: NB_RESULTS_DISPLAYED })
//                .then(function searchSuccess(content) {
//                    if (content.query === lastQuery) {
//                        callback(content.hits);
//                    }
//                })
//                .catch(function searchFailure(err) {
//                    console.error(err);
//                });
//        },
//        template: function (hit) {
//            return hit._highlightResult.username.value;
//        },
//        replace: function (hit) {
//            return ' @' + hit.username.trim() + ' ';
//        }
//    }
//], {
//    footer: '<div style="text-align: center; display: block; font-size:12px; margin: 5px 0 0 0;">Powered by <a href="http://www.algolia.com"><img src="https://www.algolia.com/assets/algolia128x40.png" style="height: 14px;" /></a></div>'
//});

var vm = new Vue({
    // options
});

$(function () {
    $('.panel-comment > .panel-footer > .input-placeholder, .panel-comment > .panel-comment-comment > .panel-comment-textarea > button[type="reset"]').on('click', function(event) {
        var $panel = $(this).closest('.panel-comment');
        $comment = $panel.find('.panel-comment-comment');

        $comment.find('.btn:first-child').addClass('disabled');
        $comment.find('textarea').val('');

        $panel.toggleClass('panel-comment-show-comment');

        if ($panel.hasClass('panel-comment-show-comment')) {
            $comment.find('textarea').focus();
        }
    });
    $('.panel-comment-comment > .panel-comment-textarea > textarea').on('keyup', function(event) {
        var $comment = $(this).closest('.panel-comment-comment');

        $comment.find('button[type="submit"]').addClass('disabled');
        if ($(this).val().length >= 1) {
            $comment.find('button[type="submit"]').removeClass('disabled');
        }
    });
});
//# sourceMappingURL=app.js.map
