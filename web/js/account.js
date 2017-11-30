$(function () {
    controlHint('.account__sidebar .hint-link', '.account');

    // Copy to clipboard for 'referal bonus'.
    $(".referal__copy-btn").on('click', copyToClipboard);


    // Init 'add adress' popup.
    initColorbox('.add-adress__link', {
        href: '.add-adress-popup',
        inline: true,
        width: 'auto',
        height: 'auto'
    });
    
    //customize select
    $('.sort-form__select').select2({
        placeholder: 'По теме',
        minimumResultsForSearch: 5
    });

});

function copyToClipboard() {
    var copyText = $(".referal__copy-input");
    copyText.select();
    document.execCommand("Copy");
}