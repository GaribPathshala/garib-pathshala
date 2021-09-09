$('.livewire-wrapper').on('click', '.date-btn', function () {
    var date = $(this).data('date');
    showDateData(date);
});

Livewire.on('showDateData', function (date) {
    showDateData(date);
})

function showDateData(date) {
    $('.mobileNoCenter').addClass('d-none');
    $('.mobileCenterContainer').removeClass('d-none')

    $('.date-btn').removeClass('clicked'); 
    $(`.date-btn[data-date="${date}"]`).addClass('clicked');

    $('.sessionDateAll').addClass('d-none');
    $(`.sessionDate-${date}`).removeClass('d-none');

    $('.mobileCenterContainer').each( (i, el) => {
        var hasClass = $(el).hasClass(date);
        if (!hasClass) {
            $(el).addClass('d-none');
        }
    });


    if($('.mobileCenterContainer').length == $('.mobileCenterContainer.d-none').length) {
        $('.mobileNoCenter').removeClass('d-none');
    }

}


