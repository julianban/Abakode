var selected_theme;




function setSelectedTheme(){
  console.log(selected_theme);
  if(selected_theme =='ligth'){
    setThemeToLight();
  }else{
    setThemeToDark();
  }
}



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
  $('#theme-style').attr('href','./assets/css/light.mode.style.css');
  $('#btn-theme-selector').removeClass('*');
  $('#btn-theme-selector').addClass('fa-solid fa-sun');
  selected_theme = 'ligth';
}


//set theme style on dark mode
function setThemeToDark(){
  $('#theme-style').attr('href','./assets/css/dark.mode.style.css');
  $('#btn-theme-selector').addClass('fa-solid fa-moon');
  selected_theme = 'dark';
}