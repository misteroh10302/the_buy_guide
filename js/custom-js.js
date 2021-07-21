
// On Load
$(() => {


    /**
     * Custom Navigation Functions
     */
    const $MASTHEAD = $('#masthead');

    const CHANGE_NAV_ON_SCROLL = () => {

        if (window.scrollY > 2) {
            $MASTHEAD.addClass('scrolled');
        } else {
            $MASTHEAD.removeClass('scrolled');
        }
    }


    window.addEventListener('scroll', CHANGE_NAV_ON_SCROLL);

});