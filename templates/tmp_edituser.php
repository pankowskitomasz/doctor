<?php

//initial config
DatabaseConnect();
$usr = new TUser($GLOBALS['connection']);
$uid="";
$uname = "";
$upass = "";
$umail = "";

//handle page related actions
if(isset($_POST["edituser"])){
    $usr->getById(htmlspecialchars($_POST["edituser"]));
    $uid = $usr->getData("id");
    $uname = $usr->getData("username");
    $upass = $usr->getData("password");
    $umail = $usr->getData("email");
}
else if(isset($_POST["saveuser"])
&& isset($_POST["usrname"])
&& isset($_POST["usrpass"])
&& isset($_POST["usremail"])
&& !empty($_POST["usrname"])
&& !empty($_POST["usrpass"])
&& !empty($_POST["usremail"])){
    if(isset($_POST["usrid"])){
        $usr->setData("id",htmlspecialchars($_POST["usrid"]));
    }
    $usr->setData("username",htmlspecialchars($_POST["usrname"]));
    $usr->setData("password",sha1(htmlspecialchars($_POST["usrpass"])));        
    $usr->setData("email",htmlspecialchars($_POST["usremail"]));    
    $usr->saveUser();
}

?>

<section class="user-s1 mdc-layout-grid flex bg-blue shadow minh-25vh pt-adjust">
    <div class="mdc-layout-grid__inner w-100">
        <div class="mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--align-middle text-center">
            <div class="text-white text-shadow">
                <h2>
                    <?php
                    if(isset($_POST["edituser"])){
                        echo "Edit user";
                    }
                    else{
                        echo "New user";
                    }
                    ?>
                </h2>
            </div>
        </div>
    </div>
</section>
<section class="user-s2 mdc-layout-grid minh-75vh flex">
    <div class="mdc-layout-grid__inner w-100">
        <div class="mdc-layout-grid__cell--span-12-phone mdc-layout-grid__cell--span-2-tablet mdc-layout-grid__cell--span-3-desktop">
            <form action=""
                autocomplete="off"
                class="mdc-list bg-white border border-blue p-0"
                method="post">
                <div class="mdc-list-item p-0 border-b border-blue">
                    <span class="mdc-list-item__ripple"></span>
                    <input class="mdc-button w-100 text-blue"
                        name="dashboard"
                        type="submit"
                        value="Dashboard">  
                </div>
                <div class="mdc-list-item p-0 border-b border-blue">
                    <span class="mdc-list-item__ripple"></span> 
                    <input class="mdc-button w-100 text-blue"
                        name="messages"
                        type="submit"
                        value="Messages">
                </div>
                <?php 
                    if(isset($_SESSION["UserLogged"])
                    && $_SESSION["UserLogged"]==="administrator"){
                ?>  
                <div class="mdc-list-item p-0 border-b border-blue">
                    <span class="mdc-list-item__ripple"></span> 
                    <input class="mdc-button w-100 text-blue"
                        name="users"
                        type="submit"
                        value="Users">
                </div>
                <?php } ?> 
                <div class="mdc-list-item p-0">
                    <span class="mdc-list-item__ripple"></span> 
                    <input class="mdc-button w-100 text-blue"
                        name="logout"
                        type="submit"                                
                        value="Logout">       
                </div>
            </form>
        </div>
        <div class="mdc-layout-grid__cell--span-12-phone mdc-layout-grid__cell--span-6-tablet mdc-layout-grid__cell--span-9-desktop">
            <div class="mdc-card w-100 h-100 border border-blue p-2">
                <form action=""
                    autocomplete="off"
                    class="w-100 h-100"
                    method="post">                    
                    <div class="mdc-layout-grid border-b border-blue">
                        <div class="mdc-layout-grid__inner">
                            <input type="hidden" 
                                name="usrid" 
                                value="<?php echo $uid; ?>">
                            <div class="mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-3-desktop">
                                <label class="text-blue w-100">User name:</label>
                            </div>
                            <div class="mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-5-tablet mdc-layout-grid__cell--span-9-desktop">
                                <input class="form-control text-center w-100"
                                    name="usrname"
                                    type="text"
                                    tabindex="1"
                                    value="<?php echo $uname; ?>">
                            </div>
                            <div class="mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-3-desktop">
                                <label class="text-blue w-100">Password:</label>
                            </div>
                            <div class="mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-5-tablet mdc-layout-grid__cell--span-9-desktop">                                
                                <input class="form-control text-center w-100"
                                    name="usrpass"
                                    type="password"
                                    tabindex="2"
                                    value="<?php echo $upass; ?>">     
                            </div>   
                            <div class="mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-3-desktop">
                                <label class="text-blue w-100">Email:</label>
                            </div>
                            <div class="mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-5-tablet mdc-layout-grid__cell--span-9-desktop mb-3">
                                <input class="form-control text-center w-100"
                                    name="usremail"
                                    type="email"
                                    tabindex="3"
                                    value="<?php echo $umail; ?>">
                            </div>  
                            <div class="mdc-layout-grid__cell--span-12">
                                <div class="w-100 mb-2">
                                    <small class="text-center">
                                        *Fields cannot be empty, otherwise changes will not be saved
                                    </small>
                                </div>
                                <div class="w-100 p-1">
                                    <button class="mdc-button mdc-button--outlined text-blue float-left border-blue"
                                        name="users"
                                        tabindex="7"
                                        type="submit">
                                        Back
                                    </button>
                                    <button class="mdc-button mdc-button--outlined text-blue float-right border-blue"
                                        name="saveuser"
                                        tabindex="5"
                                        type="submit">
                                        Save
                                    </button>
                                    <button class="mdc-button mdc-button--outlined text-blue float-right border-blue mr-1"
                                        name="clearform"
                                        tabindex="6"
                                        type="clear">
                                        Clear
                                    </button>
                                </div>
                            </div>            
                        </div>
                    </div>           
                </form>
            </div>
        </div>
    </div>
</section>