@extends('layouts.app')
@section('content')

    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')
        <!-- バリデーションエラーの表示 -->

        <!-- 本登録フォーム -->
        <form action="{{ url('books') }}" method="POST" class="form-horizontal">
            
            {{ csrf_field() }}

            <!-- 本のタイトル -->
            <div class="form-group">
                
                <div class="col-sm-6">
                    <label for="book" class="col-sm-3 control-label">Book</label>
                    <input type="text" name="item_name" id="book-name" class="form-control" value="{{$book->item_name}}">
                </div>
                
                <div class="col-sm-6">
                    <label for="amout" class="col-sm-3 control-label">金額</label>
                    <input type="text" name="item_amout" id="book-amount" class="form-control" value="{{$book->item_amout}}" >
                </div>
                
                <div class="col-sm-6">
                    <label for="number" class="col-sm-3 control-label">数</label>
                    <input type="text" name="item_number" id="book-number" class="form-control" value="{{$book->item_number}}" >
                </div>
                
                  <div class="col-sm-6">
                    <label for="published" class="col-sm-3 control-label">公開日</label>
                    <input type="date" name="published" id="book-published" class="form-control" value="<?php echo date('Y-m-d', $book->item_number)?>"/>
                </div>    
                
            </div>

            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Save
                    </button>
                </div>
            </div>
        </form>

    
@endsection


<!--<?php echo date('Y-m-d', strtotime($book->item_number))?>-->
<!--value="{{$book->published}}"-->