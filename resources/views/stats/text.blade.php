@extends('layout')

@section('css')
    <link href={{asset("css/dataTables.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/buttons.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/fixedHeader.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/responsive.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/scroller.bootstrap.min.css")}} rel="stylesheet">
@stop

@section('content')
    <!-- page content -->
    <div role="main">
        <div class="">
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Informations recapitulatives
                                    </h2>
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
                            <div class="x_content">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Total Numeros cibles</th>
                                        <th>Total comptes Whatsapp</th>
                                        <th>Total Photos</th>
                                        <th>Comptes avec photos</th>
                                        <th>Comptes photos ORANGE</th>
                                        <th>Comptes photos MTN</th>
                                        <th>Comptes plus de 5 photos</th>
                                        <th>Comptes entre 6 et 10 photos</th>
                                        <th>Comptes plus de 10 photos</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="totalNumeroCibles"></td>
                                        <td id="totalCompteWhatsapp"></td>
                                        <td id="totalPhotos"></td>
                                        <td id="compteAvecPhotos"></td>
                                        <td id="ComptePhotosOrange"></td>
                                        <td id="ComptePhotosMTN"></td>
                                        <td id="PlusDe5Photos"></td>
                                        <td id="Entre6Et10Photos"></td>
                                        <td id="PlusDe10Photos"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Cible avec le plus de photos</h2>
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
                            <div class="x_content">
                                <table id="datatable-buttons" class="table table-striped table-bordered"
                                       style="width: 30%">
                                    <thead>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Operateur</th>
                                        <th>Total photos</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="numero"></td>
                                        <td id="operateur"></td>
                                        <td id="nbrePhotos"></td>
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
        <!-- /page content -->
        @stop

        @section('js')
            <script src={{asset("js/jquery.dataTables.min.js")}}></script>
            <script src={{asset("js/dataTables.bootstrap.min.js")}}></script>
            <script src={{asset("js/dataTables.buttons.min.js")}}></script>
            <script src={{asset("js/buttons.bootstrap.min.js")}}></script>
            <script src={{asset("js/buttons.flash.min.js")}}></script>
            <script src={{asset("js/buttons.html5.min.js")}}></script>
            <script src={{asset("js/buttons.print.min.js")}}></script>
            <script src={{asset("js/dataTables.fixedHeader.min.js")}}></script>
            <script src={{asset("js/dataTables.keyTable.min.js")}}></script>
            <script src={{asset("js/dataTables.responsive.min.js")}}></script>
            <script src={{asset("js/responsive.bootstrap.js")}}></script>
            <script src={{asset("js/dataTables.scroller.min.js")}}></script>
            <script src={{asset("js/jszip.min.js")}}></script>
            <script src={{asset("js/pdfmake.min.js")}}></script>
            <script src={{asset("js/vfs_fonts.js")}}></script>
            <script src={{asset("js/dropzone.min.js")}}></script>

            <script>
                $(document).ready(function () {
                    $.ajax({
                        url: "{{ route('stats') }}",
                        type: "GET",
                        success: function (data) {
                            console.log(data);
                            $('#totalNumeroCibles').append(data[5]['Total_numeros']);
                            $('#totalCompteWhatsapp').append(data[1]['TotalCompteWhatsapp']);
                            $('#totalPhotos').append(data[5]['NombreTotalPhoto']);
                            $('#compteAvecPhotos').append(data[2]['TotalCompteWhatsappAvecPhotos']);
                            $('#ComptePhotosOrange').append(data[3]['TotalCompteWhatsappAvecPhotosOrange']);
                            $('#ComptePhotosMTN').append(data[3]['TotalCompteWhatsappAvecPhotosMtn']);
                            $('#PlusDe5Photos').append(data[4]['TotalCompteWhatsappAvecPlusCinq']);
                            $('#Entre6Et10Photos').append(data[4]['TotalCompteWhatsappEntreSixEtDix']);
                            $('#PlusDe10Photos').append(data[4]['TotalCompteWhatsappSuperieurDix']);
                            $('#numero').append(data[5]['Numero']);
                            $('#operateur').append(data[5]['Operateur']);
                            $('#nbrePhotos').append(data[5]['Nombre_Photos']);
                        }
                    });
                });
            </script>
@stop



