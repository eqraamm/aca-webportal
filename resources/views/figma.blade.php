<html>
    <head>Test figma</head>
    <style>
        .test{
            position: absolute;
            width: 323px;
            height: 1024px;
            left: 0px;
            top: 0px;

            background: #FFFFFF;
            box-shadow: 0px 8px 50px rgba(0, 0, 0, 0.15);
            border-radius: 0px 20px 20px 0px;
        }
        .rectangle-125{
            position: absolute;
            width: 300px;
            height: 91px;
            left: 12px;
            top: 129px;

            background: #FFFFFF;
            box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.15);
            border-radius: 15px;
        }
        .img-logo{
            position: absolute;
            width: 121px;
            height: 81px;
            left: 98px;
            top: 20px;
        }
        .img-user{
            position: absolute;
            left: 0%;
            right: 0%;
            top: 0%;
            bottom: 0%;

            background: #153183;
        }
    </style>
    <body>
        <div class="test">
            <img class="img-logo" src="{{asset('dist/img/aca_new.png')}}" alt="AdminLTE Logo">
            <div class="rectangle-125">
                <img src="{{asset('dist/img/user.png')}}" class="img-user" alt="User Image" />
            </div>
        </div>
    </body>
</html>