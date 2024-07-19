<template>
 
 <div>
    <h2 class="text-xl mb-3">Informasi Data Kost</h2>
        <div class="chart-wrap">
          <div id="chart">
        <apexchart type="donut" width="320" :options="chartOptions" :series="series"></apexchart>
      </div>
        </div>


      </div>
  </template>
  
  <script>
  export default {
    data() {
          return {
            series: [44, 55, 13],
          chartOptions: {
            chart: {
              width: 380,
              type: 'donut',
            },
            labels: ['Kost Premium', 'Kost Deluxe', 'Kost Standar'],
            dataLabels: {
              enabled: true
            },
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 100
                },
                legend: {
                  show: false
                }
              }
            }],
            legend: {
              position: 'right',
              offsetY: 0,
              height: 230,
            }
          },
          }
          
          
        },
        methods: {
          appendData: function () {
            var arr = this.series.slice()
            arr.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1)
            this.series = arr
          },
        
          removeData: function () {
            if(this.series.length === 1) return
            var arr = this.series.slice()
            arr.pop()
            this.series = arr
          },
        
          randomize: function () {
            this.series = this.series.map(function() {
              return Math.floor(Math.random() * (100 - 1 + 1)) + 1
            })
          },
        
          reset: function () {
            this.series = [44, 55, 13, 33]
          }
        },
  }
  </script>
  