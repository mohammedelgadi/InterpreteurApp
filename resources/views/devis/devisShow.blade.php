@extends('layouts.layout')

@section('title')
    La liste des devis
@endsection

@section('header')
    <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" />
    <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap-datatable.css')}}">
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/myStyle.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/success.css')}}" />
    <script type="text/javascript" src="{{ asset('js/jquery.popconfirm.js')}}"></script>
@endsection

@section('content')



<div class="row">
    <h1 class="center"> Liste des devis </h1>
</div>

<div class="searchDiv row" style="margin-bottom: 30px;margin-top: 20px">
    <a href="#search" data-toggle="collapse">+ Recherche avancée</a>
    <div id="search" class="row collapse">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <h3 class="col-lg-4">Recherche avancée</h3>
                    </div>
                </div>
                <form role="form" method="POST" action="/devis/list" id="formID" enctype="multipart/form-data" class="col-lg-10 col-lg-offset-1">
                    {!! csrf_field() !!}
                    <div class="container-fluid">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="row"></div>
                                    <label>Date de la creation:</label>
                                </div>
                                <div class="col-lg-4">
                                    <label>Debut:</label>
                                    <div class="input-group date" >
                                        <input class="form-control" name="dateCreationDeb" id="dateCreateDeb" placeholder="Date min">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Fin:</label>
                                    <div class="input-group date" >
                                        <input class="form-control" name="dateCreationFin" id="dateCreateFin" placeholder="Date max">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <input type="submit" value="Recherche" class="btn btn-info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1">
                    Devis créés
                </a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse">
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered display responsive nowrap" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="never">id</th>
                            <th>Prix proposé</th>
                            <th>Demande</th>
                            <th>Client</th>
                            <th>Date creation du devis</th>
                            <th>Date modification du devis</th>
                            <th>Resend</th>
                            <th>Show</th>
                            <th>Edit/Delete</th>
                            <th>Reserver</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Prix proposé</th>
                            <th>Demande</th>
                            <th>Client</th>
                            <th>Date creation du devis</th>
                            <th>Date modification du devis</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($devis as $devi)
                            @if($devi->etat_id == 1)
                            <tr>
                                <td>{{$devi->id}}</td>
                                <td>{{\App\Tools\DevisTools::getTotal($devi->id)}} &euro;</td>
                                <td><a href="/demande/update?id={{\App\Tools\DemandeTools::getDemande($devi->demande_id)->id}}">{{\App\Tools\DemandeTools::getDemande($devi->demande_id)->titre}}</a></td>
                                <td><a href="/client/profile?id={{\App\Tools\DemandeTools::getDemande($devi->demande_id)->client_id}}">{{\App\Tools\ClientTools::getClient(\App\Tools\DemandeTools::getDemande($devi->demande_id)->client_id)->nom}} {{\App\Tools\ClientTools::getClient(\App\Tools\DemandeTools::getDemande($devi->demande_id)->client_id)->prenom}}</a></td>
                                <td>{{$devi->created_at->format('l j F Y H:i')}}</td>
                                <td>{{$devi->updated_at->format('l j F Y H:i')}}</td>
                                <td>
                                    <a href="home" id="resend{{$devi->id}}" data-id="{{$devi->id}}" class="resendButton"> <span class="glyphicon glyphicon-refresh"></span> </a>
                                </td>
                                <td>
                                    <a href="/devis/view?id={{$devi->id}}" class="viewButton"> <span class="glyphicon glyphicon-eye-open"></span> </a>
                                </td>
                                <td>
                                    <a href="/devis/update?id={{$devi->id}}" class="editor_edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                    /
                                    <a id="delete{{$devi->id}}" data-id="{{$devi->id}}" href="/devis/delete?id={{$devi->id}}" class="editor_remove"><span class="glyphicon glyphicon-trash" ></span></a>
                                </td>
                                <td><a id="validate{{$devi->id}}" href="/devis/validate?id={{$devi->id}}" class="validateButton"><span class="glyphicon glyphicon-ok"></span></a></td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse2">
                    Commandes en cours
                </a>
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse">
            <div class="panel-body">
                <table id="tableCommande" class="table table-striped table-bordered display responsive nowrap" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="never">id</th>
                        <th>Prix proposé</th>
                        <th>Demande</th>
                        <th>Client</th>
                        <th>Date creation du devis</th>
                        <th>Date modification du devis</th>
                        <th>Resend</th>
                        <th>Show</th>
                        <th>Edit/Delete</th>
                        <th>Factuer</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Prix proposé</th>
                        <th>Demande</th>
                        <th>Client</th>
                        <th>Date creation du devis</th>
                        <th>Date modification du devis</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($devis as $devi)
                        @if($devi->etat_id == 2)
                        <tr>
                            <td>{{$devi->id}}</td>
                            <td>{{\App\Tools\DevisTools::getTotal($devi->id)}} &euro;</td>
                            <td><a href="/demande/update?id={{\App\Tools\DemandeTools::getDemande($devi->demande_id)->id}}">{{\App\Tools\DemandeTools::getDemande($devi->demande_id)->titre}}</a></td>
                            <td><a href="/client/profile?id={{\App\Tools\DemandeTools::getDemande($devi->demande_id)->client_id}}">{{\App\Tools\ClientTools::getClient(\App\Tools\DemandeTools::getDemande($devi->demande_id)->client_id)->nom}} {{\App\Tools\ClientTools::getClient(\App\Tools\DemandeTools::getDemande($devi->demande_id)->client_id)->prenom}}</a></td>
                            <td>{{$devi->created_at->format('l j F Y H:i')}}</td>
                            <td>{{$devi->updated_at->format('l j F Y H:i')}}</td>
                            <td>
                                <a href="home" id="resend{{$devi->id}}" data-id="{{$devi->id}}" class="resendButton"> <span class="glyphicon glyphicon-refresh"></span> </a>
                            </td>
                            <td>
                                <a href="/devis/view?id={{$devi->id}}" class="viewButton"> <span class="glyphicon glyphicon-eye-open"></span> </a>
                            </td>
                            <td>
                                <a href="/devis/update?id={{$devi->id}}" class="editor_edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                /
                                <a id="delete{{$devi->id}}" data-id="{{$devi->id}}" href="/devis/delete?id={{$devi->id}}" class="editor_remove"><span class="glyphicon glyphicon-trash" ></span></a>
                            </td>
                            <td><a id="validate{{$devi->id}}" href="/devis/validate?id={{$devi->id}}" class="validateButton"><span class="glyphicon glyphicon-ok"></span></a></td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse3">
                    Devis validés
                </a>
            </h4>
        </div>
        <div id="collapse3" class="panel-collapse">
            <div class="panel-body">
                <table id="tableValide" class="table table-striped table-bordered display responsive nowrap" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="never">id</th>
                        <th>Prix proposé</th>
                        <th>Demande</th>
                        <th>Client</th>
                        <th>Date creation du devis</th>
                        <th>Date modification du devis</th>
                        <th>Show</th>
                        <th>Edit/Delete</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Prix proposé</th>
                        <th>Demande</th>
                        <th>Client</th>
                        <th>Date creation du devis</th>
                        <th>Date modification du devis</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($devis as $devi)
                        @if($devi->etat_id == 3)
                            <tr>
                                <td>{{$devi->id}}</td>
                                <td>{{\App\Tools\DevisTools::getTotal($devi->id)}} &euro;</td>
                                <td><a href="/demande/update?id={{\App\Tools\DemandeTools::getDemande($devi->demande_id)->id}}">{{\App\Tools\DemandeTools::getDemande($devi->demande_id)->titre}}</a></td>
                                <td><a href="/client/profile?id={{\App\Tools\DemandeTools::getDemande($devi->demande_id)->client_id}}">{{\App\Tools\ClientTools::getClient(\App\Tools\DemandeTools::getDemande($devi->demande_id)->client_id)->nom}} {{\App\Tools\ClientTools::getClient(\App\Tools\DemandeTools::getDemande($devi->demande_id)->client_id)->prenom}}</a></td>
                                <td>{{$devi->created_at->format('l j F Y H:i')}}</td>
                                <td>{{$devi->updated_at->format('l j F Y H:i')}}</td>
                                <td>
                                    <a href="/devis/view?id={{$devi->id}}" class="viewButton"> <span class="glyphicon glyphicon-eye-open"></span> </a>
                                    /<a href="/devis/download?id={{$devi->id}}" class="downloadButton"> <span class="glyphicon glyphicon-download-alt"></span> </a>
                                </td>
                                <td>
                                    <a href="/devis/update?id={{$devi->id}}" class="editor_edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                    /
                                    <a id="delete{{$devi->id}}" data-id="{{$devi->id}}" href="/devis/delete?id={{$devi->id}}" class="editor_remove"><span class="glyphicon glyphicon-trash" ></span></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modals')
    @include('includes.popups')
    <!--Suppression popup-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
                    <h4 class="modal-title custom_align" id="headDelete"></h4>
                </div>
                <form id="deleteForm" action="delete" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" value="-1" id="idDel" name="id" />
                        </div>
                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> êtes-vous sur de vouloir supprimer?</div>
                    </div>
                    <div class="modal-footer ">
                        <input class="btn btn-success" value="Oui" type="submit"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>

    <!--Resend popup-->
    <div class="modal fade" id="resendModalDevis" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
                    <h4 class="modal-title custom_align" id="headRes"></h4>
                </div>
                <form id="deleteForm" action="resend" method="get" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" value="-1" id="idRes" name="id" />
                        </div>
                        <div class="alert alert-info"><span class="glyphicon glyphicon-refresh"></span> êtes-vous sur de vouloir renvoyer le devis?</div>
                    </div>
                    <div class="modal-footer ">
                        <input class="btn btn-success" value="Oui" id="resendDev" type="submit"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset("js/tableTools.js") }}"> </script>
    <script src="{{ asset("js/timeInitiator.js") }}"> </script>
    <script src="{{ asset("js/devisShow.js") }}"> </script>
@endsection