@extends('layout')

@section('css')
    <link href={{asset("css/dataTables.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/buttons.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/fixedHeader.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/responsive.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("css/scroller.bootstrap.min.css")}} rel="stylesheet">
    @stop

@section('content')
    <div class="row" >
    <div style="position:relative;">
        <button type="button" name="add_experience" id="add_experience" style="position: relative; left: -10px" class="btn btn-app" ><i class="fa fa-plus" ></i> Ajouter</button>
        <div class="x_panel">
            <div class="x_title">
                <h2>Liste des experiences</h2>
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
                        <th>Nom Operateur</th>
                        <th>Borne Min</th>
                        <th>Borne Max</th>
                        <th>Date Experience</th>
                        <th class="noExport">Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($experiences as $experience)
                        <tr id="experiences{{$experience->id}}">
                            <td>{{ $experience->nom_operateur }}</td>
                            <td>{{ $experience->borne_min }}</td>
                            <td>{{ $experience->borne_max}}</td>
                            <td>{{ $experience->date_experience }}</td>
                            <td>
                                {{--<button class="btn btn-xs btn-info" name="edit" id="edit" data-id="{{ $experience->id }}"title="modifier"><span class="fa fa-pencil"></span></button>--}}
                                {{--<button class="btn btn-xs btn-danger" data-id="{{ $experience->id }}" title="Supprimer"><span class="fa fa-times"></span></button>--}}
                                <a class="btn btn-xs btn-default"  href ="{{ action('ExperienceController@getDownload', ["id" => $experience->id, "operateur" =>$experience->nom_operateur]) }}" title="Telcharger"><span class="fa fa-download"></span></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @stop

@section('modal_content')
    <div id="add_experience_modal" class="modal fade" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Informations du membre </h4>
                </div>
                <div class="modal-body">
                    <form id="insert_form" method="POST" action="{{ url('experience') }}" >
                        {{ csrf_field() }}
                       <div class="form-group form-float">
                            <div class="form-line{{ $errors->has('nom_operateur') ? ' has-error' : '' }}">
                                <select type="text" id="nom_operateur" name="nom_operateur" class="form-control" placeholder="operateurs">
                                    <option value="orange">orange</option>
                                    <option value="mtn">mtn</option>
                                    </select>
                                @if ($errors->has('nom_operateur'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('nom_operateur') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line{{ $errors->has('borne_min') ? ' has-error' : '' }}">
                                <input type="number" id="borne_min" name="borne_min" class="form-control" placeholder="Borne Min">
                                @if ($errors->has('borne_min'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('borne_min') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line{{ $errors->has('borne_max') ? ' has-error' : '' }}">
                                <input type="number" id="borne_max" name="borne_max" class="form-control" placeholder="Borne Max">
                                @if ($errors->has('borne_max'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('borne_max') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line{{ $errors->has('date_experience') ? ' has-error' : '' }}">
                                <input type="date" id="date_experience" name="date_experience" class="form-control" placeholder="Date Exprience">
                                @if ($errors->has('date_experience'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('date_experience') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>

                        <input type="submit" id="save" value="Save" class="btn btn-primary">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
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


    <script>

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#add_experience').on('click',function () {
            console.log('add-click', 'ça passe');


            $('#add_experience_modal').modal('show');
            $('#insert_form').trigger('reset');


//                $('#save').val('save');
            $('#insert_form').on('submit', function (e) {
                e.preventDefault();
//                alert('toto');
                var url = $('#insert_form').attr('action');
                var data = $('#insert_form').serialize();
                var type = 'POST';

                if ($('#nom_operateur').val() == '') {
                    alert("le nom de l'operateur est requis");
                }
                else if ($('#borne_min').val() == '') {
                    alert("le numero de depart representant la borne minimale est requis");
                }
                else if ($('#borne_max').val() == '') {
                    alert("le numero de fin representant la borne maximale est requis");
                }
                else if ($('#date_experience').val() == '') {
                    alert("la date de l'experience est requise");
                }
                else {
                    $.ajax({
                        type: type,
                        url: url,
                        data: data,
                        success: function (data) {
                            console.log(data, 'insert')
                            /*$('#insert_form')[0].reset();
                             $('#add_data_Modal').modal('hide');
                             $('#membre_table').html(data);*/

                            var row = '<tr id="experiences' + data.id + '" >' +
                                    '<td>' + data.nom_operateur + '</td>' +
                                    '<td>' + data.borne_min + '</td>' +
                                    '<td>' + data.borne_max + '</td>' +
                                    '<td>' + data.date_experience + '</td>' +
                                    '<td>  ' +
                                    '<a class="btn btn-xs btn-default" data-operateur="' +  data.nom_operateur + '" href ="/download?id=' + data.id + '?operateur=' + data.nom_operateur + '" title="Telcharger"><span class="fa fa-download"></span></a></td>' +
                                    '</tr>';

                                $('tbody').prepend(row);
                            window.location.reload();

                        }

                    });

                }
            });

        });



//
//        $('#insert_form').on('submit', function (e) {
//            e.preventDefault();
//            alert('toto');
//
////            if($('#nom_operateur').val()=='')
////            {
////                alert("le nom de l'operateur est requis");
////            }
////            else if($('#borne_min').val()=='')
////            {
////                alert("le numero de depart representant la borne minimale est requis");
////            }
////            else if($('#borne_max').val()=='')
////            {
////                alert("le numero de fin representant la borne maximale est requis");
////            }
////            else if ($('#date_experience').val()=='') {
////                alert("la date de l'experience est requise");
////            }
////            else
////            {
////                $.ajax({
////                    type: type,
////                    url: url,
////                    data: data,
////                    success:function (data) {
////                        console.log(data, 'insert')
////                        /*$('#insert_form')[0].reset();
////                         $('#add_data_Modal').modal('hide');
////                         $('#membre_table').html(data);*/
////
////                        var row = '<tr id="experiences'+ data.id+'" >' +
////                                '<td>' + data.nom_operateur + '</td>' +
////                                '<td>' + data.borne_min + '</td>' +
////                                '<td>' + data.borne_max + '</td>' +
////                                '<td>' + data.date_experience + '</td>' +
////                                '<td>  ' +
////                                '<button class="btn btn-xs btn-info" name="edit" id="edit" data-id="' + data.id + '" title="modifier" ><span class="fa fa-pencil"></span></button> ' +
////                                '<button class="btn btn-xs btn-danger" data-id="' + data.id + '"title="Supprimer"><span class="fa fa-times"></button>'+
////                                '</td>' +
////                                '</tr>';
////                        if (statut == 'save') {
////                            $('tbody').prepend(row);
////                        }
////                        else
////                        {
////                            $('#experiences'+ data.id).replaceWith(row);
////                            $('#add_data_Modal').modal('hide');
////                        }
////
////
////                    }
//////
//////                });
//////            }
//        })
    </script>
@stop