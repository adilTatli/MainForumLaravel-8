@extends('user_panel.layouts.layout')

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
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Новая статья</h3>
               </div>
               <!-- /.card-header -->

               <form action="{{ route('user.posts.store') }}"
               role="form" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">

                     <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title" class="form-control
                        @error('title') is-invalid @enderror" id="title" placeholder="Название">
                     </div>

                     <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Описание..."></textarea>
                     </div>

                      <div class="form-group">
                          <label for="content">Текст</label>
                          <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="10" placeholder="Текст"></textarea>
                      </div>

                      <div class="form-group">
                          <label for="category_id">Категория</label>
                          <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                              @foreach($categories as $key => $category)
                                <option value="{{ $key }}">{{ $category }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="tags">Теги</label>
                          <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Выбор тегов" style="width: 100%;">
                              @foreach($tags as $key => $tag)
                                <option value="{{ $key }}">{{ $tag }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="thumbnail">Изображение</label>
                          <div class="input-group">
                              <div class="custom-file">
                                  <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                  <label class="custom-file-label" for="thumbnail">Файл</label>
                              </div>
                          </div>
                      </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Создать</button>
                  </div>
               </form>

            </div>
            <!-- /.card -->

         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
@endsection
