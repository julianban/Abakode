/*  INDEX RELATED */
function searchOnLogTable(string){
  console.log('timer scaduto');
  loadLogTable()
}

function checkFilledFormFind(){
  const form_select_id = ['#select-brand','#select-item','#select-city']; 
  var filled = true;  
  
  for (let i = 0; i < form_select_id.length; i++) {
    if( $(form_select_id[i]).val() == ''){
      filled = false;
      $(form_select_id[i]).attr('style','border: 2px solid; border-color: red;');
    }else{
      $(form_select_id[i]).removeAttr('style');
    }
  }
  
  if(filled){
    $('#warning-message').hide();
    return true;
  }else{
    $('#warning-message').show();
    return false;
  }
}

//open on new tab log table page
function gotoLogTablePage(){
  window.location.href = 'log-table.php';
}

function showNotFoundMessage(){
  $('#not-found-message').show();
}

function hideNotFoundMessage(){
  $('#not-found-message').hide();
}

/* LOG TABLE RELATED*/


//when typing on search bar (binded with the log-table), start a timer
//which validate the text-input when it ends
var typingTimer;          
var doneTypingInterval = 500;
const search_input = $('#search-bar');
function validateSearchBarInput(){
  clearTimeout(typingTimer);
  if (search_input.val()!='') {
      typingTimer = setTimeout(()=>{
          searchOnLogTable(search_input.value);
      }, doneTypingInterval);
  }
}


/* ADD DATA RELATED */

function checkBrandSelectOption(){
  if($('#select-brand').val() == 'Add new brand'){
    $('#input-new-brand').removeAttr('disabled');
    
  }else{
    $('#input-new-brand').attr('disabled','true');
    $('#input-new-brand').val(null);
  }
}

function checkFilledFormAdd(){
  var form_element_id = ['#input-new-item','#input-new-brand','#input-new-address','#input-new-city'];
  if($('#select-brand').val() != 'Add new brand' && $('#input-new-brand').val() == '') {
    form_element_id[1] = '#select-brand';
    $('#input-new-address').removeAttr('style');
  }
  console.log(form_element_id[1]);
  var filled = true;

  for (let i = 0; i < form_element_id.length; i++) {
    if($(form_element_id[i]).val() == ''){
      $(form_element_id[i]).attr('style','border: 2px solid; border-color: red');
      filled = false;
    }else{
      $(form_element_id[i]).removeAttr('style');
    }
  }

  if(filled){
    $('#warning-message').hide();
    return true;
  }else{
    $('#warning-message').show();
    return false;
  }

}
