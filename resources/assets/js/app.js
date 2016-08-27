
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

	function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( ".patient-login #name" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "/search", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          this.value = terms;
          $("#passcode").focus();
          return false;
        }
      });
})