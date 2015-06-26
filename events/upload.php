<!-- ?php
		$path_to_directory = 'events/'; // папка, куда будет загружаться заявка
			
		if(preg_match('/[.](DOC)|(doc)|(DOCX)|(docx)$/',$_FILES['fupload']['name'])) // проверка формата исходного файла
		{	
			$filename = $_FILES['fupload']['name'];
			$source = $_FILES['fupload']['tmp_name'];	
			$target = $path_to_directory . $filename;
			move_uploaded_file($source, $target); // загрузка заявки в папку $path_to_directory

/* 			if(preg_match('/[.](DOC)|(doc)$/', $filename)) {
			$im = imagecreatefromgif($path_to_directory.$filename) ; // если оригинал был в формате doc
			}
			if(preg_match('/[.](DOCX)|(docx)$/', $filename)) {
			$im = imagecreatefrompng($path_to_directory.$filename) ; // если оригинал был в формате docx */

			/* imagejpeg($filename, $path_to_directory.$random., $quality); */
			
			echo "Заявка успешно отправлена";
		} else {
			echo "Загружать можно только документы в формате .doc или .docx";
		}
? -->


<!-- ?php

	$OrganizerID = 12;
   if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает 3 МБ");
     exit;
   } else {
		if(preg_match('/[.](DOC)|(doc)|(DOCX)|(docx)$/',$_FILES['filename']['name'])) // проверка формата исходного файла
		{
			// Проверяем загружен ли файл
			if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
			{
				// Если файл загружен успешно, перемещаем его из временной директории в конечную
				move_uploaded_file($_FILES["filename"]["tmp_name"], "B:/Programming/Xampp/htdocs/cpvdvfu/events/".$_FILES["filename"]["name"]);
			} else {
					echo("Ошибка загрузки файла");
					}
		}
   }

? -->

 
<?php
$uploaddir = 'B:/Programming/Xampp/htdocs/cpvdvfu/events/';
$uploadfile = $uploaddir.basename($_FILES['filename']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}

echo 'Некоторая отладочная информация:';
print_r($_FILES);

print "</pre>";

?>


<!--?php
if(isset($_POST['filename']))
{
   if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["filename"]["tmp_name"], "B:/Programming/Xampp/htdocs/cpvdvfu/events/".$_FILES["filename"]["name"]);
   } else {
      echo("Ошибка загрузки файла");
   }
}
? -->