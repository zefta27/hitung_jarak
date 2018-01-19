
<html>
<head>
	<title>Hitung Jarak</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">

		<div class="col-md-6 offset-md-3" style="margin-top: 10px;">
			<h3>Hitung Jarak</h3>
			<div class="card">
				<div class="card-body">
					<label for="">Latitude Awal</label><br>
					<input type="text" name="lat1" class="lat1 form-control"><br>
					<label for="">Longitude Awal</label><br>
					<input type="text" name="lng1" class="lng1 form-control"><br>
					<label for="">Latitude Akhir</label><br>
					<input type="text" name="lat2" class="lat2 form-control"><br>
					<label for="">Longitude Akhir</label><br>
					<input type="text" name="lng2" class="lng2 form-control"><br>
					<button class="submit btn btn-primary" type="button">Submit</button>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="result"></div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

</body>
<script>
	var result_jarak = $('.result');
	$('.submit').click(function(){
		result_jarak.text('');
		var formData = {
			'lat1'              : $('input[name=lat1]').val(),
			'lng1'             : $('input[name=lng1]').val(),
			'lat2'              : $('input[name=lat2]').val(),
			'lng2'             : $('input[name=lng2]').val(),
            // 'superheroAlias'    : $('input[name=superheroAlias]').val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'proses_hitung_jarak.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 
                result_jarak.append("<b>Hasil Jarak: "+data.result+" meter </b>");


                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        // alert("test");
     });

</script>
</html>
