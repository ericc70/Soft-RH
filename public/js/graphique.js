var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Lundi', 'Mardi', 'Mercredi','Jeudi','Vendredi','Samedi','Dimanche'],
        datasets: [
            {
            label: 'heureux',
            data: [46,52,5,75,32,45,50],
           
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
                5,
            ],
            

      
          },{
            label: 'Stressé',
            data: [4,24,53,8,10,25,42],
           
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
                data: [35,62,4,54,45,3,44],
               
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
                stacked: false,
                
                ticks: {
                    fontSize: 25, 
                    beginAtZero: true,
                    type: 'myScale' // this is the same key that was passed to the registerScaleType function
                }
            }],
            xAxes: [{
                ticks: {
                    fontSize: 25
                }
            }]
        }
    }
});
