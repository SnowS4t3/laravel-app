<!DOCTYPE html>
    <head>
        お問い合わせページ
    </head>
            <div class="step">
            <ul>
                <li class="active">
                    <span>入力</span>
                </li>
                <li>
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
                <div class="">
                    <td>名前</td><span>必須</span>
                    <div class="">
                        <input type="text" name="name" value="{{ $name }}" disabled>
                    </div>
                </div>

                <div class="">
                    <td>メールアドレス</td><span>必須</span>
                    <div class="">
                        <input type="text" name="mail" value="{{ $mail }}" disabled>
                    </div>
                </div>

                <div class="">
                    <td>本文</td><span>必須</span>
                    <div class="">
                        <input type="text" name="comment" value="{{ $comment }}" disabled>
                    </div>
                </div>
                
                    <div class="submit">
                        <input type=submit  value="送信">
                    </div>
                    
            </div>
        
        </form>