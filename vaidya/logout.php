<?php
session_start();
session_destroy();
echo "<script>window.location.href='log.php?user_logged_out';</script>";

exit;
?>



body {
    min-height: 100vh;
    background-color:#CDCDCD ;
    background-image: url(1.jpg);
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
    height: 150vh;
}

header {
    background:transparent;
    margin: 0;padding: 0;
    height: 50px;
    display: flex;
    align-items: center;

}
p{
    margin: 10px;
}
header * {
    display: inline;
}
header li {
    margin: 20px;
}
header li a {
    color: black;
    text-decoration: none;
}
.head-text{
    -webkit-animation: rotate-top 0.5s cubic-bezier(0.455, 0.030, 0.515, 0.955) both;
            animation: rotate-top 0.5s cubic-bezier(0.455, 0.030, 0.515, 0.955) both;
}


.sub{
    margin-right: 15px;
    margin-left: auto;
    color:black;
}
review{
    padding: 0px;
    margin: 0px;
}