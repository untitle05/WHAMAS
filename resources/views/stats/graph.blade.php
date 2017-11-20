{{--@foreach()--}}
{{--$totalCompteWhatsappOrange->totalCompteOrange--}}
{{--$totalCompteWhatsapp->totalCompte--}}
{{--$totalCompteWhatsappMtn->totalCompteMtn--}}
{{--$totalCompteWhatsappAvecPhotos->totalCompteAvecPhotos--}}
{{--$totalCompteWhatsappAvecPhotosMtn->totalCompteMntAvecPhotos--}}
{{--$totalCompteWhatsappAvecPhotosOrange->totalCompteOrangeAvecPhotos--}}
{{--$totalPhotos->totalPhotos--}}
{{--$TotalcomptePhotosAuPlusCinq->$TotalcomptePhotosAuPlusCinq--}}
{{--$TotalcomptePhotosEntreSixEtDix->totalCompteAvecPhotosEntreSixEtDix--}}
{{--$TotalcomptePhotosSuperieurDix->totalCompteAvecPhotosAuDelaDix--}}

{{--{{ dd($compteAvecaLePlusDePhotos)  }}--}}

@extends('layout')

@section('css')

    @stop
@section('content')

    <!-- page content -->
    <div role="main" >



        <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>COMPTES WHATSAPP</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class=" noselect x_content">
                            <canvas id="pie2"></canvas>
                            <div class="legend">
                                <div class="container"
                                     style="background-color: #2A3F54; width: 25px; height: 15px; position: relative; left: -230px; top: 15px;"></div>
                                <div style="color: #2A3F54; width: 230px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -10px; font-weight: bold"
                                     id="ComptePercent"><h5>TOTAL COMPTES WHATSAPP:</h5></div>
                                <div class="container"
                                     style="background-color: #1ABB9C; width: 25px; height: 15px; position: relative; left: -230px; top: 0px;"></div>
                                <div style="color: #1ABB9C; width: 340px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -25px; font-weight: bold"
                                     id="AbsenceComptePercent"><h5>TOTAL CIBLES SANS COMPTES WHATSAPP:</h5></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>COMPTES WHATSAPP PAR OPERATEURS</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class=" noselect x_content">
                            <canvas id="pie1"></canvas>
                            <div class="legend">
                                <div class="container"
                                     style="background-color: #2A3F54; width: 25px; height: 15px; position: relative; left: -230px; top: 15px;"></div>
                                <div style="color: #2A3F54; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -10px; font-weight: bold"
                                     id="orangePercent"><h5>ORANGE:</h5></div>
                                <div class="container"
                                     style="background-color: #1ABB9C; width: 25px; height: 15px; position: relative; left: -230px; top: 0px;"></div>
                                <div style="color: #1ABB9C; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -25px; font-weight: bold"
                                     id="mtnPercent"><h5>MTN:</h5></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>COMPTES WHATSAPP AVEC PHOTOS</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class=" noselect x_content">
                            <canvas id="pie3"></canvas>
                            <div class="legend">
                                <div class="container"
                                     style="background-color: #2A3F54; width: 25px; height: 15px; position: relative; left: -230px; top: 15px;"></div>
                                <div style="color: #2A3F54; width: 200px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -10px; font-weight: bold"
                                     id="CompteAvecPhotosPercent"><h5>COMPTES AVEC PHOTOS:</h5></div>
                                <div class="container"
                                     style="background-color: #1ABB9C; width: 25px; height: 15px; position: relative; left: -230px; top: 0px;"></div>
                                <div style="color: #1ABB9C; width: 190px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -25px; font-weight: bold"
                                     id="CompteSansPhotosPercent"><h5>COMPTES SANS PHOTOS:</h5></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>COMPTES WHATSAPP AVEC PHOTOS PAR OPERATEUR</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class=" noselect x_content">
                            <canvas id="pie4"></canvas>
                            <div class="legend">
                                <div class="container"
                                     style="background-color: #2A3F54; width: 25px; height: 15px; position: relative; left: -230px; top: 15px;"></div>
                                <div style="color: #2A3F54; width: 200px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -10px; font-weight: bold"
                                     id="CompteAvecPhotosOrangePercent"><h5>ORANGE:</h5></div>
                                <div class="container"
                                     style="background-color: #1ABB9C; width: 25px; height: 15px; position: relative; left: -230px; top: 0px;"></div>
                                <div style="color: #1ABB9C; width: 190px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -25px; font-weight: bold"
                                     id="CompteSansPhotosMtnPercent"><h5>MTN:</h5></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>COMPTES WHATSAPP PAR INTERVALLES DE PHOTOS</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class=" noselect x_content">
                            <canvas id="pie5"></canvas>
                            <div class="legend">
                                <div class="container"
                                     style="background-color: #2A3F54; width: 25px; height: 15px; position: relative; left: -230px; top: 15px;"></div>
                                <div style="color: #2A3F54; width: 200px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -10px; font-weight: bold"
                                     id="ComptePhotosAuPlusCinq"><h5>AU PLUS CINQ PHOTOS:</h5></div>
                                <div class="container"
                                     style="background-color: #1ABB9C; width: 25px; height: 15px; position: relative; left: -230px; top: 0px;"></div>
                                <div style="color: #1ABB9C; width: 2300px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -25px; font-weight: bold"
                                     id="ComptePhotosEntreSixEtDix"><h5>COMPRISES ENTRE SIX ET DIX PHOTOS:</h5></div>
                                <div class="container"
                                     style="background-color: #9c58b7; width: 25px; height: 15px; position: relative; left: -230px; top: -13px;"></div>
                                <div style="color: #9c58b7; width: 210px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -37px; font-weight: bold"
                                     id="ComptePhotosPlusDeDix"><h5>SUPERIEURES A DIX PHOTOS:</h5></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- page content -->
    {{--<div class="row">--}}
        {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
            {{--<div class="x_panel">--}}
                {{--<div class="x_title">--}}
                    {{--<h2>Comptes Whatsapp par operateur <small>Sessions</small></h2>--}}
                    {{--<ul class="nav navbar-right panel_toolbox">--}}
                        {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                        {{--</li>--}}
                        {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--<div class=" noselect x_content" id="chart" >--}}
                    {{--<canvas id="pie"></canvas>--}}
                    {{--<div class="legend">--}}
                        {{--<div class="container" style="background-color: #2A3F54; width: 25px; height: 15px; position: relative; left: -230px; top: 15px;"></div>--}}
                        {{--<div style="color: #2A3F54; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -10px; font-weight: bold" id="orangePercent"><h5>ORANGE</h5></div>--}}
                        {{--<div class="container" style="background-color: #1ABB9C; width: 25px; height: 15px; position: relative; left: -230px; top: 0px;"></div>--}}
                        {{--<div style="color: #1ABB9C; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -25px; font-weight: bold" id="mtnPercent"><h5>MTN</h5></div>--}}
                        {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
@stop

@section('js')
    <script src={{asset("js/Chart.min.js")}}></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('stats') }}",
                type:"GET",
                success: function (data) {
                    console.log(data);

                    var couleurs =[];
                    couleurs.push("#2A3F54");
                    couleurs.push("#1ABB9C");

//------------------donnees comptes whatsapp par operateur--------------
                    var Operateurs = [];
                    var TotalCompteParOperateur = [];
                        Operateurs.push("Operateur " + data[0]['Operateur1']);
                        Operateurs.push("Operateur " + data[0]['Operateur2']);
//                        alert(Operateurs[i]);
                    TotalCompteParOperateur.push(data[0]['Total_Compte1']);
                    TotalCompteParOperateur.push(data[0]['Total_Compte2']);
//                        alert(TotalCompte[i]);

                    var dataCompteParOperateur = {

                        labels: Operateurs,
                        datasets:
                                [{

                                    backgroundColor: couleurs,
                                    data: TotalCompteParOperateur
                                }
                                ]
                    };

                    var ctx1 = $("#pie1");


                    var options1 = {
                        animation: {
                            animateRotate: true,
                            animateScale: true
                        },
                        cutoutPercentage: 45,
                        legend: false,
                        legendCallback: function(chart) {
                            var text = [];
                            text.push('<ul class="' + chart.id + '-legend">');
                            for (var i = 0; i < chart.dataCompteParOperateur.datasets[0].data.length; i++) {
                                text.push('<li><span style="background-color:' + chart.dataCompteParOperateur.datasets[0].backgroundColor[i] + '">');
                                if (chart.dataCompteParOperateur.labels[i]) {
                                    text.push(chart.dataCompteParOperateur.labels[i]);
                                }
                                text.push('</span></li>');
                            }
                            text.push('</ul>');
                            return text.join("");
                        },
                        tooltips: {
                            custom: function(tooltip) {
                                //tooltip.x = 0;
                                //tooltip.y = 0;
                            },
                            mode: 'single',
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    var sum = data.datasets[0].data.reduce(add, 0);
                                    function add(a, b) {
                                        return a + b;
                                    }

                                    return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                                },
                                beforeLabel: function(tooltipItems, data) {
                                    return 'effectif: ' + data.datasets[0].data[tooltipItems.index];
                                }
                            }
                        }
                    };





                    var  pieGraph1 = new Chart(ctx1, {
                        type: 'pie',
                        data: dataCompteParOperateur,
                        options:options1

                    });


                    var OrangePercent = (parseFloat(((TotalCompteParOperateur[0] /(TotalCompteParOperateur[0]+ TotalCompteParOperateur[1])) * 100), 10).toFixed(2) + '%');
                    var mtnPercent = (parseFloat(((TotalCompteParOperateur[1] /(TotalCompteParOperateur[0]+ TotalCompteParOperateur[1])) * 100), 10).toFixed(2) + '%');
                    var InsertOrangePercent = '<span style="color: #2A3F54; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 67px; top: -27.8px; font-size: 1.08em;" >' + OrangePercent + '</span>';
                    var InsertMtnPercent = '<span style="color: #1ABB9C; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -28px; font-size: 1.08em; font-weight: bold">' + mtnPercent + '</span>';
                    $('#orangePercent').append(InsertOrangePercent);
                    $('#mtnPercent').append(InsertMtnPercent);



//-------------------donnees total comptes whatsapp et total absence compte whatsapp------
                    var labelsCompteEtNonCompte =[];
                    var totalCompteEtNonCompte =[];

                    labelsCompteEtNonCompte.push(data[1]['CompteWhatsapp']);
                    labelsCompteEtNonCompte.push(data[1]['AbsenceCompteWhatsapp']);
                    totalCompteEtNonCompte.push(data[1]['TotalCompteWhatsapp']);
                    totalCompteEtNonCompte.push(data[1]['TotalAbsenceCompte_Whatsapp']);

                    var dataTotalCompteEtNonCompte = {

                        labels: labelsCompteEtNonCompte,
                        datasets:
                                [{

                                    backgroundColor: couleurs,
                                    data: totalCompteEtNonCompte
                                }
                                ]
                    };

                    var ctx2 = $("#pie2");

                    var options2 = {
                        animation: {
                            animateRotate: true,
                            animateScale: true
                        },
                        cutoutPercentage: 45,
                        legend: false,
                        legendCallback: function(chart) {
                            var text = [];
                            text.push('<ul class="' + chart.id + '-legend">');
                            for (var i = 0; i < chart.dataTotalCompteParEtNonCompte.datasets[0].data.length; i++) {
                                text.push('<li><span style="background-color:' + chart.dataTotalCompteParEtNonCompte.datasets[0].backgroundColor[i] + '">');
                                if (chart.dataTotalCompteParEtNonCompte.labels[i]) {
                                    text.push(chart.dataTotalCompteParEtNonCompte.labels[i]);
                                }
                                text.push('</span></li>');
                            }
                            text.push('</ul>');
                            return text.join("");
                        },
                        tooltips: {
                            custom: function(tooltip) {
                                //tooltip.x = 0;
                                //tooltip.y = 0;
                            },
                            mode: 'single',
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    var sum = data.datasets[0].data.reduce(add, 0);
                                    function add(a, b) {
                                        return a + b;
                                    }

                                    return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                                },
                                beforeLabel: function(tooltipItems, data) {
                                    return 'effectif: ' + data.datasets[0].data[tooltipItems.index];
                                }
                            }
                        }
                    };

                    var  pieGraph2 = new Chart(ctx2, {
                        type: 'pie',
                        data: dataTotalCompteEtNonCompte,
                        options:options2

                    });

                    var ComptePercent = (parseFloat(((totalCompteEtNonCompte[0] /(totalCompteEtNonCompte[0]+ totalCompteEtNonCompte[1])) * 100), 10).toFixed(2) + '%');
                    var AbsenceComptePercent = (parseFloat(((totalCompteEtNonCompte[1] /(totalCompteEtNonCompte[0]+ totalCompteEtNonCompte[1])) * 100), 10).toFixed(2) + '%');
                    var InsertComptePercent = '<span style="color: #2A3F54; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 205px; top: -27.8px; font-size: 1.1em;">' + ComptePercent + '</span>';
                    var InsertAbsenceCompteMtnPercent = '<span style="color: #1ABB9C; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 300px; top: -27.8px; font-size: 1.1em; font-weight: bold" >' + AbsenceComptePercent + '</span>';
                    $('#ComptePercent').append(InsertComptePercent);
                    $('#AbsenceComptePercent').append(InsertAbsenceCompteMtnPercent);


//---------------------------donnees comptes whatsapp avec photos et pas de photos------------------------
                    var labelsCompteAvecPhotosEtPasDePhotos =[];
                    var totalCompteAvecPhotosEtPasDePhotos =[];

                    labelsCompteAvecPhotosEtPasDePhotos.push(data[2]['CompteWhatsappAvecPhotos']);
                    labelsCompteAvecPhotosEtPasDePhotos.push(data[2]['CompteWhatsappSansPhotos']);
                    totalCompteAvecPhotosEtPasDePhotos.push(data[2]['TotalCompteWhatsappAvecPhotos']);
                    totalCompteAvecPhotosEtPasDePhotos.push(data[2]['TotalCompteWhatsappSansPhotos']);

                    var dataTotalCompteAvecPhotosEtNon = {

                        labels: labelsCompteAvecPhotosEtPasDePhotos,
                        datasets:
                                [{

                                    backgroundColor: couleurs,
                                    data: totalCompteAvecPhotosEtPasDePhotos
                                }
                                ]
                    };

                    var ctx3 = $("#pie3");

                    var options3 = {
                        animation: {
                            animateRotate: true,
                            animateScale: true
                        },
                        cutoutPercentage: 45,
                        legend: false,
                        legendCallback: function(chart) {
                            var text = [];
                            text.push('<ul class="' + chart.id + '-legend">');
                            for (var i = 0; i < chart.dataTotalCompteAvecPhotosEtNon.datasets[0].data.length; i++) {
                                text.push('<li><span style="background-color:' + chart.dataTotalCompteAvecPhotosEtNon.datasets[0].backgroundColor[i] + '">');
                                if (chart.dataTotalCompteAvecPhotosEtNon.labels[i]) {
                                    text.push(chart.dataTotalCompteAvecPhotosEtNon.labels[i]);
                                }
                                text.push('</span></li>');
                            }
                            text.push('</ul>');
                            return text.join("");
                        },
                        tooltips: {
                            custom: function(tooltip) {
                                //tooltip.x = 0;
                                //tooltip.y = 0;
                            },
                            mode: 'single',
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    var sum = data.datasets[0].data.reduce(add, 0);
                                    function add(a, b) {
                                        return a + b;
                                    }

                                    return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                                },
                                beforeLabel: function(tooltipItems, data) {
                                    return 'effectif: ' + data.datasets[0].data[tooltipItems.index];
                                }
                            }
                        }
                    };

                    var  pieGraph3 = new Chart(ctx3, {
                        type: 'pie',
                        data: dataTotalCompteAvecPhotosEtNon,
                        options:options3

                    });

                    var CompteAvecPhotosPercent = (parseFloat(((totalCompteAvecPhotosEtPasDePhotos[0] /(totalCompteAvecPhotosEtPasDePhotos[0]+ totalCompteAvecPhotosEtPasDePhotos[1])).toFixed(2) * 100), 10) + '%');
                    var CompteSansPhotosPercent = (parseFloat(((totalCompteAvecPhotosEtPasDePhotos[1] /(totalCompteAvecPhotosEtPasDePhotos[0]+ totalCompteAvecPhotosEtPasDePhotos[1])).toFixed(2) * 100), 10) + '%');
                    var InsertCompteAvecPhotosPercent = '<span style="color: #2A3F54; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 180px; top: -27.8px; font-size: 1.1em;" >' + CompteAvecPhotosPercent + '</span>';
                    var InsertCompteSansPhotosPercent = '<span style="color: #1ABB9C; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 180px; top: -27.8px; font-size: 1.1em; font-weight: bold">' + CompteSansPhotosPercent + '</span>';
                    $('#CompteAvecPhotosPercent').append(InsertCompteAvecPhotosPercent);
                    $('#CompteSansPhotosPercent').append(InsertCompteSansPhotosPercent);



//----------------------------------compte whatsapp avec photos par operateur-----------------------------------------
                    var labelsCompteAvecPhotosParOperateur =[];
                    var totalCompteAvecPhotosParOperateur=[];

                    labelsCompteAvecPhotosParOperateur.push(data[3]['CompteWhatsappAvecPhotosOrange']);
                    labelsCompteAvecPhotosParOperateur.push(data[3]['CompteWhatsappAvecPhotosMtn']);
                    totalCompteAvecPhotosParOperateur.push(data[3]['TotalCompteWhatsappAvecPhotosOrange']);
                    totalCompteAvecPhotosParOperateur.push(data[3]['TotalCompteWhatsappAvecPhotosMtn']);

                    var dataTotalCompteAvecPhotosParOperateur = {

                        labels: labelsCompteAvecPhotosParOperateur,
                        datasets:
                                [{

                                    backgroundColor: couleurs,
                                    data: totalCompteAvecPhotosParOperateur
                                }
                                ]
                    };

                    var ctx4 = $("#pie4");

                    var options4 = {
                        animation: {
                            animateRotate: true,
                            animateScale: true
                        },
                        cutoutPercentage: 45,
                        legend: false,
                        legendCallback: function(chart) {
                            var text = [];
                            text.push('<ul class="' + chart.id + '-legend">');
                            for (var i = 0; i < chart.dataTotalCompteAvecPhotosParOperateur.datasets[0].data.length; i++) {
                                text.push('<li><span style="background-color:' + chart.dataTotalCompteAvecPhotosParOperateur.datasets[0].backgroundColor[i] + '">');
                                if (chart.dataTotalCompteAvecPhotosParOperateur.labels[i]) {
                                    text.push(chart.dataTotalCompteAvecPhotosParOperateur.labels[i]);
                                }
                                text.push('</span></li>');
                            }
                            text.push('</ul>');
                            return text.join("");
                        },
                        tooltips: {
                            custom: function(tooltip) {
                                //tooltip.x = 0;
                                //tooltip.y = 0;
                            },
                            mode: 'single',
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    var sum = data.datasets[0].data.reduce(add, 0);
                                    function add(a, b) {
                                        return a + b;
                                    }

                                    return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                                },
                                beforeLabel: function(tooltipItems, data) {
                                    return 'effectif: ' + data.datasets[0].data[tooltipItems.index];
                                }
                            }
                        }
                    };

                    var  pieGraph4 = new Chart(ctx4, {
                        type: 'pie',
                        data: dataTotalCompteAvecPhotosParOperateur,
                        options:options4

                    });

                    var CompteAvecPhotosOrangePercent = (parseFloat(((totalCompteAvecPhotosParOperateur[0] /(totalCompteAvecPhotosParOperateur[0]+ totalCompteAvecPhotosParOperateur[1])) * 100), 10).toFixed(2) + '%');
                    var CompteAvecPhotosMtnPercent = (parseFloat(((totalCompteAvecPhotosParOperateur[1] /(totalCompteAvecPhotosParOperateur[0]+ totalCompteAvecPhotosParOperateur[1])) * 100), 10).toFixed(2) + '%');
                    var InsertCompteAvecOrangePhotosPercent = '<span style="color: #2A3F54; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 68px; top: -27.8px; font-size: 1.1em;" >' + CompteAvecPhotosOrangePercent + '</span>';
                    var InsertCompteSansPhotosMtnPercent = '<span style="color: #1ABB9C; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 40px; top: -27.8px; font-size: 1.1em; font-weight: bold">' + CompteAvecPhotosMtnPercent + '</span>';
                    $('#CompteAvecPhotosOrangePercent').append(InsertCompteAvecOrangePhotosPercent);
                    $('#CompteSansPhotosMtnPercent').append(InsertCompteSansPhotosMtnPercent);

//-----------------------Comptes Whatsapp Par intervalles Photos---------------------------------------
                    var labelsCompteWhatsappParIntervallesPhotos =[];
                    var totalCompteWhatsappParIntervallesPhotos=[];

                    labelsCompteWhatsappParIntervallesPhotos.push(data[4]['CompteWhatsappAuPlusCinq']);
                    labelsCompteWhatsappParIntervallesPhotos.push(data[4]['CompteWhatsappEntreSixEtDix']);
                    labelsCompteWhatsappParIntervallesPhotos.push(data[4]['CompteWhatsappSuperieurDix']);
                    totalCompteWhatsappParIntervallesPhotos.push(data[4]['TotalCompteWhatsappAvecPlusCinq']);
                    totalCompteWhatsappParIntervallesPhotos.push(data[4]['TotalCompteWhatsappEntreSixEtDix']);
                    totalCompteWhatsappParIntervallesPhotos.push(data[4]['TotalCompteWhatsappSuperieurDix']);

                    var couleursIntervalles =[];
                    couleursIntervalles.push("#2A3F54");
                    couleursIntervalles.push("#1ABB9C");
                    couleursIntervalles.push("#9c58b7");


                    var dataTotalCompteAvecPhotosIntervalles = {

                        labels: labelsCompteWhatsappParIntervallesPhotos,
                        datasets:
                                [{

                                    backgroundColor: couleursIntervalles,
                                    data: totalCompteWhatsappParIntervallesPhotos
                                }
                                ]
                    };

                    var ctx5 = $("#pie5");

                    var options5 = {
                        animation: {
                            animateRotate: true,
                            animateScale: true
                        },
                        cutoutPercentage: 45,
                        legend: false,
                        legendCallback: function(chart) {
                            var text = [];
                            text.push('<ul class="' + chart.id + '-legend">');
                            for (var i = 0; i < chart.dataTotalCompteAvecPhotosIntervalles.datasets[0].data.length; i++) {
                                text.push('<li><span style="background-color:' + chart.dataTotalCompteAvecPhotosIntervalles.datasets[0].backgroundColor[i] + '">');
                                if (chart.dataTotalCompteAvecPhotosIntervalles.labels[i]) {
                                    text.push(chart.dataTotalCompteAvecPhotosIntervalles.labels[i]);
                                }
                                text.push('</span></li>');
                            }
                            text.push('</ul>');
                            return text.join("");
                        },
                        tooltips: {
                            custom: function(tooltip) {
                                //tooltip.x = 0;
                                //tooltip.y = 0;
                            },
                            mode: 'single',
                            callbacks: {
                                label: function(tooltipItems, data) {
                                    var sum = data.datasets[0].data.reduce(add, 0);
                                    function add(a, b) {
                                        return a + b;
                                    }

                                    return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                                },
                                beforeLabel: function(tooltipItems, data) {
                                    return 'effectif: ' + data.datasets[0].data[tooltipItems.index];
                                }
                            }
                        }
                    };

                    var  pieGraph5 = new Chart(ctx5, {
                        type: 'pie',
                        data: dataTotalCompteAvecPhotosIntervalles,
                        options:options5

                    });

                    var CompteAuPlusCinqPercent = (parseFloat(((totalCompteWhatsappParIntervallesPhotos[0] /(totalCompteWhatsappParIntervallesPhotos[0]+ totalCompteWhatsappParIntervallesPhotos[1] + totalCompteWhatsappParIntervallesPhotos[2])) * 100), 10).toFixed(2) + '%');
                    var CompteEntreSixEtDixPercent = (parseFloat(((totalCompteWhatsappParIntervallesPhotos[1] /(totalCompteWhatsappParIntervallesPhotos[0]+ totalCompteWhatsappParIntervallesPhotos[1]+ totalCompteWhatsappParIntervallesPhotos[2])) * 100), 10).toFixed(2) + '%');
                    var CompteSupeieurDixPercent = (parseFloat(((totalCompteWhatsappParIntervallesPhotos[2] /(totalCompteWhatsappParIntervallesPhotos[0]+ totalCompteWhatsappParIntervallesPhotos[1] + totalCompteWhatsappParIntervallesPhotos[2])) * 100), 10).toFixed(2) + '%');
                    var InsertCompteAuPlusCinqPercent = '<span style="color: #2A3F54; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 170px; top: -27.8px; font-size: 1.1em;" >' + CompteAuPlusCinqPercent + '</span>';
                    var InsertCompteEntreSixEtDixPercent = '<span style="color: #1ABB9C; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 280px; top: -27.8px; font-size: 1.1em; font-weight: bold">' + CompteEntreSixEtDixPercent + '</span>';
                    var InsertCompteSupeieurDixPercent = '<span style="color: #9c58b7; width: 40px; height: 20px; position: relative; border-radius: 5px; left: 211px; top: -27.8px; font-size: 1.1em; font-weight: bold">' + CompteSupeieurDixPercent + '</span>';
                    $('#ComptePhotosAuPlusCinq').append(InsertCompteAuPlusCinqPercent);
                    $('#ComptePhotosEntreSixEtDix').append(InsertCompteEntreSixEtDixPercent);
                    $('#ComptePhotosPlusDeDix').append(InsertCompteSupeieurDixPercent);




//                    alert(TotalCompte[0]);


                }
            })
        });
    </script>
@stop

