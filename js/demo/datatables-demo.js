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
              console.log(i);
              humudity = data[i].DHT;
              temperature = data[i].WATER;
              water_level = data[i].PIR;
              soil_moisture = data[i].HUMIDITY;
              time = data[i].created_at;
              
              html = "<tr><td >" + temperature +"</td><td> "+ water_level + "</td><td >" + humudity + "</td><td>" + soil_moisture + "</td><td>" + time + "</td></tr>";
                $("tab_data").html(html);

              
              // document.getElementById('wat').innerHTML = water_level;
              // document.getElementById('soil').innerHTML = soil_moisture;
              // document.getElementById('temp').innerHTML = temperature;
              // document.getElementById('time').innerHTML = time;
           
                





            }


          },
          error : function(data) {
          }
        });
      
    });
        