
/* Module-specific javascript can be placed here */

$(document).ready(function() {
	handleButton($('#et_save'),function() {
	});

	handleButton($('#et_cancel'),function(e) {
		if (m = window.location.href.match(/\/update\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/update/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+OE_patient_id;
		}
		e.preventDefault();
	});

	handleButton($('#et_deleteevent'));

	handleButton($('#et_canceldelete'));

	handleButton($('#et_print'),function(e) {
		printIFrameUrl(OE_print_url, null);
		enableButtons();
		e.preventDefault();
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});

	$(".collapse").hide();

	$("input:radio").each(function(){
		if($(this).is(':checked') && $(this).val()==1){
			$(this).closest("fieldset").next(".collapse").show();
		}
	});

	$(document.body).on('click', '[type="radio"]', function(e) {
		var button = $(e.currentTarget);
		var div = button.closest("fieldset").next(".collapse");
		if(div)	{
			button.val()==1 ? div.show() :	hideAndBlank(div);
		}
	});

	function hideAndBlank(div) {
		div.hide();
		div.find('input').removeAttr('checked');
		div.find('[type=text]').val('');
		div.find('a.MultiSelectRemove').map(function() {
			$(this).click();
		});
	}

	$('#Element_OphNuPreoperative_BaselineObservations_bloodsugar_na').click(function() {
		if ($(this).is(':checked')) {
			$('#Element_OphNuPreoperative_BaselineObservations_blood_sugar').attr('disabled','disabled');
			$('#Element_OphNuPreoperative_BaselineObservations_blood_sugar').val('');
		} else {
			$('#Element_OphNuPreoperative_BaselineObservations_blood_sugar').removeAttr('disabled');
		}
	});

	$('input[name="Element_OphNuPreoperative_PreoperativeAssessment[iol_side_id]"]').click(function() {
		switch ($('input[name="Element_OphNuPreoperative_PreoperativeAssessment[iol_side_id]"]:checked').val()) {
			case '1':
				$('.IOLright').hide();
				$('.IOLleft').show();
				$('#Element_OphNuPreoperative_PreoperativeAssessment_right_iol_type_id').val('');
				$('#Element_OphNuPreoperative_PreoperativeAssessment_right_iol_size').val('');
				$('#div_Element_OphNuPreoperative_PreoperativeAssessment_right_iol_type_id').show();
				$('#div_Element_OphNuPreoperative_PreoperativeAssessment_right_iol_size').show();
				break;
			case '2':
				$('.IOLright').show();
				$('.IOLleft').hide();
				$('#Element_OphNuPreoperative_PreoperativeAssessment_left_iol_type_id').val('');
				$('#Element_OphNuPreoperative_PreoperativeAssessment_left_iol_size').val('');
				$('#div_Element_OphNuPreoperative_PreoperativeAssessment_right_iol_type_id').show();
				$('#div_Element_OphNuPreoperative_PreoperativeAssessment_right_iol_size').show();
				break;
			case '3':
				$('.IOLright').show();
				$('.IOLleft').show();
				$('#div_Element_OphNuPreoperative_PreoperativeAssessment_right_iol_type_id').show();
				$('#div_Element_OphNuPreoperative_PreoperativeAssessment_right_iol_size').show();
				break;
		}
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}
