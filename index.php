<?php
// URL yang akan diakses
$url = "https://github.com/agus096?tab=repositories";

// Inisialisasi cURL session
$ch = curl_init($url);

// Set opsi cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Eksekusi cURL dan simpan hasilnya
$response = curl_exec($ch);

// Cek apakah ada kesalahan cURL
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

// Tutup sesi cURL
curl_close($ch);

// Temukan posisi awal dan akhir dari bagian yang diinginkan
$start = strpos($response, '<ul data-filterable-for="your-repos-filter" data-filterable-type="substring">');
$end = strpos($response, '</ul>', $start);

// Pemotongan string untuk mendapatkan bagian yang diinginkan
$result = substr($response, $start, $end - $start + strlen('</ul>'));

// Ganti href dalam hasil respons dengan domain + href yang diinginkan
$newDomain = "https://www.github.com";
$realink = str_replace('href="/agus096/', 'href="' . $newDomain . '/agus096/', $result);

$pattern = '/<span[^>]*\s*title="(\d+)"[^>]*>(\d+)<\/span>/i';
preg_match($pattern, $response, $matches);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Portofilio - agus budiman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/style.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: jetFont;
            src: url(asset/font/JetBrainsMono-Light.ttf);
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="container card">
        <div class="row">
            <div class="col-sm-3">
                <div class="user-profile__avatar shadow-effect text-center">
                    <img class="img-responsive center-block" src="https://avatars.githubusercontent.com/u/100041629?v=4" alt="...">
                    Agus budiman
                    <p class="text-muted">Backend developer</p>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Programing language
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li style="margin-top:20px; margin-bottom:20px;"><i class="fa fa-code"></i> HTML</li>
                            <li style="margin-top:20px; margin-bottom:20px;"><i class="fa fa-code"></i> CSS</li>
                            <li style="margin-top:20px; margin-bottom:20px;"><i class="fa fa-code"></i> Javascript</li>
                            <li style="margin-top:20px; margin-bottom:20px;"><i class="fa fa-code"></i> PHP native & laravel</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6">

                        <h3 class="user-profile__title">Agus budiman</h3>

                        <p class="user-profile__desc">
                            Backend web developer
                        </p>

                        <div class="user-profile__url">
                            <a href="https://taopaw.com.com/">https://taopaw.com.com/</a>
                        </div>

                        <div class="social">
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="github"><i class="fa fa-github"></i> Agus096</a>
                                </li>
                                <li>
                                    <a href="#" class="instagram"><i class="fa fa-instagram"></i> Aelru_brando</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <ul class="user-profile__info">
                            <li>
                                <i class="fa fa-phone"></i> 0895-3596-72559
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i> <a href="mailto:Agus.budiman00@gmail.com">Agus.budiman99999@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <div class="user-profile__tabs">

                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#user-profile__portfolio" aria-controls="user-profile__portfolio" role="tab" data-toggle="tab" aria-expanded="true">Repo at Github <span class="badge badge-grey"><?= $matches[1] ?></span> </a>
                                </li>
                                <li role="presentation" class>
                                    <a href="#user-profile__history-web" aria-controls="user-profile__history-web" role="tab" data-toggle="tab" aria-expanded="false">My History website</a>
                                </li>
                                <li role="presentation" class>
                                    <a href="#user-profile__jobhistory" aria-controls="user-profile__jobhistory" role="tab" data-toggle="tab" aria-expanded="false">Pengalaman kerja</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="user-profile__portfolio">
                                    <div class="row">
                                        <div class="scroll-container">
                                            <!-- Preloader Overlay -->
                                            <div class="preloader-overlay" id="preloaderOverlay">
                                                <center>
                                                    <div class="preloader-text" style="font-size: 15px;"><i class="fa fa-github fa-spin fa-2x fa-fw" aria-hidden="true"></i> Mengambil data dari github...</div>
                                                </center>
                                            </div>
                                            <div class="content" style="margin-left: -50px; margin-top:-60px;">
                                                <?= $realink; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div role="tabpanel" class="tab-pane fade" id="user-profile__history-web">
                                    <div class="table-responsive">
                                        <table class="table table-bordered shopping-cart__table">
                                            <tbody>
                                                <tr class="js-shop__item">
                                                    <td>
                                                        <img class="img-responsive shopping-cart-item__img" src="https://www.taopaw.com.com/image/50x50/" alt="...">
                                                    </td>
                                                    <td>
                                                        <div class="shopping-cart-item__title">
                                                            Follmart.com
                                                        </div>
                                                        <div class="shopping-cart-item__desc">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="js-shop__item">
                                                    <td>
                                                        <img class="img-responsive shopping-cart-item__img" src="https://www.taopaw.com.com/image/50x50/" alt="...">
                                                    </td>
                                                    <td>
                                                        <div class="shopping-cart-item__title">
                                                            Maidposter.com
                                                        </div>
                                                        <div class="shopping-cart-item__desc">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="js-shop__item">
                                                    <td>
                                                        <img class="img-responsive shopping-cart-item__img" src="https://www.taopaw.com.com/image/50x50/" alt="...">
                                                    </td>
                                                    <td>
                                                        <div class="shopping-cart-item__title">
                                                            Jualvouchergame.com
                                                        </div>
                                                        <div class="shopping-cart-item__desc">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="js-shop__item">
                                                    <td>
                                                        <img class="img-responsive shopping-cart-item__img" src="https://www.taopaw.com.com/image/50x50/" alt="...">
                                                    </td>
                                                    <td>
                                                        <div class="shopping-cart-item__title">
                                                            lolitawkwkland.my.id
                                                        </div>
                                                        <div class="shopping-cart-item__desc">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>




                                <div role="tabpanel" class="tab-pane fade" id="user-profile__jobhistory">
                                    <div class="table-responsive">
                                        <table class="table table-bordered shopping-cart__table">
                                            <tbody>
                                                <tr class="js-shop__item">
                                                    <td>
                                                        <img class="img-responsive shopping-cart-item__img" src="https://www.taopaw.com.com/image/50x50/" alt="...">
                                                    </td>
                                                    <td>
                                                        <div class="shopping-cart-item__title">
                                                            Perusahaan A
                                                        </div>
                                                        <div class="shopping-cart-item__desc">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="js-shop__item">
                                                    <td>
                                                        <img class="img-responsive shopping-cart-item__img" src="https://www.taopaw.com.com/image/50x50/" alt="...">
                                                    </td>
                                                    <td>
                                                        <div class="shopping-cart-item__title">
                                                            Perusahaan B
                                                        </div>
                                                        <div class="shopping-cart-item__desc">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="js-shop__item">
                                                    <td>
                                                        <img class="img-responsive shopping-cart-item__img" src="https://www.taopaw.com.com/image/50x50/" alt="...">
                                                    </td>
                                                    <td>
                                                        <div class="shopping-cart-item__title">
                                                            Perusahaan C
                                                        </div>
                                                        <div class="shopping-cart-item__desc">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="js-shop__item">
                                                    <td>
                                                        <img class="img-responsive shopping-cart-item__img" src="https://www.taopaw.com.com/image/50x50/" alt="...">
                                                    </td>
                                                    <td>
                                                        <div class="shopping-cart-item__title">
                                                            Perusahaan D
                                                        </div>
                                                        <div class="shopping-cart-item__desc">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        // Function to hide the preloader and show the content
        function hidePreloader() {
            document.getElementById('preloaderOverlay').style.visibility = 'hidden';
            document.querySelector('.content').style.display = 'block';
        }

        // Simulate loading delay (for demonstration purposes)
        setTimeout(hidePreloader, 3000); // Adjust the delay time as needed
    </script>
    <script type="text/javascript">

    </script>
</body>

</html>