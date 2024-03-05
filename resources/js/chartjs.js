import Chart from "chart.js/auto";
import axios from 'axios';

        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels:["未着手","着手中","完了"],
                    datasets:[{
                        label: '進捗状況',
                        data: [10,20,7],
                        backgroundColor: [
                            'rgba(249, 100, 100, 0.623)',
                            'rgba(86, 148, 247, 0.623)',
                            'rgba(75, 75, 75, 0.623)',
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
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 25,
                        }
                    },
                }
            });
        });
