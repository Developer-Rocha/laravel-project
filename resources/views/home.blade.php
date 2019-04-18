@extends('layouts.app')

@section('content')
<div class="container" ng-controller="TaskController" ng-init="init()">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-primary btn-xs pull-right" ng-click="openModal()">Add Produto</button>
                        Task @{{meunome}}
                    </div>
 
                    <div class="panel-body">
                       
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Produto</th>
                                <th>Descrição</th>
                                <th>Action</th>
                            </tr>
                            <tr ng-repeat="(index, x) in produtos">
                                <td>@{{ x.produto }}</td>
                                <td>@{{ x.descricao }}</td>
                                <td>
                                    <button class="btn btn-success btn-xs" ng-click="initEdit(index)">Edit</button>
                                    <button class="btn btn-danger btn-xs" ng-click="deleteProduto(index)" >Delete</button>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="add_new_produto">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Task</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" ng-if="errors.length > 0">
                            <ul>
                                <li ng-repeat="error in errors">@{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="produto">Produto</label>
                            <input type="text" name="produto" class="form-control" ng-model="initData.produto">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" rows="5" class="form-control"
                                    ng-model="initData.descricao"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="addProduto()">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
 
    </div>

@endsection


