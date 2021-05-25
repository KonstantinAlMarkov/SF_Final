<?php
class Model_Login extends Model
{	   
    //Проверям, существует ли пользователь
    function getUser(string $User_login, string $Password, string $Hash, string $Ip, string $Insip='')
	{
        // проверяем, не существует ли пользователя с таким именем
        $sql = "select user_id, user_password, user_status from \"finalProject\".users where user_login = '$User_login' LIMIT 1";      
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);      

        if($result['user_password']===md5(md5($_POST['password'])))
        {
            // Записываем в БД новый хеш авторизации и IP
            $sql = "update \"finalProject\".users set user_hash='".$Hash.$Insip."', user_ip='".$Ip."' where user_id='".$result['user_id']."';";           
            $createResult=$this->db->prepare($sql); 
            $createResult->execute();
            if($createResult->rowCount()>0)
            {
                if(strcasecmp($result['user_status'],"active")==0)
                {
                    return $result['user_id'];
                } else
                {
                    return null;                   
                }

            }  
            return null;
        } 
        else 
        {
            return null;
        }              
    }
}?>