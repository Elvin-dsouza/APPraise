<?php
    session_start();
    if($_SESSION['loggedIn'] !=1 ){
        header("location:login.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Appraisal Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/profile-page.css"/>
</head>
    <body>
        <svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <symbol id="icon-exit_to_app" viewBox="0 0 24 24">
                    <title>exit_to_app</title>
                    <path d="M18.984 21c1.078 0 2.016-0.938 2.016-2.016v-13.969c0-1.078-0.938-2.016-2.016-2.016h-13.969c-1.125 0-2.016 0.938-2.016 2.016v3.984h2.016v-3.984h13.969v13.969h-13.969v-3.984h-2.016v3.984c0 1.078 0.891 2.016 2.016 2.016h13.969zM10.078 8.391l2.578 2.625h-9.656v1.969h9.656l-2.578 2.625 1.406 1.406 5.016-5.016-5.016-5.016z"></path>
                </symbol>
                <symbol id="icon-menu" viewBox="0 0 24 24">
                    <title>menu</title>
                    <path d="M3 6h18v2.016h-18v-2.016zM3 12.984v-1.969h18v1.969h-18zM3 18v-2.016h18v2.016h-18z"></path>
                </symbol>
                <symbol id="icon-settings" viewBox="0 0 24 24">
                    <title>settings</title>
                    <path d="M12 15.516c1.922 0 3.516-1.594 3.516-3.516s-1.594-3.516-3.516-3.516-3.516 1.594-3.516 3.516 1.594 3.516 3.516 3.516zM19.453 12.984l2.109 1.641c0.188 0.141 0.234 0.422 0.094 0.656l-2.016 3.469c-0.141 0.234-0.375 0.281-0.609 0.188l-2.484-0.984c-0.516 0.375-1.078 0.75-1.688 0.984l-0.375 2.625c-0.047 0.234-0.234 0.422-0.469 0.422h-4.031c-0.234 0-0.422-0.188-0.469-0.422l-0.375-2.625c-0.609-0.234-1.172-0.563-1.688-0.984l-2.484 0.984c-0.234 0.094-0.469 0.047-0.609-0.188l-2.016-3.469c-0.141-0.234-0.094-0.516 0.094-0.656l2.109-1.641c-0.047-0.328-0.047-0.656-0.047-0.984s0-0.656 0.047-0.984l-2.109-1.641c-0.188-0.141-0.234-0.422-0.094-0.656l2.016-3.469c0.141-0.234 0.375-0.281 0.609-0.188l2.484 0.984c0.516-0.375 1.078-0.75 1.688-0.984l0.375-2.625c0.047-0.234 0.234-0.422 0.469-0.422h4.031c0.234 0 0.422 0.188 0.469 0.422l0.375 2.625c0.609 0.234 1.172 0.563 1.688 0.984l2.484-0.984c0.234-0.094 0.469-0.047 0.609 0.188l2.016 3.469c0.141 0.234 0.094 0.516-0.094 0.656l-2.109 1.641c0.047 0.328 0.047 0.656 0.047 0.984s0 0.656-0.047 0.984z"></path>
                </symbol>
                <symbol id="icon-download" viewBox="0 0 32 32">
                    <title>download</title>
                    <path d="M16 18l8-8h-6v-8h-4v8h-6zM23.273 14.727l-2.242 2.242 8.128 3.031-13.158 4.907-13.158-4.907 8.127-3.031-2.242-2.242-8.727 3.273v8l16 6 16-6v-8z"></path>
                </symbol>
                <symbol id="icon-account_balance" viewBox="0 0 24 24">
                    <title>account_balance</title>
                    <path d="M11.484 0.984l9.516 5.016v2.016h-18.984v-2.016zM15.984 9.984h3v7.031h-3v-7.031zM2.016 21.984v-3h18.984v3h-18.984zM9.984 9.984h3v7.031h-3v-7.031zM3.984 9.984h3v7.031h-3v-7.031z"></path>
                </symbol>
                <symbol id="icon-add" viewBox="0 0 24 24">
                    <title>add</title>
                    <path d="M18.984 12.984h-6v6h-1.969v-6h-6v-1.969h6v-6h1.969v6h6v1.969z"></path>
                </symbol>
                <symbol id="icon-person_pin" viewBox="0 0 24 24">
                    <title>person_pin</title>
                    <path d="M18 15.984v-0.891c0-2.016-3.984-3.094-6-3.094s-6 1.078-6 3.094v0.891h12zM12 5.297c-1.5 0-2.719 1.219-2.719 2.719s1.219 2.672 2.719 2.672 2.719-1.172 2.719-2.672-1.219-2.719-2.719-2.719zM18.984 2.016c1.078 0 2.016 0.891 2.016 1.969v14.016c0 1.078-0.938 2.016-2.016 2.016h-3.984l-3 3-3-3h-3.984c-1.125 0-2.016-0.938-2.016-2.016v-14.016c0-1.078 0.891-1.969 2.016-1.969h13.969z"></path>
                </symbol>
                <symbol id="icon-assignment" viewBox="0 0 24 24">
                    <title>assignment</title>
                    <path d="M17.016 9v-2.016h-10.031v2.016h10.031zM17.016 12.984v-1.969h-10.031v1.969h10.031zM14.016 17.016v-2.016h-7.031v2.016h7.031zM12 3c-0.563 0-0.984 0.422-0.984 0.984s0.422 1.031 0.984 1.031 0.984-0.469 0.984-1.031-0.422-0.984-0.984-0.984zM18.984 3c1.078 0 2.016 0.938 2.016 2.016v13.969c0 1.078-0.938 2.016-2.016 2.016h-13.969c-1.078 0-2.016-0.938-2.016-2.016v-13.969c0-1.078 0.938-2.016 2.016-2.016h4.172c0.422-1.172 1.5-2.016 2.813-2.016s2.391 0.844 2.813 2.016h4.172z"></path>
                </symbol>
            </defs>

        </svg>
        <header>
            <h1>Appraise</h1>
            <h3><?php echo $_SESSION['name'];?></h3>
        </header>
        <nav>
            <?php 
                require_once 'includes/classes/form.php';
                function showButton(){
                    // echo $_SESSION['e_id'];
                    if(Form::exists($_SESSION['e_id']))
                    {
                        $form = new Form($_SESSION['e_id']);
                        echo '<div class="nav-item" id="openForm" data-fid="'.$form->f_id.'"><div class="nav-circ"><svg class="icon"><use xlink:href="#icon-assignment"></use></svg></div><p>Appraisal Form</p></div>';
                    }
                    else {
                        echo '<div class="nav-item" id="createForm"><div class="nav-circ-dotted"><svg class="icon"><use xlink:href="#icon-add"></use></svg></div><p>Create Form</p></div>';
                    }
                }

                showButton();
            
            ?>
           
            <div class="nav-item">
                <div class="nav-circ">
                    <svg class="icon">
                        <use xlink:href="#icon-person_pin"></use>
                    </svg>
                </div>
                <p>Personal Information</p>
            </div>
            <div class="nav-item" id="logoutButton">
                <div class="nav-circ">
                    <svg class="icon">
                        <use xlink:href="#icon-exit_to_app"></use>
                    </svg>
                </div>
                <p>Logout</p>
            </div>
        </nav>
        <script>
            let logoutButton = document.getElementById("logoutButton");
            logoutButton.onclick = function () {
                window.location = "logout.php";
            }
            let createForm = document.getElementById("createForm");
            if(createForm !== null){
                createForm.onclick = function () {
                    window.location = "handler/create_form.php";
                }
            }
           
            let openForm = document.getElementById("openForm");
            if(openForm !== null){
                openForm.onclick = function () {
                    window.location = "pms.php?f_id="+openForm.dataset.fid;
                }
            }
            
        </script>
    </body>
</html>