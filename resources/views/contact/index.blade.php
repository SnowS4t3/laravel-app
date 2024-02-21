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
        <body>
            <form action="confirm.php" method="POST">
                <div class="form">
                    <div class="">
                        <label for="name"><td>名前</td><span>必須</span></label>
                        <div class="">
                            <input type="text" name="name" value="<?php echo $_POST["name"]; ?>">
                        </div>
                    </div>

                    <div class="">
                        <label for="mail"><td>メールアドレス</td><span>必須</span></label>
                        <div class="">
                            <input type="text" name="mail" value="<?php echo $_POST["mail"]; ?>">
                        </div>
                    </div>

                    <div class="">
                        <label for="comment"><td>本文</td><span>必須</span></label>
                        <div class="">
                            <input type="text" name="comment" value="<?php echo $_POST["comment"]; ?>">
                        </div>
                    </div>
                    
                    <div class="submit">
                        <input type=submit value="入力内容を確認する">
                    </div>

                </div>
            
            </form>
                    
        </body>

        
        {{-- <form method="POST" action="confirm.php">
            <label for="name">お名前</label><span>必須</span><br>
            <input type="text" id="name" name="name"><br>
            <label for="email">メールアドレス</label><span>必須</span>
            <input type="email" id="email" name="email"><br>
            <label for="comment">お問い合わせ内容</label><span>必須</span>
            <input type="text" name="comment" id="comment"><br>
            <input type="submit" value="送信">
        </form> --}}

