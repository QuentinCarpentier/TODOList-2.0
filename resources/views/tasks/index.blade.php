@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Nouvelle tâche
                </div>

                <div class="panel-body">
                    <!-- Afficher les erreurs de validation -->
                    @include('common.errors')

                    <!-- Nouveau formulaire de tache -->
                    <form action="link/tasks" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Nom de la tache -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tâche</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control">
                            </div>
                        </div>

                        <!-- Ajouter une tache -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Ajouter une nouvelle tâche
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Taches courantes -->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Tâches courantes
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            @if (count($tasks) > 0)
                            <th>Tâche</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="txtCheck" value=""
                                                <?php if(isset($_POST['txtCheck'])) echo "checked='checked'"; ?>>{{ $task->name }}</label>
                                        </div>

                                    </td>

                                    <!-- Bouton supprimer de la tache -->
                                    <td>

                                        <form action="{{ route('verstache',['id'=>$task->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            <!-- Method Spoofing: permet de générer une requete DELETE que Laravel reconnait (Route::delete) -->
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger pull-right">
                                                <i class="fa fa-btn fa-trash"></i>Supprimer
                                            </button>

                                        </form>
                                        <form>
                                            {{ csrf_field() }}
                                                    <!-- Method Spoofing: permet de générer une requete DELETE que Laravel reconnait (Route::delete) -->
                                            <button type="submit" id="modif-task-{{ $task->id }}" class="btn btn-success pull-right">
                                                <i class="fa fa-btn  fa-check"></i>Valider
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                Vous n'avez pas encore de tâches !
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection