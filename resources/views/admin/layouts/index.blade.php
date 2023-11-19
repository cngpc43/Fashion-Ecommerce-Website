
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include your CSS and other stylesheets here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        html{
            height: 100%;
        }
        a{
            color: black;
            text-decoration: none;
        }
        table{
            border-collapse: collapse;
            color: #515151;
        }
        td,th {
            width: 90px;
            height: 60px;
            text-align: start;
            padding: 0px 5px;
        }
        tr:first-child{
            border-top :1px solid rgb(241, 241, 241);  
            background-color: rgb(241, 241, 241);
        }
        tr{
            border-bottom :1px solid rgb(241, 241, 241);            
        }
        .container{
            display: flex;
            min-height: 1500px;
        }

        .sidebar{
            width: 280px;
            background-color: #263544;
            min-height: 100%;
        }
        .account{
            color: #a7a7be;
            background-color:  #1c2631;
            height: 56px;
            display: flex;
            margin-bottom: 20px;
        }
        .account span{
            margin: auto;
            font-size: 20px;
        }
        .model{
            height: 36px;
            padding: 25px 10px;
            cursor: pointer;
            display: flex;
            text-decoration: none;
            display: flex !important;
            justify-content: center !important;
            flex-direction: column;
        }
        .model:hover{
            background-color: #4d4d4d;
            color:white;
        }
        .model span{
            color: #a7a7be;
            font-size: 18px;
            margin: auto 0 auto 20px;
        }


        /* content */
        .content{
            background-color: #ecf0f5;
            height: 100%;
            width: 100%;
            min-height: 1500px;
        }
        /* Header */
        .header{
            height: 56px;
            background-color: white;

        }
        .logout{
            height: 45px;
            width: 200px;
            right: -16px;
            position: absolute;
            top: 36px;
            border: 1px solid rgba(0,0,0,.15);
            background: #f8f8f8;
            justify-content: space-around;
            display: none;
        }
        .logout::after{
            content: '';
            height: 50px;
            width: 200px;

            position: absolute;
            top: -26px;
            right: 0;
        }
        .header .hello:hover .logout{
            display: flex;
        }
        .logout a{
            height: 30px;
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
            padding:5px 20px;
            margin-top: 7px;
            border-radius: 3px;
        }
        /*  */
        .content-container{
            background-color: white;
            width: 80%;
            padding: 50px;
            margin: 100px auto;
            box-shadow: 0 0 1rem -0.5rem rgba(0,0,0,.2);
            border-radius: 5px;
        }
        .table-name{
            margin: 20px 0 30px 0;
            font-size: 30px;
            color: #4d4d4d;
        }
        .create{
            background-color: #00a65a;
            outline: none;
            border-radius: 3px;
            color: white;
            padding: 8px 12px;
            margin-bottom: 10px;
            cursor: pointer;
            border:none;
        }
        .create:hover{
            background-color: green;
        }
        .table-control{
            background-color: white;
        }
        /* EDIT */
        .form-edit {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            width: 100%;
        }

        .form-edit label {
            flex: 1;
            text-align: right;
            margin-right: 20px;
        }

        .form-edit input {
            flex: 10;
            padding:5px 10px;
            border-radius: 4px;
            outline:none;
            border:1px solid #a7a7be;
        }
        .submit-change-btn{
            margin: 20px 0 10px 0;
            float: right;
            padding: 10px 20px;
            background-color: #3a96ff;
            color: white;
            border:none;
            border-radius: 4px;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <!-- Include the sidebar and content section -->
    <div class="container">
        <div class="sidebar">
                <div class="account">
                    <span>Hoang tu</span>
                </div>
                <a class="model" href="/adminn/users">
                    <span><i style="margin-right: 10px;" class="fa-solid fa-user"></i> Users</span>
                </a>
                <a class="model" href="/adminn/products">
                    <span ><i style="margin-right: 8px;" class="fa-solid fa-socks"></i> Products</span>
                </a>
            </div>
        <div class="content">
            <div class="header">
                <div class="hello" style="position:relative;float: right;margin-right:20px;margin-top:20px;">
                        <span>
                            <i class="fa-regular fa-user"></i>       
                        </span>
                        <span>Hoang tu</span>
                        <div class="logout">
                            <a href="#">Setting</a>
                            <a href="#">Logout</a>
                        </div>
                </div>
            </div>
            <div class="content-container">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Include any JavaScript scripts here -->

    
</body>
@yield('script')
</html>