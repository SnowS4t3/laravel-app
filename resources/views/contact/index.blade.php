<!DOCTYPE html>
    <head>
        お問い合わせページ
    </head>
        <div class="step">
            <div class="now">入力</div>
            <div class="still">確認</div>
            <div class="still">完了</div>
        </div>
        <form action="./contactform.php" method="POST">
            <div class="form">
                <div class="">
                    <td>名前</td><span>必須</span>
                    <div class="">
                        <input type="text" name="name" value="">
                    </div>
                </div>

                <div class="">
                    <td>メールアドレス</td><span>必須</span>
                    <div class="">
                        <input type="text" name="mail" value="">
                    </div>
                </div>

                <div class="">
                    <td>本文</td><span>必須</span>
                    <div class="">
                        <input type="text" name="comment" value="">
                    </div>
                </div>
                
                    <div class="submit">
                        <input type=submit name="confirm" value="入力内容を確認する">
                    </div>

            </div>
        
        </form>