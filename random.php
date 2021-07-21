<!DOCTYPE html>
	<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width = device-width, initial-scale= 1">
		<title>Ledger</title>
		<!-- Latest compiled and minified CSS -->
		 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="navbar.css">
		<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
      
	</head>
	<body>
<form id="form" name="form" method="post" class="form" role="form" action="[[~[[*id]]]]" enctype="multipart/form-data">

    <input type="hidden" name="id" value="[[+id]]">


    <div class="row">

      <div class="form-group col-sm-6 [[!+fi.error.expires:notempty=` has-error`]]">
        <label for="expires">Expires</label>
        <select name="expires" class="form-control">
          <option value="24">24 hours</option>
          <option value="48">48 hours</option>
          <option value="72">72 hours</option>
          <option value="96">96 hours</option>
        </select>
      </div>

      <div class="form-group col-sm-6 [[!+fi.error.origin:notempty=` has-error`]]">
          <label for="origin">Origin</label>
          <input name="origin" type="text" id="origin" value="" class="form-control">
      </div>

    </div>

    <div class="row">

      <div class="col-sm-12"><label>Tag numbers: </label></div>

      <div class="tag-controls"> 

        <div class="entry col-sm-4">
          <div class="input-group">
            <input class="form-control" name="fields[]" type="text" placeholder="Type something">
            <div class="input-group-btn">
              <button class="btn btn-success btn-add" type="button"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
          </div>
        </div>

      </div>

    </div>

    <div class="row">

      <div class="col-sm-12"><label>Photos: </label></div>

      <div class="image-controls"> 

        <div class="entry col-sm-4">
          <div class="input-group">
            <input class="form-control" name="fields[]" type="text" placeholder="Type something">
            <div class="input-group-btn">
              <button class="btn btn-success btn-add" type="button"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
          </div>
        </div>

      </div>

    </div>   

    <div class="row">

      <div class="col-sm-12"><label>Files: </label></div>

      <div class="file-controls"> 

        <div class="entry col-sm-4">
          <div class="input-group">
            <input class="form-control" name="fields[]" type="text" placeholder="Type something">
            <div class="input-group-btn">
              <button class="btn btn-success btn-add" type="button"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
          </div>
        </div>

      </div>

    </div>

    <div class="form-group">
        <button type="submit" name="submit" id="submit" value="submit" class="btn button-sm btn-primary">Add Special Offering</button>
    </div>

</form>

<script>
$(function(){

    $(document).on('click', '.btn-add', function(e){

        console.log('button clicked');
        e.preventDefault();

        var controlForm = $('.file-controls'),
        currentEntry = $(this).parents('.entry:first'),
        newEntry = $(currentEntry.clone()).appendTo(controlForm);

        console.log(controlForm);
        console.log(currentEntry);
        console.log(newEntry);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
        .removeClass('btn-add').addClass('btn-remove')
        .removeClass('btn-success').addClass('btn-info')
        .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function(e)
        {

        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;

    });

});
</script>
</body>
</html>