function searchProduct(e){
  e.preventDefault();

  console.log(checkFilledFormFind());
  if(checkFilledFormFind()){
    $.ajax({
      type: "POST",
      url: 'assets/php/search.product.php',
      data: $('#form-find').serialize(),
      success: function(data)
      {
        if(data == 'nessun risultato'){
          showNotFoundMessage();
        }else{
          hideNotFoundMessage();
        }
        alert(data); // show response from the php script.
      }
    });
  }
} 


function setFormSelectOptions(column, table, select_element){
  $.post('./assets/php/get.unique.values.php',
    {
      column: column,
      table: table
    },
    function(data){
      const response = data.split(';');
      for (var i = 0; i < response.length-1; i++) {
        $(select_element).append( $('<option value="'+response[i]+'">'+response[i]+'</option>') );
      }
    }
  )
}



function addToDatabase(e){
  e.preventDefault();
  if(checkFilledFormAdd()){
    console.log('è true');
    $.ajax({
      type: "POST",
      url: 'assets/php/dbupdate.php',
      data: $('#form').serialize(),
      success: function(data)
      {
        alert(data); // show response from the php script.
      }
    });
  }
}


//load log table
function loadLogTable(){
  $.post('./assets/php/create.log.table.php',
      {
          ordBy: $('#ord-by').val(),
          dateTo: $('#date-to').val(),
          keywords: $('#search-bar').val()
      },

      function(data){
        console.log($('#search-bar').val());
        if(data != ''){
          console.log(data);
          const row = JSON.parse(data);
          $('#table-log').html(function(){
            var str;
            i=0;
            while(i<row.length){
              str +=
              '<tr>'+
              '<td>'+row[i].date_time+'</td>'+
              '<td>'+row[i].itemName+'</td>'+
              '<td>'+row[i].address_location+'</td>'+
              '<td>'+row[i].city+'</td>'+
              '<td>'+row[i].brandName+'</td>'+
              '</tr>';
              i++;
            }
            return str;
          });

        }else{
          $('#table-log').text('nessun dato');
        }
      }
  );    

}