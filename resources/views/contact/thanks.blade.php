<!DOCTYPE html>
    <head>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
        <div class="box_step">
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
        <div class="contact">
            <h2>お問い合わせを受け付けました</h2>
        </div>

        <div class="submit">
            <a href={{ route('contact.index') }} class="button">お問い合わせページに戻る</a><br>


            <a href="/" class="button">TOPに戻る</a>

                    
        </div>
        
    </form>