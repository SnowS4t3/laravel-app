<!DOCTYPE html>
    <head>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
        <div class="box_step">
            <ul>
                <li>
                    <span>入力</span>
                </li>
                <li class="active">
                    <span>確認</span>
                </li>
                <li>
                    <span>完了</span>
                </li>
            </ul>
        </div>
        <form action="{{ route('contact.send')}}" method="POST">
            @csrf
            <div class="form">
                <div class="form_title">
                    <td>名前</td><span>必須</span>
                    <div class="form_input">
                        <input type="hidden" name="name" value="{{ $name }}">
                        {{ $name }}
                    </div>
                </div>

                <div class="form_title">
                    <td>メールアドレス</td><span>必須</span>
                    <div class="form_input">
                        <input type="hidden" name="mail" value="{{ $mail }}">
                        {{ $mail }}
                    </div>
                </div>

                <div class="form_title">
                    <td>本文</td><span>必須</span>
                    <div class="form_input">
                        <input type="hidden" name="comment" value="{{ $comment }}">
                        {{ $comment }}
                    </div>
                </div>
                
                    <div class="submit">
                        <input type=submit  value="送信" class="button">
                    </div>
                    
            </div>
        
        </form>