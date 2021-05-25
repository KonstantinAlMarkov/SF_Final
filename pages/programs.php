<div class="container-fluid main">
    <?php if(strcasecmp($userRole,"Клиент")==0):?>
        <nav class="navbar justify-content-end navmenu">
            <a class="btn btn-outline-success my-2 my-sm-0 createNewProgram" href="?page=6">Новая</a>  
        </nav>
    <?php endif;?> 
    <?php if (strcasecmp($userRole,"Вебмастер")==0 ): ?> 
        <?php if(strcasecmp($_GET['mode'],'mine')==0): ?>        
            <div class="row d-flex justify-content-center my-auto navMenu">
                <a class="navbar-brand" href="?page=5" style="color:gray;">ДОСТУПНЫЕ ПРОГРАММЫ</a>
                <a class="navbar-brand" href="?page=5&mode=mine">МОИ ПОДПИСКИ</a>        
            </div>        
        <?php endif;?>  
        <?php if(strcasecmp($_GET['mode'],'mine')!=0): ?>      
            <div class="row d-flex justify-content-center my-auto navMenu">
                <a class="navbar-brand" href="?page=5">ДОСТУПНЫЕ ПРОГРАММЫ</a>
                <a class="navbar-brand" href="?page=5&mode=mine" style="color:gray;">МОИ ПОДПИСКИ</a>        
            </div>        
        <?php endif;?>      
    <?php endif;?>
    <div class="row d-flex justify-content-center my-auto">  
        <?php if (strcasecmp($userRole,"Клиент")==0 || strcasecmp($userRole,"Вебмастер")==0 ): ?> 
            <?php foreach($data['programs'] as $program):?>
                <div class="col program" name="programName">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row d-flex flex-column programNameRow">
                                <span id="programNameP"><?php echo $program['program_name'];?></span>
                            </div>
                            <?php if ($program['image'] && file_exists("./data/uploads/".$program['image'])): ?> 
                                <div class="row justify-content-center d-flex flex-column programImageRow">
                                    <img src="./data/uploads/<?php echo $program['image'];?>" class="img-fluid rounded-circle" alt="programImage" id="programImage">
                                </div>
                            <?php else: ?>
                                <div class="row justify-content-center d-flex flex-column programImageRow">
                                    <img src="./data/uploads/default.png" class="img-fluid rounded-circle" alt="programImage" id="programImage">
                                </div>                    
                            <?php endif;?>
                            <div class="row justify-content-center d-flex flex-column programRewardRow">
                                <span id="rewardP">стоимость перехода:</span>
                                <span id="rewardPrice"><?php echo $program['price'];?> р.</span>
                            </div>
                            <div class="row my-auto buttons">
                                <?php if(strcasecmp($userRole,"Клиент")==0): ?>  
                                    <div class="col-12 justify-content-center">
                                        <a href="?page=7&programId=<?php echo $program['program_id'];?>" id="detailsProgram">Изменить</a>
                                    </div>
                                <!--    <div class="col-6 justify-content-center">
                                        <a href="#" id="subsctibeU">Удалить</a>   
                                    </div> -->
                                <?php endif;?>                                                            
                            </div>
                            <div class="row my-auto buttons">
                                <?php if(strcasecmp($userRole,"Вебмастер")==0): ?>  
                                    <div class="col-6 justify-content-center">
                                        <a href="?page=7&programId=<?php echo $program['program_id'];?>" id="detailsProgram">Посмотреть</a>
                                    </div>
                                    <?php if(strcasecmp($_GET['mode'],'mine')==0): ?>        
                                        <div class="row d-flex justify-content-center my-auto navMenu">
                                            <div class="col-6 justify-content-center">
                                                <a href="#" id="subsctibeU" style="pointer-events: none;">Отписаться</a>   
                                            </div>
                                        </div>        
                                    <?php endif;?>  
                                    <?php if(strcasecmp($_GET['mode'],'mine')!=0): ?>      
                                        <div class="row d-flex justify-content-center my-auto navMenu">
                                            <div class="col-6 justify-content-center">
                                                <a  href="?page=8&program_id=<?php echo $program['program_id'];?>" id="subsctibeU">Подписаться</a>   
                                            </div>       
                                        </div>        
                                    <?php endif;?>   
                                <?php endif;?>                                                            
                            </div>
                        </div>
                    </div>
                </div>                                  
            <?php endforeach; ?>
        <?php endif;?> 
    </div>
</div>