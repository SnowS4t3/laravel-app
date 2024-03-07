<!DOCTYPE html>
    <head>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
            <div class="box_step">
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
            <form action="{{route('contact.confirm')}}" method="POST">
                @csrf
                <div class="form">
                    <div class="form_title">
                        <label for="name"><td>名前</td><span>必須</span></label>
                        <div class="">
                            <input type="text" name="name" value="{{old('name')}}">
                            @if($errors->has('name'))
                                {{ $errors->first('name') }}<br>
                            @endif
                        </div>
                    </div>

                    <div class="form_title">
                        <label for="mail"><td>メールアドレス</td><span>必須</span></label>
                        <div class="">
                            <input type="text" name="mail" value="{{old('mail')}}">
                            @if($errors->has('mail'))
                                {{ $errors->first('mail') }}<br>
                            @endif
                        </div>
                    </div>

                    <div class="form_title">
                        <label for="comment">本文<span>必須</span></label>
                        <div class="form_input">
                            <textarea style="border:none;" name="comment">{{ old('comment') }}</textarea>
                            @if($errors->has('comment'))
                                {{ $errors->first('comment') }}<br>
                            @endif
                        </div>
                    </div>
                    
                    <div class="submit">
                        <input type=submit value="入力内容を確認する" class="button">
                    </div>

                </div>
            
            </form>
                    
        </body>