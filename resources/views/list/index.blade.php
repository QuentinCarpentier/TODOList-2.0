@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Nouvelle Liste
                </div>

                <div class="panel-body">
                    <!-- Afficher les erreurs de validation -->
                    @include('common.errors')

                            <!-- Nouveau formulaire de tache -->
                    <form action="link" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                                <!-- Nom de la tache -->
                        <div class="form-group">
                            <label for="link-name" class="col-sm-3 control-label">Liste</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="link-name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="link-body" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <input type="text" name="body" id="link-body" class="form-control">
                            </div>
                        </div>

                        <!-- Ajouter une tache -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Ajouter une nouvelle liste
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Taches courantes -->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Listes courantes
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            @if (count($links) > 0)
                            <th>Liste</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($links as $link)
                                <tr>
                                    <td class="table-text">
                                        <a href="{{ route('verstache',['id'=>$link->id]) }}">
                                            <div>{{ $link->name }}</div>
                                        </a>
                                        <div>{{ $link->body }}</div>
                                        <br>
                                        <?php
                                        $date = date('Y/m/d h:i:s a', time());
                                        ?>
                                        <div>Créé le {{ date('d-m-Y', strtotime($link->created_at)) }} par {{ Auth::user()->name }}</div>
                                    </td>

                                    <!-- Bouton supprimer de la tache -->
                                    <td>
                                        <form action="link/{{ $link->id }}" method="POST">
                                            {{ csrf_field() }}
                                                    <!-- Method Spoofing: permet de générer une requete DELETE que Laravel reconnait (Route::delete) -->
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-link-{{ $link->id }}" class="btn btn-danger pull-right">
                                                <i class="fa fa-btn fa-trash"></i>Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                Vous n'avez pas encore de liste !
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
    </div>
@endsection