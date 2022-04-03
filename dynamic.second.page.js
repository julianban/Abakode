$(document).ready(()=>{
  $('#search-bar').keyup(validateSearchBarInput);
  $('#ord-by').change(loadLogTable);
  $('#date-to').change(loadLogTable);
  loadLogTable()
})


//when typing on search bar (binded with the log-table), start a timer
//which validate the text-input when it ends
var typingTimer;          
var doneTypingInterval = 500;
const search_input = $('#search-bar');
function validateSearchBarInput(){
  clearTimeout(typingTimer);
  if (search_input.val()!='') {
      typingTimer = setTimeout(()=>{
          searchOnLogTable(search_input.value)
      }, doneTypingInterval);
  }
}

function searchOnLogTable(string){
    console.log('timer scaduto');
    loadLogTable()
}



//load log table
function loadLogTable(){
  $.post('create.log.table.php',
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
          console.log(row);
          $('#table-log').html(function(){
            var str;
            i=0;
            while(i<row.length){
              str +=
              '<tr>'+
              '<td>'+row[i].date_time+'</td>'+
              '<td>'+row[i].itemsname+'</td>'+
              '<td>'+row[i].address_location+'</td>'+
              '<td>'+row[i].city+'</td>'+
              '<td>'+row[i].name+'</td>'+
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
