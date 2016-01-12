@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nouvelle tâche
                </div>

                <div class="panel-body">
                    <!-- Afficher les erreurs de validation -->
                    @include('common.errors')

                    <!-- Nouveau formulaire de tache -->
                    <form action="/task" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Nom de la tache -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Tâche</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
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
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tâches courantes
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Tâche</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text"><div>{{ $task->name }}</div></td>

                                    <!-- Bouton supprimer de la tache -->
                                    <td>
                                        <form action="/task/{{ $task->id }}" method="POST">
                                            {{ csrf_field() }}
                                            <!-- Method Spoofing: permet de générer une requete DELETE que Laravel reconnait (Route::delete) -->
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection