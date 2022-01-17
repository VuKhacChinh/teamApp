<?php
include('template/header.php');
?>
<style>
#changeinfor{
    min-height:320px;
    margin: auto;
    margin-top: 200px;
}

#changeinfor legend{
    color: blue;
}

#changeinfor label{
    color: red;
    font-weight: bold;
    font-size: 110%;
}

#changeinfor input[type='text']{
    height: 30px;
    display: block;
    width: 100%;
    border: 1px solid blue;
}

#changeinfor button{
    padding: 5px;
    margin: 5px;
    background-color: 
}

.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.file_label{
    margin-top: 5px;
    padding: 5px;
    font-size: 1.25em;
    font-weight: 700;
    color: #fff;
    background-color: yellow;
    display: inline-block;
    cursor: pointer;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: blue;
}

</style>

<div id='changeinfor'>
    <fieldset class='dangnhap'>
	    <legend >Sửa thông tin</legend>
        <form action='SuaThongTin' method='post' enctype="multipart/form-data">
            <h4 style='text-align:center; color:blue;'>Avata</h4><br>
            <div style='text-align:center'>
                <img id='avata' src='static/<?php echo $avata ?>' alt='avata' style='width:200px;height:200px; border-radius:50%'>
            </div>
            <div style='text-align:center'>
                <input type='hidden' name='avata' value='<?php echo $avata ?>'>
                <input type="file" name="avata" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
                <label class='file_label' for="file">Thay ảnh</label>
            </div>
            <br>
            <label>Họ tên</label>
            <input type='text' name='newname' value='<?php echo $name ?>'>
            <div style='text-align:center;'><button type='submit' name='btnsuathongtin' style='background-color:yellow;'>Thay đổi</button></div>
        </form>
    </fieldset>
    <?php if(isset($Exception)) echo "<h3 style='color:red; text-align:center;'>Thông tin không hợp lệ</h3>"?>
    <?php if(isset($UploadException)) echo "<h3 style='color:red; text-align:center;'>Ảnh không hợp lệ</h3>"?>
    <?php if(isset($success)) echo "<h3 style='color:red; text-align:center;'>Thay đổi thông tin thành công</h3>"?>
</div>
</body>
<script>
    $('.inputfile').change(function(){
        let file_path = $(this).val();
        file_path = file_path.split("\\");
        let file_name = file_path[file_path.length-1];
        $('#avata').attr('src','static/'+file_name);
    });

    // input file
    var inputs = document.querySelectorAll( '.inputfile' );
    Array.prototype.forEach.call( inputs, function( input )
    {
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});
</script>
</html>
