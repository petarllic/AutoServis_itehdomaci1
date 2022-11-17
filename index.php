<!DOCTYPE HTML>
<html>
    <head>
        <title>Auto servisi</title>
        <meta charset="UTF-8">

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/moj.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">

        
        <script>
            // Ajax prikaz usluga prilikom pokretanja stranice
            $.get("kontroler.php", {usluga: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<div class="blog_grid">' +
                                    '<h2 class="post_title">' + podaci[i].usluga_naziv + '</h2>' +
                                    '<ul class="links">' +
                                    '<li><i class="fa fa-calendar"></i>' + podaci[i].auto_servis_id + '</li><br>' +
                                    '<li><i class="fa fa-globe"></i> ' + podaci[i].usluga_opis + '</li><br>' +
                                    '<li><i class="fa fa-money"></i>' + podaci[i].usluga_cena + '</li>' +
                                    '</ul>' +
                                    '</div>';
                        }
                        ;
                        $('#usluga').html(ispis);
                    });


            //Ajax prikaz svih auto servisa
            $.get("kontroler.php", {auto_servis: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<li value=' + podaci[i].auto_servis_id + '>*' + podaci[i].auto_servis_naziv + '</li>';

                        }
                        ispis += '<a style="color:red" href="uredjivanjeAutoServisa.php">+ Dodaj novi auto servis kog nema na spisku</a>';
                        $('#auto_servis').html(ispis);
                    });
                    

            //Sortiranje
            function sortAsc() {
                $.get("kontroler.php", {usluga: "sortAsc"})
                        .done(function (data) {
                            var ispis = '';
                            var podaci = JSON.parse(data);
                            for (var i = 0; i < podaci.length; i++) {
                                ispis += '<div class="blog_grid">' +
                                        '<h2 class="post_title">' + podaci[i].usluga_naziv + '</h2>' +
                                        '<ul class="links">' +
                                        '<li><i class="fa fa-calendar"></i>' + podaci[i].usluga_cena + '</li>' +
                                        '<li><i class="fa fa-globe"></i> ' + podaci[i].usluga_opis + '</li>' +
                                        '<li><i class="fa fa-money"></i>' + podaci[i].auto_servis_id + '</li>' +
                                        '</ul>' +
                                        '</div>';
                            }
                            ;
                            $('#usluga').html(ispis);
                        });
            }

            function sortDesc() {
                $.get("kontroler.php", {usluga: "sortDesc"})
                        .done(function (data) {
                            var ispis = '';
                            var podaci = JSON.parse(data);
                            for (var i = 0; i < podaci.length; i++) {
                                ispis += '<div class="blog_grid">' +
                                        '<h2 class="post_title">' + podaci[i].usluga_naziv + '</h2>' +
                                        '<ul class="links">' +
                                        '<li><i class="fa fa-calendar"></i>' + podaci[i].usluga_cena + '</li>' +
                                        '<li><i class="fa fa-globe"></i> ' + podaci[i].usluga_opis + '</li>' +
                                        '<li><i class="fa fa-money"></i>' + podaci[i].auto_servis_id + '</li>' +
                                        '</ul>' +
                                        '</div>';
                            }
                            ;
                            $('#usluga').html(ispis);
                        });
            }



            // Ajax pretraga
            function search() {
                $.get("kontroler.php", {usluga: 'pretraga', tekst: $('#pretraga').val()})
                        .done(function (data) {
                            var ispis = '';
                            var podaci = JSON.parse(data);
                            for (var i = 0; i < podaci.length; i++) {
                                ispis += '<div class="blog_grid">' +
                                        '<h2 class="post_title">' + podaci[i].usluga_naziv + '</h2>' +
                                        '<ul class="links">' +
                                        '<li><i class="fa fa-calendar"></i>' + podaci[i].usluga_cena + '</li>' +
                                        '<li><i class="fa fa-globe"></i> ' + podaci[i].usluga_opis + '</li>' +
                                        '<li><i class="fa fa-money"></i>' + podaci[i].auto_servis_id + '</li>' +
                                        '</ul>' +
                                        '</div>';
                            }
                            ;
                            $('#usluga').html(ispis);
                        });
            }

        </script>
    </head>

    <body>
        <div class="header">
            <div class="container">
                <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="Auto servis"></a> </div>
                <div class="menu"> <a class="toggleMenu" href="#"><img src="images/logo.png" alt="" /> </a>
                    <ul class="nav" id="nav">
                        <li><a href="index.php">Početna</a></li>
                        <li><a href="uredjivanjeUsluga.php">Uredjivanje usluga</a></li>
                    </ul>
               </div>   
        
        </div>

</div>


        <div class="about">
            <div class="container">
                <section class="title-section">
                    <h1 class="title-header text-center"> Dostupne usluge auto servisa u gradu </h1>
                </section>
                <button class="btn" onclick="sortDesc()">Sortiraj opadajuce</button>
                <button class="btn" onclick="sortAsc()">Sortiraj rastuce</button>
            </div>
        </div><br>



        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <input id="pretraga" type="search" onsearch="search()" class="form-control" placeholder="Pretraga..." onkeyup="search()" size="45">
                    <div id="usluga">
                    </div>
                </div>

                <div class="col-md-6" >
                    <h3>Spisak svih aktivnih auto servisa u gradu:</h3>

                    <ul class="sidebar" id="auto_servis">
                    </ul>
                </div>
            </div>
        </div>
