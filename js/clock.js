(function(Drupal, $) {
    "use strict";

    Drupal.behaviors.clockBlock = {
        attach: function(context, settings) {
            function ticker() {
                var date = new Date();
                $(context).find('.clock').html(date.toLocaleTimeString() + '<br/>Your IP address is: ' + settings.clock.ip);
            }
            $(document).find('.clock').once('clockBlock').append();
            // console.log("The clock's name is: " + settings.clock.name);
            // console.log("Your IP address is: " + settings.clock.ip);
            setInterval(function() {
                ticker();
            }, 1000);
        }
    }

})(Drupal, jQuery);