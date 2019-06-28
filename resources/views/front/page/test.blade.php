<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>

	<script>

		uploadfile();
		    // var reader = new FileReader();
	     //    reader.onload = function (e) {                   
	     //        var byteArray = new Uint8Array(e.target.result);
	     //        uploadfile(file.name, byteArray);
	     //    }
	     //    reader.readAsArrayBuffer(file);

		// this is function to upload file

		       function uploadfile(name, content) {

		    var createitem = new SP.RequestExecutor(appweburl);
		    createitem.executeAsync({
		        url: appweburl + "/_api/web/GetFolderByServerRelativeUrl('/sites/Filer/Filer/Lists/DropBoard/" + currentuser + "')/Files/Add(url='"+ name +"',overwrite=true)",
		        method: "POST",
		        headers: { "Accept": "application/octet-stream", "x-requestforceauthentication": true},
		        body: content,
		        success: function () { alert("done"); },
		        error: function () { alert("Error"); },        
		    });    
		}


	</script>
</body>
</html>