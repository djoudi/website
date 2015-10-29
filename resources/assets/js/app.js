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