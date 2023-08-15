@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить администатора</h3>
            </div>
            <div class="card-body">
                <form class="form-inline">

                    <div class="form-group">
                        <label>Пользователи</label>
                        <select class="form-control select2" style="width: 100%;">
                            @foreach($users as $user)
                                <option>{{ $user }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input action-radio" type="radio" name="action" id="addRadio" value="add" checked>
                                    <label class="form-check-label" for="addRadio">
                                        Добавить
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input action-radio" type="radio" name="action" id="deleteRadio" value="delete">
                                    <label class="form-check-label" for="deleteRadio">
                                        Удалить
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
