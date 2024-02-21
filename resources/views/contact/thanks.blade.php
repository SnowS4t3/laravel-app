<!DOCTYPE html>
    <head>
        お問い合わせページ
    </head>
            <div class="step">
            <ul>
                <li>
                    <span>入力</span>
                </li>
                <li>
                    <span>確認</span>
                </li>
                <li class="active">
                    <span>完了</span>
                </li>
            </ul>
        </div>
        <form action="thanks.php" method="POST">
            <div class="form">
                <div class="">
                    <td>名前</td><span>必須</span>
                    <div class="">
                        <input type="text" name="name" value="<?php echo $_POST['name']; ?>" disabled>
                    </div>
                </div>

                <div class="">
                    <td>メールアドレス</td><span>必須</span>
                    <div class="">
                        <input type="text" name="name" value="<?php echo $_POST['email']; ?>" disabled>
                    </div>
                </div>

                <div class="">
                    <td>本文</td><span>必須</span>
                    <div class="">
                        <input type="text" name="name" value="<?php echo $_POST['comment']; ?>" disabled>
                    </div>
                </div>

                    <input type="hiddden" name="name" value="<php echo $name; ?>">
                    <input type="hiddden" name="email" value="<php echo $email; ?>">
                    <input type="hiddden" name="comment" value="<php echo $game; ?>">
                
                    <div class="submit">
                        <input type=submit name="confirm" value="入力内容を確認する">
                    </div>
                    
            </div>
        
        </form>