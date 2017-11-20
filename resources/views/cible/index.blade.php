@extends('layout')

@section('css')
    <link href={{asset("css/dataTables.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/buttons.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/fixedHeader.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/responsive.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/scroller.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/dropzone.min.css")}} rel="stylesheet">

@stop

@section('content')
    <div class="row">
    <div class=" col-xs-12" >

        <div class="x_panel">
            <div class="x_title">
                <h2>Liste des numeros cibles</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                        <th>Numeros cibles</th>
                        <th>Compte Whatsapp</th>
                        <th>Nom cible</th>
                        <th class="noExport">Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($cibles as $cible)
                        <tr id="cibles{{$cible->id}}">
                            <td>{{ $cible->numero }}</td>
                            <td>{{ $cible->compte_whatsapp }}</td>
                            <td>{{ $cible->nom }}</td>
                            <td style="width: 15px">
                                <button class="btn btn-xs btn-info" name="edit" id="edit" data-id="{{ $cible->id }}" title="modifier"><span class="fa fa-pencil"></span></button>
                                <a class="btn btn-xs btn-dark " href ="{{ action('CibleController@getPhotosCible', ['id' => $cible->id]) }}" title="Voir Photos"><span class="fa fa-file-image-o"></span></a>
                                {{--<button class="btn btn-xs btn-danger" data-id="{{ $cible->id }}" title="Supprimer"><span class="fa fa-times"></span></button>--}}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
@stop

@section('modal_content')
    <div id="add_cible_modal" class="modal fade" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Informations du membre </h4>
                </div>
                <div class="modal-body">
                    <form id="cible_form" method="POST" action="updateCible" >
                        {{ csrf_field() }}

                        <input type="hidden" id="cibleid" name="id">
                        <div class="form-group form-float">
                            <div class="form-line{{ $errors->has('numero') ? ' has-error' : '' }}">
                                <input type="number" id="numero" name="numero" class="form-control" placeholder="Numero">
                                @if ($errors->has('numero'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('numero') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line{{ $errors->has('compte_whatsapp') ? ' has-error' : '' }}">
                                <input type="text" id="compte_whatsapp" name="compte_whatsapp" class="form-control" placeholder="Compte Whatsapp">
                                @if ($errors->has('compte_whatsapp'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('compte_whatsapp') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line{{ $errors->has('nom') ? ' has-error' : '' }}">
                                <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom">
                                @if ($errors->has('nom'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('nom') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <input type="submit" id="save" value="Modifier" class="btn btn-primary">
                        <button type="button" class="btn btn-default" id="show_dropzone" data-id="{{ $cible->id }}" >Ajouter Photos </button>
                        </form>
                </div>

            </div>
        </div>
    </div>


    <div id="dropzone_modal" class="modal fade row">
    <div class="col-md-8 col-sm-12 col-xs-12" style="position: relative; left: 200px; top: 200px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Charger les photos de la cible</h2>

                <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    </div>
                <form action="{{ url('photosCible') }}" class="dropzone" id="addImages">
                    {{ csrf_field() }}
                        <input type="hidden" name="cible_photo_id" id="cible_photo_id" >
                    </form>
            <button type="button" class="btn btn-warning close_drop" data-dismiss="modal" style="position: relative; bottom: -5px">Close</button>
                    <br />
                    <br />
                    <br />
                    <br />
                    </div>
                </div>
            </div>


    {{--<div id="gallery_Modal" class="modal fade row">--}}
        {{--<div class="col-md-12">--}}
            {{--<div class="x_panel">--}}
                {{--<div class="x_title">--}}
                    {{--<h2>Media Gallery <small> gallery design </small></h2>--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                {{--<div class="x_content">--}}

                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

//----------- Insertion des nouvelles informations d'une cible depuis un modal form -----------------------
            $('#cible_form').on('submit', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var data = $(this).serialize();
                var type = 'POST';
//                alert(url);

                $.ajax({
                    type: type,
                    url: url,
                    data: data,
                    success: function (data) {
                        console.log(data);
                        /*$('#insert_form')[0].reset();
                         $('#add_data_Modal').modal('hide');
                         $('#membre_table').html(data);*/

                        var row = '<tr id="cibles' + data.id + '" >' +
                                '<td>' + data.numero + '</td>' +
                                '<td>' + data.compte_whatsapp + '</td>' +
                                '<td>' + data.nom + '</td>' +
                                '<td>' +
                                '<button class="btn btn-xs btn-info" data-id="' + data.id + '" title="modifier"><span class="fa fa-pencil"></span></button> ' +
                                '</td>' +
                                '</tr>';
                        $('#cibles' + data.id).replaceWith(row);
                        window.location.reload();
                        $('#add_cible_modal').modal('hide');
                    }
                });
            });

//-----------------Ajout des photos de la cible-----------------

            $('#show_dropzone').on('click', function () {
                $('#dropzone_modal').trigger('reset');
//                var id = $(this).data('id');

                $('#dropzone_modal').modal('show');
//                window.location.reload();
//                alert($('#cible_photo_id').val());
                $('.close').on('click', function () {
                    window.location.reload();
                });

                $('#save').on('click', function () {
                    window.location.reload();
                });


            });




//------- Affichage du modal de la gallery des photos de la cible --------
//                function viewGallery() {
//                    $('.voir_photos_cible').on('click', function () {
//                        $('#gallery_Modal').load("/listPhotos?id="+id, null, function () {
//                            alert('ttoto');
//                        });
//
////                id = $(this).data('id');
////                    alert('toto');
//                    });
//
//                }


            $('tbody').delegate('.btn-info','click',function () {
                var value = $(this).data('id');
                var url = '{{ URL::to('showCible') }}';
                id = $(this).data('id');
//                viewGallery();

                $.ajax({
                    type: 'get',
                    url: url,
                    data: {'id': value},

                    success: function (data) {
                        console.log(data, 'inside');
                        $('#numero').val(data.numero);
                        $('#compte_whatsapp').val(data.compte_whatsapp);
                        $('#nom').val(data.nom);
                        $('#cibleid').val(data.id);
                        $('#cible_photo_id').val(data.id);
                        $('#add_cible_modal').modal('show');

                    }
                });
            });


        });





//-------- Preremplissage des informations a modifier d'une cible dans un form modal -------------------------------





//        $('#cible_form').on('submit', function (e) {
//            e.preventDefault();
//            alert('toto');
//        });
////            var url = $(this).attr('action');
//            var data = $(this).serialize();
//            var type = 'POST';
//
//                $.ajax({
//                    type: type,
//                    url: url,
//                    data: data,
//                    success:function (data) {
//                        console.log(data)
//                        /*$('#insert_form')[0].reset();
//                         $('#add_data_Modal').modal('hide');
//                         $('#membre_table').html(data);*/
//
//                        var row = '<tr id="cibles'+ data.id+'" >' +
//                                '<td>' + data.numero + '</td>' +
//                                '<td>' + data.compte_whatsapp + '</td>' +
//                                '<td>' + data.sexe + '</td>' +
//                                '<td>' +
//                                '<button class="btn btn-xs btn-info" data-id="' + data.id + '" title="modifier"><span class="fa fa-pencil"></span></button> ' +
//                                '</td>' +
//                                '</tr>';
//                            $('#cibles'+ data.id).replaceWith(row);
//                            $('#add_cible_modal').modal('hide');
//
//
//
//                    }
//
//                });
//
//
//
//                //---------reset_formulaire--------------------
//                $(this).trigger('reset');


    </script>


@stop