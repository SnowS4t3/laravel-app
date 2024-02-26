<!DOCTYPE html>
<head>お問い合わせ一覧</head>

<body>
    <table class="table table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>メールアドレス</th>
                <th>お問い合わせ内容</th>
            </tr>
        </thead>
    </table>
    <tbody>
        @foreach ($contact as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->mail }}</td>
            <td>{{ $contact->comment }}</td>
            <td><a href="{{route('contact.detail', ['id' => $contact->id])}}" class="contact-button">詳細</a></td>
            <td>
                <form action="{{ route('contact.destroy', ['id' => $contact->id]) }}" method="post">
                    @csrf
                    @method('DElETE')
                    <button type="submit" onClick="return confirm('本当に削除しますか？')">削除する</button>
                </form>      
                
                
                
            </td>
        </tr>
        @endforeach
    </tbody>
</body>