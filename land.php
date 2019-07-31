<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144500554-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-144500554-1');
</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>來去台灣博物館</title>

    <!-- FAVIOCN -->
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">

    <!-- 網站META -->
    <!-- 說明最好要設，讓Google搜尋能抓到網站說明 -->
    <meta name="keywords" content="台灣博物館,文物館,歷史收藏">
    <meta name="description" content="台灣博物館介紹網">
    <meta name="author" content="LIN-YI-JYUN">

    <!-- FACEBOOK META -->
    <meta property="og:title" content="台灣博物館">
    <meta property="og:image" content="./img/Geography_03.jpg">
    <meta property="og:description" content="台灣博物館介紹網">
    <meta property="og:site_name" content="台灣博物館">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/coffee.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./packages/core/main.min.css">
    <link rel="stylesheet" href="./packages/bootstrap/main.min.css">
    <!-- PWA -->
    <link rel="manifest" href="manifest.json">

</head>

<body>

    <div id="particles-js"></div>
    <script src="./particles.min.js"></script>
    <script>
        particlesJS.load('particles-js', 'particlesjs-config.json', function () {});
    </script>


    <nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top shadow-sm">

        <div class="container">
            <a class="navbar-brand" href="./index.html">
                <img src="./img/LOGO.png" width="190" height="45" class="d-inline-block align-top" alt="">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.html" style="color:#000">
                            <i class="fas fa-home"></i> 台灣知名博物館
                        </a>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-link" href="./land.php">
                            <i class="fas fa-hotel"></i> 全台博物館資訊
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./map.php" style="color:#000">
                            <i class="fas fa-hotel"></i> 各縣市代表博物館介紹
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./chart.html" style="color:#000">
                            <i class="far fa-copy"></i> 全台博物館分布數
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid" id="loading">
        <div class="row h-100">
            <div class="col-12 text-center align-self-center">
                <img src="./img/loading-coffee.svg" alt="" width="300" height="300">
                <p class="text-white">載入中...</p>
            </div>
        </div>
    </div>




    <?php
//初始化 curl
  $curl = curl_init();
  //識別發出請求的軟體,/瀏覽器類型
  curl_setopt($curl, CURLOPT_USERAGENT,"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36");
  
  //預設為ture,要驗證https ssl憑證
  //如果來源是https網站時,沒有做其他設定會錯誤
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
  //將curl回傳的資料以字串接收,而不是直接顯示
/*   curl_setopt($curl, CURLOPT_RETURNTRANSFER,false); */  //AA
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

  curl_setopt($curl, CURLOPT_URL,"https://cloud.culture.tw/frontsite/trans/emapOpenDataAction.do?method=exportEmapJson&typeId=H");
  


  //curl_exec($curl); //AA
  $result = curl_exec($curl);
  //關閉curl
  curl_close($curl);

  $json=json_decode($result,true);
?>
    <h2 class="aa">全台博物館資訊</h2>





    <div class="container" id="content">
        <div class="row">
            <div class="col-12" style="margin-top:200px">
                <table class="table table-hover table-light table-rwd my-2 rounded" id="showtable"
                    style="overflow:hidden;height:810px" ;>
                    <thead class="thead-dark rounded th-hide">


                        <tr>
                            <td>名稱</td>
                            <td>類型</td>
                            <td style="width:150px;">縣市</td>
                            <td>地址</td>
                            <td>聯絡電話</td>
                        </tr>


                    </thead>
                    <tbody>
                        <?php
                    
                       
                        foreach($json as $val){
                            

                            ?>
                        <tr>
                            <td><?=$val['name']?></td>
                            <td><?=$val['type']?></td>
                            <td><?=$val['cityName']?></td>
                            <td><?=$val['address']?></td>
                            <td><?=$val['phone']?></td>

                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="col-12 text-center text-white rubberBand wow my-2">
                <h1>意見表</h1>
            </div>
            <hr class="hr-white">
            <div class="col-12 text-white">
                <form id="order-form">
                    <div class="form-group">
                        <label for="order-name">姓名</label>
                        <input type="text" name="name" class="form-control" id="order-name" placeholder="請輸入您的姓名"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="order-email">電子信箱</label>
                        <input type="email" name="email" class="form-control" id="order-email" placeholder="請輸入您的電子信箱"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="order-addr">意見說明</label>
                        <input type="text" name="addr" class="form-control" id="order-addr" placeholder="請輸入您的建議"
                            required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="accept" class="form-check-input" id="order-ok" required>
                        <label class="form-check-label" for="order-ok">我同意上述資料屬實</label>
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-info">送出資訊</button>
                    </p>
                </form>
            </div>

        </div>
    </div>
    <div class="container-fluid bg-warning" id="footer" style="margin:30px 0px 0px 0px">
        <div class="row justify-content-center">
            <div class="col-12 text-white text-center">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
                &copy;<script>
                    let d = new Date;
                    document.write(d.getFullYear());
                </script>台灣博物館介紹網
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" class="w-100 modal-img">
                    <br><br>
                    <h6><i class="fas fa-map-marker-alt text-success"></i>&nbsp;&nbsp;地址：<span
                            class="modal-addr"></span></h6>
                    <h6><i class="fas fa-phone-alt text-success"></i>&nbsp;電話：<span class="modal-tel"></span></h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/wow.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap4.min.js"></script>
    <script src="./packages/core/main.min.js"></script>
    <script src="./packages//bootstrap//main.min.js"></script>




    <script>
        $(document).on("readystatechange", function () {
            if (document.readyState == "complete") {
                $("#loading").fadeOut(2000, function () {
                    $("#content").fadeIn(1000);
                    $("#footer").fadeIn(1000);

                    new WOW().init();
                });
            }
        })

        let showtable = $("#showtable").DataTable({
            "language": {
                "url": "./datatables-chinese-traditional.json"
            }
        })


        let i;
        for (i = 1; i <= 17; i++) {
            let num = `#${i}`;
            const dd = document.getElementById(i);
            dd.onmouseover = function () {
                $(num).css("fill", "#FFF");
                // console.log(dd);
            }
            dd.onmouseout = function () {
                $(num).css("fill", "#F79A83");
            }

        }


        //     const dd = document.getElementById(1);
        // dd.onmouseover = function () {
        //     $("#1").css("fill", "#FFF");
        // }
        // dd.onmouseout = function () {
        //     $("#1").css("fill", "#F79A83");
        // }
    </script>
</body>

</html>