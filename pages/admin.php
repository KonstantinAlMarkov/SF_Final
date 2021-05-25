<div class="row justify-content-center">
    <div class="col-10">
            <div class="row d-flex justify-content-center userRow">
                <div class="col">
                    <div class="row"></div>
                        <div class="navbar justify-content-end navmenu">  
                            <a class="btn btn-success navbar-btn" href="?page=3">Новый</a>  
                        </div>
                    <div class="row justify-content-center">
                        <table class="table table-fixed users">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Фамилия</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Логин</th>    
                                <th scope="col">Роль</th>   
                                <th scope="col">Статус</th>    
                              </tr>
                            </thead>
                            <tbody>
                                <?php if (count($data['users'])): ?> 
                                    <?php foreach($data['users'] as $user):?>
                                        <tr>
                                            <td><?php echo $user['user_id'];?></td>
                                            <td><?php echo $user['user_surname'];?></td>
                                            <td><?php echo $user['user_name'];?></td>
                                            <td><?php echo $user['user_login'];?></td>
                                            <td><?php echo $user['role_name'];?></td> 
                                            <th scope ="col">                                            
                                                <?php if(strcasecmp($user['user_status'],"active")==0): ?>  
                                                    <a class="btn btn-outline-success my-2 my-sm-0 changeStatus" href="?page=10&status=0&user_id=<?php echo $user['user_id'];?>">Активный</a>   
                                                <?php endif;?> 
                                                <?php if(strcasecmp($user['user_status'],"active")!=0): ?> 
                                                    <a class="btn btn-outline-success my-2 my-sm-0 changeStatus" href="?page=10&status=1&user_id=<?php echo $user['user_id'];?>">Отключен</a>   
                                                <?php endif;?>                                                                                         
                                        </tr>                                    
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </tbody>
                          </table>
                    </div>               
                </div>
            </div>
            <div class="row justify-content-center statsRow">
                <div class="col">
                    <div class="row statsData d-flex align-items-center">
                        <div class="col-6" >
                            <span class="profit" href="#">Общий доход: <?php echo $data['taxes']; ?></a>   
                        </div>
                        <div class="col-6">
                            <ul class="list-group">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                      Количество переходов
                                      <span class="badge bg-primary rounded-pill"><?php echo $data['transactions'] ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                      Количество ссылок
                                      <span class="badge bg-primary rounded-pill"><?php echo $data['urls'] ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                      Количество отказов
                                      <span class="badge bg-primary rounded-pill"><?php echo $data['frauds'] ?></span>
                                    </li>
                                </ul>                     
                        </div>                    
                    </div>
                <div> 
            </div>
        </div>
    </div>
</div>

