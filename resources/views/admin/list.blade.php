<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

 
<div style="position:relative;width:250px;height:250px;">
    <canvas id="myChart"></canvas>
</div>
   

<div class="form_list">
    <body>

        <table class="contact-table">
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせ内容</th>
                    <th>状態</th>
                    <th>詳細</th>
                    <th>更新日時</th>
                    <th>削除</th>
                </tr>
            </thead>

            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->mail }}</td>
                <td>{{ $contact->comment }}</td>
                <td>
                    <span class="label {{ $contact->status_class }}">{{ $contact->status_label }}</span>
                </td>
                <td><a href="{{route('admin.detail', ['id' => $contact->id])}}" class="button-list">詳細</a></td>
                <td><time>{{ date('Y年n月j日', strtotime($contact->updated_at)) }}</time></td>
                <td>
                    <form action="{{ route('admin.destroy', ['id' => $contact->id]) }}" method="post">
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