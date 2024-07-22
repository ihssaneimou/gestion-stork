
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphiques interactifs avec Chart.js</title>
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }
        .chart-container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .chart-container.full-width {
            max-width: 1000px;
        }
        .charts-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .styled-select {
                padding: 5px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
                color: #333;
                outline: none;
                width: 100px;
                height: 30px;
                transition: border-color 0.3s, box-shadow 0.3s;
                margin-bottom: 10px;
            }
        @media(min-width: 640px){
            .styled-select {
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
                color: #333;
                outline: none;
                width: 150px;
                height: 40px;
                transition: border-color 0.3s, box-shadow 0.3s;
                margin-bottom: 10px;
            }
            
        }
        .styled-select:hover {
            border-color: #888;
        }
        .styled-select:focus {
            border-color: #555;
            box-shadow: 0 0 8px rgba(81, 203, 238, 0.6);
        }
        h2 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        form {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        canvas {
            width: 100%;
            max-width: 100%;
            max-height: 400px;
        }
        .no-data-message {
            text-align: center;
            color: #888;
            font-size: 16px;
            padding: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<x-nav-bar>
<body>
    <div class="charts-row">
        <div class="chart-container">
            <h2>Graphique des Catégories</h2>
            <canvas id="categoryChart"></canvas>
        </div>

        <div id="itemChartContainer" class="chart-container">
            <h2>Graphique des Marchandises</h2>
            <form id="myForm" action="{{ route('rapports.courbe') }}" method="GET">
                <select id="categorySelect" name="id_cat" class="styled-select">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ request('id_cat') == $item->id ? 'selected' : '' }}>{{ $item->nom }}</option>
                    @endforeach
                </select>
            </form>
            <div id="itemChartMessage" class="no-data-message" style="display: none;">Aucune marchandise disponible pour cette catégorie.</div>
            <canvas id="itemChart" style="display: none;"></canvas>
        </div>
    </div>

    <div class="charts-row">
        <div class="chart-container full-width">
            <h2>Graphique du Stock</h2>
            <form id="report-form" action="{{ route('rapports.courbe') }}" method="GET">
                <select id="periodeSelect" name="periode" class="styled-select">
                    <option value="day" {{ request('periode') == 'day' ? 'selected' : '' }}>Jour</option>
                    <option value="month" {{ request('periode') == 'month' ? 'selected' : '' }}>Mois</option>
                    <option value="year" {{ request('periode') == 'year' ? 'selected' : '' }}>Année</option>
                </select>
                <select id="typeSelect" name="type" class="styled-select">
                    <option value="bar" {{ request('type') == 'bar' ? 'selected' : '' }}>Barre</option>
                    <option value="line" {{ request('type') == 'line' ? 'selected' : '' }}>Ligne</option>
                </select>
            </form>
            <canvas id="stockChart" ></canvas>
        </div>
    </div>

    <div class="charts-row">
        <div class="chart-container full-width">
            <h2>Graphique des Entrées/Sorties</h2>
            <form id="report-form2" action="{{ route('rapports.courbe') }}" method="GET">
                <select id="periode2Select" name="periode2" class="styled-select">
                    <option value="day" {{ request('periode2') == 'day' ? 'selected' : '' }}>Jour</option>
                    <option value="month" {{ request('periode2') == 'month' ? 'selected' : '' }}>Mois</option>
                    <option value="year" {{ request('periode2') == 'year' ? 'selected' : '' }}>Année</option>
                </select>
                <select id="type2Select" name="type2" class="styled-select">
                    <option value="bar" {{ request('type2') == 'bar' ? 'selected' : '' }}>Barre</option>
                    <option value="line" {{ request('type2') == 'line' ? 'selected' : '' }}>Ligne</option>
                </select>
            </form>
            <canvas id="esChart"></canvas>
        </div>
    </div>

    <script>
        let itemChart;
        let stockChart;
        let esChart;
        function getRandomColor() {
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);
            return `rgba(${r}, ${g}, ${b}, 0.8)`;
        }

        function getColors(count) {
            let backgroundColors = [];
            let borderColors = [];
            for (let i = 0; i < count; i++) {
                const color = getRandomColor();
                backgroundColors.push(color);
                borderColors.push(color.replace('0.8', '1'));
            }
            return { backgroundColors, borderColors };
        }
        document.addEventListener('DOMContentLoaded', function () {
            const chartData = @json($chartData);
            const chartDataentre = @json($chartDataentre);
            const chartDatasortie = @json($chartDatasortie);
            const chartDatac = @json($chartDatac);
            const chartDatam = @json($chartDatam);
            const type = @json($type);
            const type2 = @json($type2);

            function initializeChart(ctx, type, labels, datasets) {
                return new Chart(ctx, {
                    type: type,
                    
                    innerRadius: 90,
                    data: {
                        labels: labels,
                        datasets: datasets,
                    },
                    options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: 120,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
                });
            }
            function initializeChart2(ctx, type, labels, datasets) {
                return new Chart(ctx, {
                    type: type,
                    
                    innerRadius: 90,
                    data: {
                        labels: labels,
                        datasets: datasets,
                    },
                    options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: 120,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
            onClick: (event, elements) => {
                if (elements.length > 0) {
                    const index = elements[0].index;
                    const categoryId = chartDatac[index].id;
                    updateChartDatam(categoryId);
                }
            }
                }
                });
            }
            
            const colors = getColors(chartDatac.length);
            const ctxCategory = document.getElementById('categoryChart').getContext('2d');
            initializeChart2(ctxCategory, 'doughnut', chartDatac.map(item => item.nom), [{
                label: 'Quantité',
                data: chartDatac.map(item => item.quantite),
                backgroundColor: colors.backgroundColors,
                borderColor: colors.borderColors,
                borderWidth: 1
            }]);
            const colors2 = getColors(chartDatam.length);
            const ctxItem = document.getElementById('itemChart').getContext('2d');
            itemChart = initializeChart(ctxItem, 'doughnut', chartDatam.map(item => item.nom), [{
                label: 'Quantité',
                data: chartDatam.map(item => item.quantite),
                backgroundColor: colors2.backgroundColors,
            borderColor: colors2.borderColors,
                borderWidth: 1
            }]);

            if (chartDatam.length > 0) {
                document.getElementById('itemChart').style.display = 'block';
                document.getElementById('itemChartMessage').style.display = 'none';
            } else {
                document.getElementById('itemChart').style.display = 'none';
                document.getElementById('itemChartMessage').style.display = 'block';
            }

            const ctxStock = document.getElementById('stockChart').getContext('2d');
stockChart = initializeChart(ctxStock, type, chartData.map(item => item.date), [{
    label: 'Quantité du stock',
    data: chartData.map(item => item.quantite),
    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Semi-transparent fill for area effect
    borderColor: 'rgba(54, 162, 235, 1)',
    borderWidth: 1,
    fill: true, // Enable area fill
    tension: 0.4 // Smooth curves
}], {
    scales: {
        y: {
            beginAtZero: true
        }
    }
});


            const ctxES = document.getElementById('esChart').getContext('2d');
            esChart=initializeChart(ctxES, type2, chartDataentre.map(item => item.date), [
                {
                    label: 'Entrée',
                    data: chartDataentre.map(item => item.quantite),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Sortie',
                    data: chartDatasortie.map(item => item.quantite),
                    backgroundColor: 'rgba(255, 255, 51, 0.5)',
                    borderColor: 'rgba(255, 255, 51, 1)',
                    borderWidth: 1
                }
            ]);
        });

        function updateChartDatam(categoryId) {
    $.ajax({
        url: "{{ route('updateChartDatam') }}",
        method: 'GET',
        data: { id_cat: categoryId },
        success: function(data) {
            if (itemChart) {
                if (data.length > 0) {
                    $('#itemChartMessage').hide();
                    $('#itemChart').show();
                    var labels = data.map(function(item) { return item.nom; });
                    var quantities = data.map(function(item) { return item.quantite; });
                    const colors = getColors(data.length);
                    itemChart.data.labels = labels;
                    itemChart.data.datasets[0].data = quantities;
                    itemChart.data.datasets[0].backgroundColor = colors.backgroundColors;
                    itemChart.data.datasets[0].borderColor = colors.borderColors;
                    itemChart.update();
                } else {
                    $('#itemChart').hide();
                    $('#itemChartMessage').show();
                }
            } else {
                console.error('itemChart is not defined.');
            }
        }
    });
}

        $('#categorySelect').change(function() {
            var categoryId = $(this).val();
            updateChartDatam(categoryId);
        });

        var initialCategoryId = $('#categorySelect').val();
        updateChartDatam(initialCategoryId);

        function updateChartDatastock(periode, type) {
            $.ajax({
                url: "{{ route('updateprd') }}",
                method: 'GET',
                data: { periode: periode, type: type },
                success: function(data) {
                    if (data.length > 0) {
                        var labels = data.map(function(item) { return item.date; });
                        var quantities = data.map(function(item) { return item.quantite; });

                        if (stockChart) {
                            stockChart.destroy(); 
                        }

                        var ctx = document.getElementById('stockChart').getContext('2d');
                        stockChart = new Chart(ctx, {
                            type: type,
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Quantités',
                                    data: quantities,
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1,
                                    fill: true, // Enable area fill
                                    tension: 0.4 
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    tooltip: {
                                        enabled: true
                                    }
                                }
                            }
                        });
                    } else {
                        console.error('stockChart is not defined.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });

        }

        $('#periodeSelect').change(function() {
            var periode = $(this).val();
            var type = $('#typeSelect').val();
            updateChartDatastock(periode, type);
        });

        $('#typeSelect').change(function() {
            var periode = $('#periodeSelect').val();
            var type = $(this).val();
            updateChartDatastock(periode, type);
        });

       

        function updateChartDataES(periode2, type2) {
            $.ajax({
                url: "{{ route('updatees') }}",
                method: 'GET',
                data: { periode2: periode2, type2: type2 },
                success: function(data) {
                    if (data.chartDataentre.length > 0 || data.chartDatasortie.length > 0) {
                        var labels = data.chartDataentre.map(function(item) { return item.date; });
                        var quantitiesEntre = data.chartDataentre.map(function(item) { return item.quantite; });
                        var quantitiesSortie = data.chartDatasortie.map(function(item) { return item.quantite; });

                        if (esChart) {
                            esChart.destroy(); 
                        }

                        var ctx = document.getElementById('esChart').getContext('2d');
                        esChart = new Chart(ctx, {
                            type: type2,
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: 'Entrée',
                                        data: quantitiesEntre,
                                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 1,
                                        fill: true, // Enable area fill
                                        tension: 0.4 // Smooth curves
                                    },
                                    {
                                        label: 'Sortie',
                                        data: quantitiesSortie,
                                        backgroundColor: 'rgba(255, 255, 52, 0.4)',
                                        borderColor: 'rgba(255, 255, 52, 1)',
                                        borderWidth: 1,
                                        fill: true, // Enable area fill
                                        tension: 0.4 // Smooth curves
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    tooltip: {
                                        enabled: true
                                    }
                                }
                            }
                        });
                    } else {
                        console.log('No data available');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                }
            });
        }



$('#periode2Select, #type2Select').on('change', function() {
    const selectedPeriod = $('#periode2Select').val();
    const selectedType = $('#type2Select').val();
    const url = `{{ route('rapports.courbe') }}?type2=${selectedType}&periode2=${selectedPeriod}`;
    updateChartDataES(selectedPeriod,selectedType);
});

var initialPeriode2 = $('#periodeSelect2').val();
        var initialType2 = $('#typeSelect2').val();
        var initialType2 = $('#type2Select').val();
        updateChartDataES(initialPeriode2, initialType2);
    </script>
</body>
</x-nav-bar>
</html>
