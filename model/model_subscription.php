<?php
class Model_Subscription extends Model
{	   
    //Проверям, существует ли пользователь
    function checkSubscription(string $User_id, string $Program_id)
	{
        // проверяем, не существует ли пользователя с таким именем
        $sql = "select subsription_id from \"finalProject\".subscriptions where user_id = '$User_id' AND program_id = '$Program_id' LIMIT 1";
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);

        if($result)
        {
            return true;
        } 
        else 
        {
            return false;
        }              
    }

    //Проверям, существует ли пользователь
    function subscribe(string $User_id, string $Program_id, string $URL)
	{
        // проверяем, не существует ли пользователя с таким именем
        $sql = "insert into \"finalProject\".subscriptions(user_id, program_id,link) 
        values('".$User_id."', '".$Program_id."', '".$URL."')";  
        $result =  $this->db->exec($sql);           
    }

    // получаем URL из программы
    function getProgramURL($Program_id){        
        $sql = "select * from \"finalProject\".programs where program_id = '$Program_id' LIMIT 1";      
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);
    
        if($result['url'])
        {
            return $result['url'];
        }
        else{
            return null;
        }
    }

}?>