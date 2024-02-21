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
        <form action="thanks.php" method="POST">
            <div class="form">
                <div class="">
                    <td>名前</td><span>必須</span>
                    <div class="">
                        <input type="text" name="name" value="<?php echo $_GET['name']; ?>" disabled>
                    </div>
                </div>

                <div class="">
                    <td>メールアドレス</td><span>必須</span>
                    <div class="">
                        <input type="text" name="mail" value="<?php echo $_GET['mail']; ?>" disabled>
                    </div>
                </div>

                <div class="">
                    <td>本文</td><span>必須</span>
                    <div class="">
                        <input type="text" name="comment" value="<?php echo $_GET['comment']; ?>" disabled>
                    </div>
                </div>

                    <input type="hiddden" name="name" value="<php echo $name; ?>">
                    <input type="hiddden" name="mai" value="<php echo $mail; ?>">
                    <input type="hiddden" name="name" value="<php echo $comment; ?>">
                
                    <div class="submit">
                        <input type=submit name="confirm" value="入力内容を確認する">
                    </div>
                    
            </div>
        
        </form>