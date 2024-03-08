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
            var initialData = @json([$status[1], $status[2], $status[3]]);
            var statusCounts = @json($statusCounts);
            var initialData = Object.values(statusCounts);
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["未着手", "着手中", "完了"],
                    datasets: [{
                        label: '進捗状況',
                        data: initialData,
                        backgroundColor: [
                            'rgba(249, 100, 100, 0.623)',
                            'rgb(86, 148, 247)',
                            '#4b4b4b'
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
                    onClick: onClickChart,
                }
            });
            document.getElementById("resetButton").addEventListener("click", function () {

            myChart.data.datasets[0].data = [0];
            myChart.update();

            filterByStatus(0);
        });
    
            function onClickChart(event, data) {

            var index = data[0]?.index + 1;

             index = isNaN(index) ? 0 : index;

            myChart.data.datasets[0].data = initialData.slice(0, index);
            myChart.update();

            filterByStatus(index);
        }

        function filterByStatus(index) {
            var rows = document.querySelectorAll('.contact-table tbody tr');

            rows.forEach(function (row, i) {
                var statusCell = row.querySelector('.label');
                var rowStatus = statusCell.textContent.trim();

                if (index === 0 || rowStatus === '全て' || i + 1 >= index) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            var url = new URL(window.location.href);
            url.searchParams.set('status', index);
            window.location.href = url.toString();
        }
        document.getElementById("resetButton").addEventListener("click", function () {
            myChart.data.datasets[0].data = [0];
            myChart.update();

            // クエリパラメータ 'status' を削除
            var url = new URL(window.location.href);
            url.searchParams.delete('status');
            
            // URLを更新してページを再読み込み
            window.location.href = url.toString();
        });
    });
    </script>

<button id="resetButton">リセット</button>

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
                        <span class="label {{ $contact->status_class }}" onclick="filterByStatus('{{ $contact->status_label }}')">
                            {{ $contact->status_label }}
                        </span>
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