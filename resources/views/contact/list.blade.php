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
                <from action="{{ route('contact.destroy',['id'=>$contact->id]) }}" method="POST" >
                    @csrf
                    <button type="submit" class="btn btn-danger">削除</button>
                </from>
            </td>
        </tr>
        @endforeach
    </tbody>
</body>