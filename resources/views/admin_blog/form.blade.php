<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>記事投稿フォーム</title>

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ asset('/js/modal.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12">
                    {{-- if 文による条件分岐 --}}
                    @if (session('message'))
                    <div class="card green lighten-4">
                        <div class="card-content green-text">
                            {{-- セッションヘルパーを使ってキーを指定し、セッションに保存されたデータを表示 --}}
                            <p>{{ session('message') }}</p>
                        </div>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="card red lighten-4">
                        <div class="card-content red-text">
                            <ul>
                                {{-- foreach 文によるループ --}}
                                {{-- エラーメッセージがあれば全て表示 --}}
                                @foreach ($errors->all as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="card-panel">
                        <h4 class="">記事投稿フォーム</h4>
                        <form action="{{ route('admin_post') }}" method="POST">
                            <div class="input-field">
                                <input type="text" id="title" name="title" class="validate">
                                <label for="title">記事タイトル</label>
                            </div>
                            <div class="input-field">
                                <textarea id="body" name="body" class="materialize-textarea" rows="10"></textarea>
                                <label for="body">本文</label>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="action">投稿する
                                <i class="material-icons right">send</i>
                            </button>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal Default</a>

            <!-- Modal Structure -->
            <div id="modal1" class="modal">
              <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
              </div>
              <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Disagree</a>
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
              </div>
            </div>
        </div>
    </div>
</body>
</html>
