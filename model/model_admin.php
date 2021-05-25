<?php
class Model_Admin extends Model
{	   
    //получаем список всех пользователей
    function getAllUsers()
    {
        $sql = "select * from \"finalProject\".users usr join
        \"finalProject\".rolesmap rm on usr.user_id = rm.user_id join 
        \"finalProject\".roles rl on rl.role_id = rm.role_id";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);     
        return $result;       
    }

    //получаем список всех программ
    function getAllPrograms()
    {
        $sql = "select * from \"finalProject\".programs";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);     
        return $result;        
    }
    //Общий доход
    function getAllTaxes(){
        $sql = "select SUM(tax) as sum from \"finalProject\".transactions";
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);   
        return $result['sum'];        
    }
    //Количество транзакций
    function countTransactions(){
        $sql = "select COUNT(transaction_id) as totalTrans from \"finalProject\".transactions";
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC); 
        return $result['totaltrans'];        
    }
    //Количество мошеннических переходов
    function countFraud(){
        $sql = "select COUNT(fraud_id) as totalFraud from \"finalProject\".frauds";
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);
        return $result['totalfraud'];        
    }

    //Количество уникальных ссылок
    function countURLS(){
        $sql = "select count(distinct(url)) as urls from \"finalProject\".programs";
        $stmt = $this->db->query($sql);
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);         
        return $result['urls'];     
    }    

}?>