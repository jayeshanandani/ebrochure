$(function() {
    function getData(selectedValue, targetUrl, destination) {
        $.ajax({
            type: 'get',
            url: targetUrl,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            },
            success: function(response) {
                if (response.pages) {
					destination.empty(),
					destination.append('<option value="0">Please Select</option>');
					appendData(response.pages, destination); // Another from duch with the appendData function added as well, but not working either.
                }
            },

            error: function(response) {
                alert("An error occurred: " + e.responseText.message);
                console.log(response);
            }
        });
    }

	function appendData(data, destination) {
		for (var prop in data) {
			if (data.hasOwnProperty(prop)) {
			$(destination).append('<option value="' + prop + '">' + data[prop] + '</option>');
			}
		}
	}

    $('#brochures').change(function() {
        var selectedValue	=	$(this).val(),
            destination 	=	$('#pages');

		if(selectedValue != '') {
            targetUrl = $(this).attr('rel') + '?id=' + selectedValue;
            getData(selectedValue, targetUrl, destination);

		}	else {
        destination.empty(),
        destination.append('<option value="0">Select Brochure First</option>');
		}
    });
});
