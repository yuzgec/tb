// Demo 2 Js file
$(document).ready(function () {
    'use strict';

    // Deal of the day countdown
	if ( $.fn.countdown ) {
		$('.deal-countdown').each(function () {
			var $this = $(this),
				untilDate = $this.data('until'),
				compact = $this.data('compact');

			$this.countdown({
			    until: untilDate, // this is relative date +10h +5m vs..
			    format: 'HMS',
			    padZeroes: true,
			    labels: ['years', 'ay', 'hafta', 'gün', 'saat', 'dakika', 'saniye'],
			    labels1: ['year', 'ay', 'hafta', 'gün', 'saat', 'dakika', 'saniye']
			});
		});

		// Pause
		// $('.deal-countdown').countdown('pause');
	}
});
