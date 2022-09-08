<?php 
  session_start();

  if($_SESSION['username'] != true)
  {
      echo "please logIn ";
      header('Location:../Login page/index.php' );
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Profile</title>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>
                <div class="text logo-text">
                    <span class="name">Found </span><span class="profession"> HERE</span>
                </div>

                <i class='bx bx-menu toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../home/index.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-cog icon'></i>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../chatapp/users.php">
                            <i class='bx bx-chat icon'></i>
                            <span class="text nav-text">Messages</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-help-circle icon'></i>
                            <span class="text nav-text">Help Desk</span>
                        </a>
                    </li>

                    <div class="bottom-content">
                        <li class="">
                            <a href="../Login page/log_out.php">
                                <i class='bx bx-log-out icon'></i>
                                <span class="text nav-text">Logout</span>
                            </a>
                        </li>
                    </div>

                </ul>
            </div>


        </div>
    </nav>

    <header class="header">
        <div>
            <h1 class="h1 logo-name"><span>Found</span> Here</h1>
        </div>
    </header>
   
    <div class="container">
        <div class="items">
            <div class="icon-wrapper">
                <i class="fa fa-file-text-o"></i>
            </div>
            <div class="project-name">
            <a href="..\lost something\index.php">
                <img src="lostlogo.png" alt=""> 
           <button class="btn" type="button">Lost Something</button>
          </a>   
        </div>
        </div>
        <div class="items">
            <div class="icon-wrapper">
                <i class="fa fa-th-list"></i>
            </div>
            <div class="project-name">
            <a href="..\found something form\index.php">
                <img src="foundlogo.png" alt=""> 
            <button class="btn" type="button">Found Something</button>
               </a>
            </div>
        </div>
    </div>
    <!-- <footer>
    <nav>
        <a href="#">Privacy</a>
        <a href="#">Terms</a>
        <a href="#">©FoundHere</a>
        <a href="#">Help@FoundHere</a>
    </nav>
</footer> -->
</body>
<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });

    searchBtn.addEventListener("click", () => {
        sidebar.classList.remove("close");
    });
</script>

</html>