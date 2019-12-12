// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#example').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": {
          "url": "http://134.209.193.225/classes/tables.php",
          "type": "POST"
      },
      "columns": [
          { "data": "DHT" },
          { "data": "Water" },
          { "data": "pir" },
          { "data": "humidity" },
          { "data": "created_at" },
      ]
  } );
} );