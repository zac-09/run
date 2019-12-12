// Call the dataTables jQuery plugin

      //   document.getElementById('page-top').addEventListener('mousemove',soilData);


      //   function soilData(){
      //     var xhr = new XMLHttpRequest();
      //       xhr.open('GET','classes/send.php',true);
           

      //       xhr.onload = function(){
      //         if(this.status == 200){
      //              var output = '';
      //         var data = JSON.parse(this.responseText);
                
      //     output = data;

      //           document.getElementById('soil-value').innerHTML = output.DHT;
      //           document.getElementById('water-value').innerHTML = output.WATER;
      //           document.getElementById('humidity-value').innerHTML = output.HUMIDITY;
      //           document.getElementById('pir-value').innerHTML = output.PIR;
      //         }
      //       }
      // xhr.send();
      //   }

      $(document).ready(function(){
        $.ajax({
          url : "http://134.209.193.225/classes/tables.php",
          type : "GET",
          success : function(data){
            console.log(data);
      
            var labels = [];
            var values = [];
            
      
            for(var i in data) {
             
              humudity = data[i].DHT;
              $('hud').html(humudity);
             values.push(data[i].DHT);
            }


          },
          error : function(data) {
          }
        });
      
    });
        