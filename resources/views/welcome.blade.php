<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <p id="euroField"></p>
                </div>

                <div class="links">
                    <a href="https://krasnodar.hh.ru/resume/a7de2f1dff05ce79ba0039ed1f6a31436f3230">Мое резюме</a>
                </div>
            </div>
        </div>

        <script src='http://code.jquery.com/jquery-1.8.3.min.js'></script>

        <script>
            $(function() {
                function AjaxContent() {
                    $.ajax({
                        url: '/getEuro',
                        type: 'GET',
                        success: function(data) {
                            result = JSON.parse(data);
                            $("#euroField").html("Курс евро: " + result + " рублей(ля)");
                            Timer()
                        },
                    })
                }

                function Timer() {
                    setTimeout(AjaxContent(), 10*1000);
                }

                Timer();
            });
        </script>
    </body>
</html>
