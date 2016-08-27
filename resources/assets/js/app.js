
window.jQuery(function () {
	$('#reportDate').datetimepicker();

	var deleteLinks = document.querySelectorAll('.delete');

	for (var i = 0; i < deleteLinks.length; i++) {
	  deleteLinks[i].addEventListener('click', function(event) {
	      event.preventDefault();
	      var id = this.getAttribute('data-confirm');
	      var choice = confirm("Are you sure you want to delete?");

	      if (choice) {
	      	 document.getElementById(id).submit();
	       // window.location.href = this.getAttribute('href');
	      }
	  });
	}

  	$("#add-new-test").click(function () {
  		html = '';
  		html += '<div class="form-group col-md-4">';
          html += '<label for="contact">Test</label>';
          html += '<input  name="test[]" type="text" class="form-control" id="test" placeholder="Test">';
      	html += '</div>';

      	html += '<div class="form-group col-md-4">';
          html += '<label for="contact">Result</label>';
          html += '<input  name="result[]" type="text" class="form-control" id="result" placeholder="Result">';
      	html += '</div>';

      	html += '<div class="form-group col-md-4">';
          html += '<label for="contact">Remarks</label>';
          html += '<input  name="comment[]" type="text" class="form-control" id="comment" placeholder="Remarks">';
      	html += '</div>';
  		
  		$(".test-form").append(html).slideDown();
  	})
  
    $( ".patient-login #name" ).autocomplete({
      source: "/search",
      minLength: 2,
      select: function( event, ui ) {
        $("#passcode").focus();
      }
    });
})