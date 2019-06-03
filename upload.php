<!DOCTYPE html>
<html>
	<head>
		<title>UPLOADING PHP</title>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="file"><input type="submit" name="submit" value="upload">
		</form>
		<?php
			if(isset($_POST['submit'])){
				$file = $_FILES['file'];
				
				$fileName = $file['name'];
				$fileType = $file['type'];
				$fileTmp = $file['tmp_name'];
				$fileErr = $file['error'];
				$fileSize = $file['size'];
				
				$fileEXT = explode('.',$fileName);
				$fileExtension = strtolower(end($fileEXT));
				
				$allowedExt = array("jpg", "jpeg", "png", "gif");
				
				if(in_array($fileExtension, $allowedExt)){
					if($fileErr === 0){
						if($fileSize < 3000000){
							$newFileName = uniqid('',true).'.'.$fileExtension;
							$destination = "uploads/$newFileName";
							move_uploaded_file($fileTmp, $destination);
							echo "FILE UPLOADED SUCESSFULLY! here is your file <a href='$destination'>Click here</a>";
						} else {
							echo "YOUR FILE IS TOO BIG TO UPLOAD!";
						}
					}else{
						echo "Oops Error Uploading your file";
					}
				}else{
					echo "You have Uploaded a wrong file!";
				}
			}
		?>
	</body>
</html>