<!DOCTYPE html>
<head>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<div class="form_list">
    <body>

        <table class="contact-table">
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせ内容</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            @foreach ($contact as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->mail }}</td>
                <td>{{ $contact->comment }}</td>
                <td><a href="{{route('contact.detail', ['id' => $contact->id])}}" class="button-list">詳細</a></td>
                <td>
                    <form action="{{ route('contact.destroy', ['id' => $contact->id]) }}" method="post">
                        @csrf
                        @method('DElETE')
                        <button type="submit" class="button-list" onClick="return confirm('本当に削除しますか？')">削除する</button>
                    </form>      
                    
                    
                    
                </td>
            </tr>
            @endforeach
        </table>
    </body>
</div>