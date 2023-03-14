function showImage(result){
    $("#image-compressed").attr("src", result);
    $("#image-compressed").attr("class", "image-compressed");
    $("#download-btn").attr("href", result);
    $("#download-btn").attr("class", "btn-compressed");
}

$("#file-upload").change(function(){
    $("#file-name").text(this.files[0].name);
});

$(function() {
	var rangePercent = $('[type="range"]').val();
	$('[type="range"]').on('change input', function() {
		rangePercent = $('[type="range"]').val();
		$('h4').html(rangePercent+'<span></span>');
        var hello = $('#h4-subcontainer').text();
        $('input[type="range"]').attr("value", hello);
        
		$('[type="range"], h4>span').css('filter', 'hue-rotate(-' + rangePercent + 'deg)');
		// $('h4').css({'transform': 'translateX(calc(-50% - 20px)) scale(' + (1+(rangePercent/100)) + ')', 'left': rangePercent+'%'});
		$('h4').css({'transform': 'translateX(-50%) scale(' + (1+(rangePercent/100)) + ')', 'left': rangePercent+'%'});
	});
});



$('#submit-button').click(function(e) {
    e.preventDefault();
    var formData = new FormData();
    formData.append('file', $('input[type=file]')[0].files[0]);
    formData.append('quility', $('input[type=range]').attr('value'));
    $.ajax({
        url: 'script.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            showImage(data);
            console.log(data);
        },
        cache: false,
        contentType: false,
        processData: false
    });
});