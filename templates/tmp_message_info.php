<?php

DatabaseConnect();
$messages = new TMessage($GLOBALS['connection']);

?>

<section class="user-s1 mdc-layout-grid flex bg-blue shadow minh-25vh pt-adjust">
    <div class="mdc-layout-grid__inner w-100">
        <div class="mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--align-middle text-center">
            <div class="text-white text-shadow">
                <h2>
                    Message details
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
                    <div class="w-100 p-2 mdc-card--outlined mb-2">
                        <label class="text-blue pb-2">Find message</label>
                        <div class="text-center">
                            <input class="form-control text-center w-80"
                                name="msearch"
                                tabindex="1"
                                type="text">
                            <button class="mdc-button text-blue"
                                name="msgsearch"
                                tabindex="2"
                                type="submit">
                                <span class="mdc-button__ripple"></span>
                                Search
                            </button>
                        </div>
                    </div>
                    <div class="w-100 mb-3">
                        <button class="mdc-button text-blue float-right"
                            name="messages"
                            type="submit">
                            <span class="mdc-button__ripple"></span>
                            Back to list
                        </button>
                    </div>  
                    <div class="w-100 d-inline-block mb-3">
                        <table class="mdc-data-table__table w-100">
                            <thead>
                                <tr class="mdc-data-table__header-row border-b border-blue">
                                    <th class="mdc-data-table__header-cell text-blue w-40px p-1"
                                        colspan="2">
                                        Message details    
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_POST["msginfo"])){
                                        $tab = $messages->getById(htmlspecialchars($_POST["msginfo"]));
                                        if(is_array($tab)){
                                            foreach($tab as $key => $itm){
                                                echo "<tr class=\"mdc-data-table__row\">".
                                                    "<th class=\"text-left mdc-data-table__header-cell text-blue\">".
                                                    ucfirst($key)."</th>". 
                                                    "<td class=\"mdc-data-table__cell\">".$itm."</td>".
                                                    "</tr>";
                                            }
                                        }
                                    }
                                ?>  
                            </tbody>
                        </table>   
                    </div>  
                    <div class="w-100 mb-3">
                        <button class="mdc-button text-blue float-right"
                            name="messages"
                            type="submit">
                            <span class="mdc-button__ripple"></span>
                            Back to list
                        </button>
                    </div>           
                </form>
            </div>
        </div>
    </div>
</section>