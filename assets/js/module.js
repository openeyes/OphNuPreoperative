
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

	$('.addAllergy').click(function(e) {
		e.preventDefault();

		$('.addAllergyFields').slideDown('fast');

		$(this).slideUp('fast');
	});

	$('#allergy_id').change(function(e) {
		if ($(this).val() != '') {
			$('.allergies tbody').append('<tr><td>'+$(this).children('option:selected').text()+'<input type="hidden" name="allergies[]" value="'+$(this).val()+'" /></td><td><a href="#" class="removeAllergy">remove</a></td></tr>');
			$('.allergies tbody tr.no_allergies').hide();
			$('#Element_OphNuPreoperative_PatientHistoryReview_patient_has_no_allergies').removeAttr('checked');
			$('#Element_OphNuPreoperative_PatientHistoryReview_patient_has_no_allergies').attr('disabled','disabled');
			$(this).children('option:selected').remove();

			$('.addAllergyFields').slideUp('fast');
			$('.addAllergy').slideDown('fast');
		}
	});

	$('.removeAllergy').live('click',function(e) {
		e.preventDefault();

		var name = $(this).closest('tr').children('td:first').text().trim();
		var id = $(this).closest('tr').children('td:first').children('input').val();

		$(this).closest('tr').remove();

		$('#allergy_id').append('<option value="'+id+'">'+name+'</option>');

		sort_selectbox($('#allergy_id'));

		if ($('.allergies tbody tr').length == 1) {
			$('.allergies tbody tr.no_allergies').show();
			$('#Element_OphNuPreoperative_PatientHistoryReview_patient_has_no_allergies').removeAttr('disabled');
		}
	});

	$('.cancelAllergy').click(function(e) {
		e.preventDefault();

		$('.addAllergyFields').slideUp('fast');
		$('.addAllergy').slideDown('fast');
	});

});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}
