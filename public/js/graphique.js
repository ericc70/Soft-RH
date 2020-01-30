var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Lundi', 'Mardi', 'Mercredi','Jeudi','Vendredi','Samedi','Dimanche'],
        datasets: [
            {
            label: 'heureux',
            data: [0,0,0,0,0,0,10],
           
            borderColor: [
                
                'green',
              
            ],
            pointBackgroundColor:[
                'green',
                'green',
                'green',
                'green',
                'green',
                'green',
                'green',
                //repère de valeur
            ],
            borderWidth:[
                3,
            ],

      
          },{
            label: 'Stressé',
            data: [0,0,0,0,0,0,10],
           
            borderColor: [
                
                'yellow',
              
            ],
            pointBackgroundColor:[
                'yellow',
                'yellow',
                'yellow',
                'yellow',
                'yellow',
                'yellow',
                'yellow',
                //repère de valeur
            ],
            borderWidth:[
                3,
            ],
        },{
                label: 'fatigué',
                data: [0,0,0,0,0,0,10],
               
                borderColor: [
                    
                    'red',
                  
                ],
                pointBackgroundColor:[
                    'red',
                    'red',
                    'red',
                    'red',
                    'red',
                    'red',
                    'red',
                    //repère de valeur
                ],
                borderWidth:[
                    3,
                ],

        
          }
        ],
     
          
          
          
    },
    
    options: {
        title: {
            display: true,
            text: 'Humeur de la semaine'
        },
        scales: {
            yAxes: [{
                stacked: true,

                ticks: {
                    beginAtZero: true,
                    type: 'myScale' // this is the same key that was passed to the registerScaleType function
                }
            }]
        }
    }
});
