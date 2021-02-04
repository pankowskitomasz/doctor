<?php

DatabaseConnect();
$usr = new TUser($GLOBALS['connection']);

if(isset($_POST["deleteuser"])){
    $usr->deleteUser(htmlspecialchars($_POST["deleteuser"]));
}

//handle user list pagination
if(!isset($_SESSION["CurrentPage"])){
    $_SESSION["CurrentPage"]=1;
}
else{
    if(isset($_POST["prevpage"])
    && $_SESSION["CurrentPage"]>1){
        $_SESSION["CurrentPage"]--;
    }
    if(isset($_POST["nextpage"])
    && $_SESSION["CurrentPage"]<(ceil($usr->getListLength()/PAGE_SIZE))){
        $_SESSION["CurrentPage"]++;
    }
}

?>

<section class="user-s1 mdc-layout-grid flex bg-blue shadow minh-25vh pt-adjust">
    <div class="mdc-layout-grid__inner w-100">
        <div class="mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--align-middle text-center">
            <div class="text-white text-shadow">
                <h2>
                    Users list
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
                    <div class="w-100 mb-3">
                        <button class="mdc-button mdc-button--outlined text-blue float-left"
                            name="edituser"
                            type="submit">
                            New user
                        </button>
                        <div class="float-right">
                            <button class="mdc-button text-blue btn-sm"
                                name="prevpage"
                                type="submit">
                                <span class="mdc-button__ripple"></span>
                                &lt;                                
                            </button>
                            <span class="text-blue">
                                <?php 
                                if(isset($_SESSION["CurrentPage"])){
                                    echo $_SESSION["CurrentPage"]." / ".ceil($usr->getListLength()/PAGE_SIZE);
                                } 
                                ?>
                            </span>
                            <button class="mdc-button text-blue btn-sm"
                                name="nextpage"
                                type="submit">
                                <span class="mdc-button__ripple"></span>
                                &gt;
                            </button>
                        </div>
                    </div>  
                    <div class="w-100 mb-1 text-left d-inline-block p-1">
                        <small class="text-dark-gray">
                            *Administrator account cannot be changed
                        </small>
                    </div>                    
                    <div class="w-100 d-inline-block mb-3">
                        <table class="mdc-data-table__table w-100">
                            <thead>
                                <tr class="mdc-data-table__header-row border-b border-blue">
                                    <th class="mdc-data-table__header-cell text-blue">
                                        ID
                                    </th>
                                    <th class="mdc-data-table__header-cell text-blue"
                                        colspan="2">
                                        User name
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $tab = $usr->getList();
                                    $pstart = ($_SESSION["CurrentPage"]-1)*PAGE_SIZE;
                                    $pend = $pstart+(PAGE_SIZE);
                                    for($i=$pstart;$i<count($tab) && $i<$pend;$i++){
                                        $tabrow = "<tr class=\"mdc-data-table__row\">";
                                        $tabrow .= "<td class=\"mdc-data-table__cell\">";
                                        $tabrow .= $tab[$i][0]."</td>";
                                        $tabrow .= "<td class=\"mdc-data-table__cell\">";
                                        $tabrow .= $tab[$i][1]."</td><td>";
                                        if($tab[$i][1]!=="administrator"){
                                            $tabrow .= "<button type='submit' name='edituser' class='mdc-button mdc-button--outlined border-blue text-blue float-right minw-30px' value='";
                                            $tabrow .= $tab[$i][0]."'>Edit</button>";
                                            $tabrow .= "<button type='submit' name='deleteuser' class='mdc-button mdc-button--outlined border-blue text-blue float-right minw-30px' value='";
                                            $tabrow .= $tab[$i][0]."'>&times;</button>";
                                        }
                                        $tabrow .= "</td></tr>";
                                        echo $tabrow;
                                    }
                                ?>    
                            </tbody>
                        </table>   
                    </div>  
                    <div class="w-100 mb-3">
                        <div class="float-right">
                            <button class="mdc-button text-blue btn-sm"
                                name="prevpage"
                                type="submit">
                                <span class="mdc-button__ripple"></span>
                                &lt;                                
                            </button>
                            <span class="text-blue">
                                <?php 
                                if(isset($_SESSION["CurrentPage"])){
                                    echo $_SESSION["CurrentPage"]." / ".ceil($usr->getListLength()/PAGE_SIZE);
                                } 
                                ?>
                            </span>
                            <button class="mdc-button text-blue btn-sm"
                                name="nextpage"
                                type="submit">
                                <span class="mdc-button__ripple"></span>
                                &gt;
                            </button>
                        </div>
                    </div>           
                </form>
            </div>
        </div>
    </div>
</section>