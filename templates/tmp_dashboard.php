<section class="user-s1 mdc-layout-grid flex bg-blue shadow minh-25vh pt-adjust">
    <div class="mdc-layout-grid__inner w-100">
        <div class="mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--align-middle text-center">
            <div class="text-white text-shadow">
                <h2>
                    Dashboard
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
            <div class="mdc-card w-100 h-100 border border-blue">
                <small class="text-blue p-2">Dashboard</small>
            </div>
        </div>
    </div>
</section>