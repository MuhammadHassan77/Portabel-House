var outer_camera = "5e5e2f12-3796-4af2-95f0-b2e232c07e72";
var interior_camera = 'a94013e1-3284-41fd-849c-679cc080a535';
//inner camera and outer camera function //
function innercamera() {
	var cameras = clara.scene.getAll({ type: 'Camera', property: 'name' });
	clara.player.animateCameraTo(interior_camera, 300);
}

function outercamera() {
	var cameras = clara.scene.getAll({ type: 'Camera', property: 'name' });
	clara.player.animateCameraTo(outer_camera, 300);
}

$(document).ready(function () {

	// start-model-btn
	$('.navigator').click(function () {
		$(".right-popup").addClass('d-none');
		$($(this).data('tab')).removeClass('d-none');

		// $('.arrows-1').css('left', '33%');
	})

	// start=checkbox
	$('.tab-switch input').click(function () {
		// console.log($(this))
		if ($(this).prop("checked") == true) {
			$(".switch-li-2").addClass('d-none');
			$('.switch-li-1').removeClass('d-none');
			outercamera();
		}
		else if ($(this).prop("checked") == false) {
			$(".switch-li-1").addClass('d-none');
			$('.switch-li-2').removeClass('d-none');
			innercamera();
		}
	})
	// end-checkbox

	// start-close-btn
	$('.close-btn').click(function () {
		$('.right-popup').addClass('d-none');
		$('.arrows-1').css('left', '44%');
	})
	// end-close-btn

	// start-model-tab
	$('.size-btn').click(function () {
		$('.style-content').hide();
		$('.size-content').show();
	})

	$('.style-btn').click(function () {
		$('.size-content').hide();
		$('.style-content').show();
	})
	// end-model-tab

	// start-active-btns

	// start-tab-1
	$('.tab-1-rw .popup-btn').click(function () {
		$('.tab-1-rw .popup-btn').removeClass('active-btn');
		$(this).addClass('active-btn');
	})

	$('.size-btn-rw .popup-btn').click(function () {
		$('.size-btn-rw .popup-btn').removeClass('active-btn');
		$(this).addClass('active-btn');
	})
	// end-tab-1

	// start-tab-2
	$('.wall-btn-rw .popup-btn').click(function () {
		$('.wall-btn-rw .popup-btn').removeClass('active-btn');
		$(this).addClass('active-btn');
	})
	// start-tab-2

	// start-tab-3
	$('.dorwin-btn-rw .popup-btn').click(function () {
		$('.dorwin-btn-rw .popup-btn').removeClass('active-btn');
		$(this).addClass('active-btn');
	})
	// start-tab-3

	// start-tab-4
	$('.floor-btn-rw .popup-btn').click(function () {
		$('.floor-btn-rw .popup-btn').removeClass('active-btn');
		$(this).addClass('active-btn');

		$('.floor-types').addClass('d-none');
		$($(this).data('floor')).removeClass('d-none');
	})

	$('.floor-seemr-btn').click(function () {
		$('.marble-more-item').show();
		$(this).hide();
	});
	// start-tab-4

	// end-active-btns


	// end-model-btn


	// start-media-quiery

	function myFunction(x) {
		if (x.matches) {
			$('.close-btn').click(function () {
				$('.right-popup').addClass('d-none');
				$('.arrows-1').css('left', '35%');
			})
		} else {

		}
	}

	var x = window.matchMedia("(max-width: 576px)")
	myFunction(x)
	x.addListener(myFunction)

	// end-media-quiery


})//end-documen-ready
