<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="shortcut icon" href="{{asset('energia.png')}}">
        <style>
            body{
                font-family: "Trebuchet MS";
                font-weight:bold;
                background-color: #107485;
            }
            .chart{
                max-width: 800px;
                height: 300px;
                margin: 10px;
                padding: 0;
                box-shadow: 0 1px 20px black;
                border-radius: 10px;
                background-color: white;
            }
            .linha{
                display: flex;
                justify-content: center;
                margin: 10px 0 10px 0;
            }
            .measure{
                max-width: 1000px; 
                min-width: 700px;
                border-radius: 10px;
            }
            p{
                padding: 0;
                margin: 0;
                box-shadow: 5px 0 0 white;
            }

            .container-measure{
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            h6{
                border-radius: 10px;
            }
        </style>
        <title>Medidor</title>
</head>
<body>
    <div>
        <h1 class = "text-center text-white">MEDIDOR INTELIGENTE</h1>
    </div>
    <div class="container-measure ">
        <h6 class= "text-center p-3 mb-2 bg-dark text-white">Ultimas medições:</h6>
    </div>
    <div class="container-measure">
        <div class="p-3 mb-2 bg-dark text-white row measure">
            <div class = "col">
                <p id = "measure-voltage"></p>
            </div>
            <div class = "col">
                <p id = "measure-current"></p>
            </div>
        </div>
        <div class="p-3 mb-2 bg-dark text-white row measure">
            <div class = "col">
                <p id = "measure-power"></p>
            </div>
            <div class = "col">
                <p id = "measure-energy"></p>
            </div>
        </div>
        <div class="p-3 mb-2 bg-dark text-white row measure">
            <div class = "col">
                <p id = "measure-tempR"></p>
            </div>
            <div class = "col">
                <p id = "measure-tempP"></p>
            </div>
        </div>
    </div>
    <div class = "row linha">
        <div  id = "divChart1"class = "col chart" >
            <canvas id="myChart" ></canvas>
        </div>
        <div id = "divChart2" class = "col chart" >
            <canvas id="myChart2"></canvas>
        </div>
    </div>
    <div class = "row linha">
        <div  id = "divChart3" class = "col chart" >
            <canvas id="myChart3" ></canvas>
        </div>
        <div id = "divChart4" class = "col chart">
            <canvas id="myChart4"></canvas>
        </div>
    </div>
    <!--*************************************************************************************************-->
    <!--*****************Scripts de importação: Bootstrap, Chart.js, Jquery e Ajax***********************-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <!--*************************************************************************************************-->
    <!--Script com códigos JavaScript-->
    <script>
        var context = document.getElementById('myChart').getContext('2d');
        var graph1 = new Chart(context, {
            type:'line',
            data: {
                    labels:[] , // eixo x dos dados
                    datasets: [{   // dados do eixo y
                        label: 'Potência (W)', //descriminação do dado
                        data: [], //o dado
                        backgroundColor: ['rgba(75,0,130,1)'], //cor de fundo
                        borderColor: ['rgba(75,0,130,1)'], // cor da borda
                        borderWidth: 1, //largura da borda
                        pointRadius: 1 //largura do ponto
                    },{   // dados do eixo y
                        label: 'Energia (Wh)', //descriminação do dado
                        data: [], //o dado
                        backgroundColor: ['rgba(100, 162, 235, 1)'], //cor de fundo
                        borderColor: ['rgba(100, 162, 235, 1)'], // cor da borda
                        borderWidth: 1, //largura da borda
                        pointRadius: 1 //largura do ponto
                    }]
                },
            options: {
                scales:{
                        y:{
                            beginAtZero: true,
                            ticks:{
                                min: 0,
                                stepSize: 10
                            }
                        }
                    },
                maintainAspectRatio: false,
                showLine: false,
                animation: false
            },
        });

        context = document.getElementById('myChart2').getContext('2d');
        var graph2 = new Chart(context, {
            type:'line',
            data: {
                    labels:[] , // eixo x dos dados
                    datasets: [{   // dados do eixo y
                        label: 'Corrente (A)', //descriminação do dado
                        data: [], //o dado
                        backgroundColor: ['rgba(75,0,130,1)'], //cor de fundo
                        borderColor: ['rgba(75,0,130,1)'], // cor da borda
                        borderWidth: 1, //largura da borda
                        pointRadius: 1 //largura do ponto
                    }]
                },
            options: {
                scales:{
                        y:{
                            beginAtZero: true,
                            ticks:{
                                min: 0,
                                stepSize: 10
                            }
                        }
                    },
                maintainAspectRatio: false,
                showLine: false,
                animation: false
            },
        });
        
        context = document.getElementById('myChart3').getContext('2d');
        var graph3 = new Chart(context, {
            type:'line',
            data: {
                    labels:[] , // eixo x dos dados
                    datasets: [{   // dados do eixo y
                        label: 'Temperatura Ambiente (°C)', //descriminação do dado
                        data: [], //o dado
                        backgroundColor: ['rgba(75,0,130,1)'], //cor de fundo
                        borderColor: ['rgba(75,0,130,1)'], // cor da borda
                        borderWidth: 1, //largura da borda
                        pointRadius: 1 //largura do ponto
                    },{   // dados do eixo y
                        label: 'Temperatura da Placa (°C)', //descriminação do dado
                        data: [], //o dado
                        backgroundColor: ['rgba(100, 162, 235, 1)'], //cor de fundo
                        borderColor: ['rgba(100, 162, 235, 1)'], // cor da borda
                        borderWidth: 1, //largura da borda
                        pointRadius: 1 //largura do ponto
                    }]
                },
            options: {
                scales:{
                        y:{
                            beginAtZero: true,
                            ticks:{
                                min: 0,
                                stepSize: 10
                            }
                        }
                    },
                maintainAspectRatio: false,
                showLine: false,
                animation: false
            },
        });

        context = document.getElementById('myChart4').getContext('2d');
        var graph4 = new Chart(context, {
            type:'line',
            data: {
                    labels:[] , // eixo x dos dados
                    datasets: [{   // dados do eixo y
                        label: 'Tensão (V)', //descriminação do dado
                        data: [], //o dado
                        backgroundColor: ['rgba(75,0,130,1)'], //cor de fundo
                        borderColor: ['rgba(75,0,130,1)'], // cor da borda
                        borderWidth: 1, //largura da borda
                        pointRadius: 1.5 //largura do ponto
                    }]
                },
            options: {
                scales:{
                        y:{
                            beginAtZero: true,
                            ticks:{
                                min: 0,
                                stepSize: 10
                            }
                        }
                    },
                maintainAspectRatio: false,
                showLine: false,
                animation: false
            },
        });

        /**
         * Função que faz uma requisição AJAX ao backend PHP para capturar dados do
         * banco de dados e plotar esses dados no gráfico.
         */
        function atualizarGraficos(){
            $.ajax({
                url: "{{route('atualizer')}}",  // url onde o ajax fará a requisição
                type: "get",                    // tipo da requisição que será feita.
                dataType: "json",               // tipo do retorno da requisição
                
                /**
                 * função que será executada caso a requisição tenha sucesso
                 * Parâmetros:
                 *      response -> request que será enviado pela rota mensionada
                 */
                success: function(response){

                    console.log('reload');

                    graph1.data.labels = response.tempo;
                    graph1.data.datasets[0].data = response.potencia;
                    graph1.data.datasets[1].data = response.energia;
                    graph1.update();

                    graph2.data.labels = response.tempo;
                    graph2.data.datasets[0].data = response.corrente;
                    graph2.update();

                    graph3.data.labels = response.tempo;
                    graph3.data.datasets[0].data = response.temperatura_ambiente;
                    graph3.data.datasets[1].data = response.temperatura_placa;
                    graph3.update();

                    graph4.data.labels = response.tempo;
                    graph4.data.datasets[0].data = response.tensao;
                    graph4.update();

                    document.getElementById('measure-voltage').innerHTML =
                        "TENSÃO: " + response.tensao[response.tensao.length - 1] + " V";
                    document.getElementById('measure-current').innerHTML =
                        "CORRENTE: " + response.corrente[response.corrente.length - 1] + " A";
                    document.getElementById('measure-power').innerHTML =
                        "POTÊNCIA: " + response.potencia[response.potencia.length - 1] + " W";
                    document.getElementById('measure-energy').innerHTML =
                        "ENERGIA: " + response.energia[response.energia.length - 1] + " W/h";
                    document.getElementById('measure-tempR').innerHTML =
                        "TEMPERATURA AMBIENTE: " + response.temperatura_ambiente[response.temperatura_ambiente.length - 1] + "°C";
                    document.getElementById('measure-tempP').innerHTML =
                        "TEMPERATURA DA PLACA: " + response.temperatura_placa[response.temperatura_placa.length - 1] + "°C";
                }
            });
        }


        /**
         * Executa a função passada como parâmetro assim que a página é carregada. 
         */
        $(document).ready(function(){
            atualizarGraficos();
        });

        
        /**
         * Determina um intervalo para a função passada como parâmetro ser executada
         * periodicamente.
         */
        setInterval(() => {
            atualizarGraficos();
        }, 5000);
    </script>
</body>
</html>
