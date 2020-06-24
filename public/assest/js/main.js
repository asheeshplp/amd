$( document ).ready(function() {	
    $('body').on('click', '#cancel', function() {	
		$('.previewdiv').hide();
		$('#previewbtn').show();
		$('#mobile-number').attr('readonly', false);
		$('#from').attr('readonly', false);
		$('#message').attr('readonly', false);
	});
	
	$('body').on('click', '#sendnow', function() {
		$('#sendnow').attr('disabled', true);
		$('.overlay').show();
		var form = $('#sendsmsform');
		$.ajax({
            type: 'post',
            url: '../scripts/sendSMS/index.php',
			dataType: "json",
            data: form.serialize(),
            success: function (response) {
				$('.overlay').hide();
				if(parseInt(response.status) == 200) {
					Swal.fire({
						title: 'Success!',
						text: 'Message sent successfully.',
						icon: 'success'
					});
					$('#sendnow').attr('disabled', false);
					$('.previewdiv').hide();
					$('#previewbtn').show();
					$('#mobile-number').attr('readonly', false);
					$('#from').attr('readonly', false);
					$('#message').attr('readonly', false);
					$('#sendsmsform')[0].reset();
				} else {
					Swal.fire({
						title: 'Oops...',
						text: response.result,
						icon: 'error'
					})
				}
            }
        });
	});	
	
    $('#sendsmsform').on('submit', function (e) {	
		$('.overlay').show();	
		$('#previewbtn').attr('disabled', true);	
        e.preventDefault();		  
        var form = $(this);
        $.ajax({
            type: 'post',
            url: '../scripts/sendSMSAnalyse/index.php',
			dataType: "json",
            data: form.serialize(),
            success: function (response) {
				$('#previewbtn').attr('disabled', false);
				$('.overlay').hide();				
				if(parseInt(response.status) == 200) {
					var showfrom	=	$('#from').val();
					var showmsg		=	$('#message').val();
					$('.previewdiv').show();
					$('#previewbtn').hide();
					$('#mobile-number').attr('readonly', true);
					$('#from').attr('readonly', true);
					$('#message').attr('readonly', true);
					$('#showfrom').html(showfrom);
					$('#showmsg').html(showmsg);
					$('#parts').html(response.result.bodyAnalysis.parts);
					$('#unicode').html(response.result.bodyAnalysis.unicode?'Yes': 'No');
					$('#chars').html(response.result.bodyAnalysis.characters);					
				} else {
					Swal.fire({
						title: 'Oops...',
						text: response.result,
						icon: 'error'
					})
				}
            }
        });
    });
});



$( document ).ready(function() {	
    $('body').on('click', '#cancel', function() {	
		$('.previewdiv').hide();
		$('#previewbtn').show();
		$('#mobile-number').attr('readonly', false);
		$('#from').attr('readonly', false);
		$('#message').attr('readonly', false);
	});
	
	$('body').on('click', '#sendbulksmsnow', function() {
		$('#sendbulksmsnow').attr('disabled', true);
		$('.overlay').show();
		var form = $('#sendbulksmsform');
		$.ajax({
            type: 'post',
            url: '../scripts/campaign/index.php',
			dataType: "json",
            data: form.serialize(),
            success: function (response) {
				$('.overlay').hide();
				if(parseInt(response.status) == 200) {
					Swal.fire({
						title: 'Success!',
						text: 'Message sent successfully.',
						icon: 'success'
					});
					$('#sendbulksmsnow').attr('disabled', false);
					$('.previewdiv').hide();
					$('#previewbtn').show();
					$('#mobile-number').attr('readonly', false);
					$('#from').attr('readonly', false);
					$('#message').attr('readonly', false);
					$('#sendbulksmsform')[0].reset();
				} else {
					Swal.fire({
						title: 'Oops...',
						text: response.result,
						icon: 'error'
					})
				}
            }
        });
	});	
	
    $('#sendbulksmsform').on('submit', function (e) {	
		$('.overlay').show();	
		$('#previewbtn').attr('disabled', true);	
        e.preventDefault();		  
        var form = $(this);
        $.ajax({
            type: 'post',
            url: '../scripts/campaignAnalyse/index.php',
			dataType: "json",
            data: form.serialize(),
            success: function (response) {
				$('#previewbtn').attr('disabled', false);
				$('.overlay').hide();				
				if(parseInt(response.status) == 200) {
					var showfrom	=	$('#from').val();
					var showmsg		=	$('#message').val();
					$('.previewdiv').show();
					$('#previewbtn').hide();
					$('#bulk-number').attr('readonly', true);
					$('#from').attr('readonly', true);
					$('#message').attr('readonly', true);
					$('#showfrom').html(showfrom);
					$('#showmsg').html(showmsg);
					$('#reciptnt').html(response.result.numberOfRecipients);
					var receipntperCountris = response.result.recipientsPerCountry;
					$.each( receipntperCountris, function( key, value ) {
							$( "#recipientCountries" ).append( '<dd>'+key+' : '+value+'</dd>' );});
							
					
					var recipientsPerCountry = response.result.recipientCountries;
					$.each( recipientsPerCountry, function( key, value ) {
							$( "#recipientsPerCountry" ).append( '<dd>'+key+' : '+value+'</dd>' );});		
					$('#parts').html(response.result.bodyAnalysis.parts);
					$('#unicode').html(response.result.bodyAnalysis.unicode?'Yes': 'No');
					$('#chars').html(response.result.bodyAnalysis.characters);					
				} else {
					Swal.fire({
						title: 'Oops...',
						text: response.result,
						icon: 'error'
					})
				}
            }
        });
    });
});




