/* Function borrowed from phpMyAdmin
 */
function confirm_delete(theLink) {
    // Confirmation is not required in the configuration file
    // or browser is Opera (crappy js implementation)
    if (typeof(window.opera) != 'undefined') {
        return true;
    }

    var is_confirmed = confirm('Are you really sure you want to do this ?');
    if (is_confirmed) {
        theLink.href += '&deletion_confirmed=1';
    }

    return is_confirmed;
}

function submit_if_confirm(question, form) {
	var isConfirmed = confirm(question);

	if (isConfirmed) form.submit();
}