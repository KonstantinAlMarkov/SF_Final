<?php
class Model_Newprogram extends Model
{	   
    //Создаём программу
    function createProgram(string $UserId, string $ProgramName, string $Description=null, string $URL, string $Price, string $Image=null)
    {            
        $sql = "insert into \"finalProject\".programs(owner,program_name,description, url, price, image) 
        values ('".$UserId."', '".$ProgramName."', '".$Description."', '".$URL."', '".$Price."', '".$Image."');";   
        $result =  $this->db->exec($sql); 
        if($result)
        {
            //Загружаем картинку
            $this->uploadfile();
            return true;
        }  
        return false;
    }

    //удаляем пользователя
    function dropProgram(string $UserLogin)
    {  
        $sql = "delete from \"finalProject\".users where user_login='".$User_login."'";   
        $result =  $this->db->exec($sql); 
        $result = $stmt->FetchAll(PDO::FETCH_NUM);
        return true;
    }

    function uploadfile()
	{       
        $errors = [];
		//добавляем файлы
		if (!empty($_FILES)){
            if($_FILES['program_image']['size']>0)
            {
                foreach($_FILES as $file){
                    $uploadedName=$file['tmp_name'];
                    $fileDir = UPLOAD_DIR.$file['name'];
                    // Проверяем размер
                    if ($file['size'] > UPLOAD_MAX_SIZE) {
                        $errors[] = 'Недопостимый размер файла ' . $fileDir;
                        continue;
                    }
                    // Проверяем формат
                    if (!in_array($file['type'], ALLOWED_TYPES)) {
                        $errors[] = 'Недопустимый формат файла ' . $fileDir;
                        continue;
                    }   

                    // Пытаемся загрузить файл
                    if (!move_uploaded_file($uploadedName,$fileDir)) {
                        $errors[] = 'Ошибка загрузки файла ' . $fileName;
                        continue;
                    }          
                };
                if (empty($errors)) {
                    return true;
                }
                else{
                    foreach($errors as $error)
                    {
                        print "Ошибка: ".$error.'</br>';
                    }
                }
            }
			//скидываем значение
			unset($_FILES);
		}	
		else 
		{
			echo "а файлов-то не было";
		}	
	}
}?>