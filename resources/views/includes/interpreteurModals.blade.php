<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
                <h4 class="modal-title custom_align" id="Heading">Modifier</h4>
            </div>
            <form role="form" method="post" id="updateForm" action="update" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="row hide" data-step="1" data-title="This is step!">
                        <div class="container-fluid">
                            <h3> Informations personnelles</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Nom</label>
                                        <input class="form-control" value="{{ old('nom') }}" name="nom" id="nom" placeholder="Nom">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Prenom</label>
                                        <input class="form-control" value="{{ old('prenom') }}" name="prenom" id="prenom" placeholder="Prenom">
                                    </div>
                                </div>
                                <input type="hidden" value="-1" readonly="readonly" id="id" name="id" class="form-control"/>
                                <input type="hidden" value="-1" readonly="readonly" id="adr" name="adresse_id" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Email: </label>
                                <input type="text" value="-1" id="email" name="email" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>nationalite</label>
                                <input class="form-control" value="{{ old('nationalite') }}" id="nationalite"  name="nationalite" placeholder="nationalite">
                            </div>
                            <div class="form-group">
                                <label>Image : </label>
                                <input type="file" name="image" />
                            </div>
                            <div class="form-group">
                                <label>CV : </label>
                                <input type="file" name="cv">
                            </div>
                            <div class="form-group">
                                <label>CV Anonyme : </label>
                                <input type="file" name="cv_anonyme">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Prix préstation</label>
                                        <input class="form-control" value="{{ old('prestation') }}" id="prestation"  name="prestation" placeholder="Prestation">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Devise</label>
                                        <select name="devise" id="devise" class="form-control">
                                            <option value="Dollar">Dollar</option>
                                            <option value="Euro">Euro</option>
                                            <option value="DH">DH</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Tel fixe: </label>
                                        <input type="text" value="-1" id="tel_fixe" name="tel_fixe" class="form-control"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Tel portable: </label>
                                        <input type="text" value="-1" id="tel_portable" name="tel_portable" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hide" data-step="2" data-title="Traductions">
                        <div class="container-fluid">
                            <h3> Adresse</h3>
                            @include('includes.adresseForm')
                        </div>
                    </div>
                    <div class="row hide" data-step="3" data-title="Traductions">
                        <div class="container-fluid">
                            <h3> Traductions</h3>
                            <div class="row container-fluid">
                                <table id="oldLangs">
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div id="langs">
                                <div class="entry input-group">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label>Langue initiale</label>
                                                <select class="form-control col-lg-3" name="langue_src[]">
                                                    <option value="" disabled selected>Langue initiale</option>
                                                    @foreach($langues as $langue)
                                                        @if($langue->id == old('langue_ini'))
                                                            <option value="{{$langue->id}}" selected>{{$langue->content}}</option>
                                                        @else
                                                            <option value="{{$langue->id}}">{{$langue->content}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-5">
                                                <label>Langue destination</label>
                                                <select class="form-control col-lg-3" name="langue_dest[]" >
                                                    <option value="" disabled selected>Langue destination</option>
                                                    @foreach($langues as $langue)
                                                        @if($langue->id == old('langue_dest'))
                                                            <option value="{{$langue->id}}" selected>{{$langue->content}}</option>
                                                        @else
                                                            <option value="{{$langue->id}}">{{$langue->content}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <label></label>
                                                <span class="input-group-btn">
                                                  <a class="btn btn-success btn-add glyphicon glyphicon-plus" type="button"></a>
                                              </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning js-btn-step" data-orientation="previous"></button>
                    <button type="button" class="btn btn-success js-btn-step" data-orientation="next"></button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> êtes vous sur de vouloir supprimer l’interprète?</div>
                </div>
                <div class="modal-footer ">
                    <input class="btn btn-success" value="Oui" type="submit"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                </div>
            </form>
        </div>
    </div>
</div>