$(document).ready(()=>{
  $('#btn-goto-log').click(gotoLogTablePage);
  $('#btn-theme-dark').click(setThemeToDark);
  $('#btn-theme-light').click(setThemeToLight);
  $('#btn-theme-default').click(setThemeToDefault);
  $('#btn-submit').click(checkFormInputs);

  setThemeToDefault();
})

//set theme style on default mode, which is the system prefered theme
function setThemeToDefault(){
  const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

  if (prefersDarkScheme.matches) {
      setThemeToDark();
  } else {
      setThemeToLight();
  }
}


//set theme style on light mode
function setThemeToLight(){
  $('#theme-style').attr('href','light.mode.style.css');
  $('#btn-theme-selector').removeClass('*');
  $('#btn-theme-selector').addClass('fa-solid fa-sun');
}


//set theme style on dark mode
function setThemeToDark(){
  $('#theme-style').attr('href','dark.mode.style.css');
  $('#btn-theme-selector').removeClass('*');
  $('#btn-theme-selector').addClass('fa-solid fa-moon');
}

function searchProduct(){
  $.post('search.product.php',
  {
    brand: $('#brand-input').val(),
    item: $('#item-input').val(),
    city: $('#city-input').val()
  },
  function(){
    console.log(data);
  });
} 


function checkFormInputs(){

  const error_label = $('.error-message');
  const form_select = $('.form-select'); 
  var filled = true;

  for (let i = 0; i  < error_label.length; i++) {
    if(form_select[i] == ''){
      filled = false;
      error_label[i].attr('visibility','visible');
    }else{
      error_label[i].attr('visibility','hidden');
    }
  }

  if(filled=false){
    $('#warning-message').attr('visibility','visible');
  }else{
    $('#warning-message').attr('visibility','visible');
  }

}


//open on new tab log table page
function gotoLogTablePage(){
  window.location.href = 'log-table.php';
}

