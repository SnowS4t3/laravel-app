<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

</head>

<body>
 
    <div style="position:relative; width:250px; height:250px;">
        <canvas id="myChart" style="width:100%; height:100%;"></canvas>
    </div>

    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["完了", "着手中", "未着手"],
                    datasets: [{
                        label: '進捗状況',
                        data: @json([$status[1], $status[2], $status[3]]),
                        backgroundColor: [
                            '#4b4b4b',
                            'rgb(86, 148, 247)',
                            'rgba(249, 100, 100, 0.623)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54,162,253,1)',
                            'rgba(75,192,192,1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 25,
                        }
                    },
                }
            });
        });
    </script>
    

    

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
</body>