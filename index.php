<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!--my style-->
    <link id='theme-style' rel="stylesheet" href="">

    <!--my font awasome icons kit-->
    <script defer src="https://kit.fontawesome.com/d904b4e5df.js" crossorigin="anonymous"></script>

    <title>Info point</title>
</head>
<body>
  

  <div class="page-layout">
  <!---------NAVIGATION BAR----------->
    <header>
      <?php include 'navbar.html'; ?> 
    </header>

    <div class="bg-image content-body">
      <!--------- CONTENT -------->  
      <div class="container-floating">
        <h1> Find product</h1>

          <!-------------form inuts------------------>
          <form id="form-find" class="form-group"">
            
            <label  class="form-label" id="brand-label"  for="brand">Brand</label>
            <label class="error-message" hidden>*must fill this field</label>
            <select class="form-select mb-2" id="select-brand"  name="brand">
              <option value=""></option>
            </select>

            <label class="form-label" id="item-label" for="item">Item name</label>
            <label class="error-message" hidden>*must fill this field</label>
            <select id="select-item" class="form-select mb-2" type="text" name="item">
              <option value=""></option>
            </select>

            <label class="form-label" id="city-label" for="city">City</label>
            <label class="error-message" hidden>*must fill this field</label>
            <select id="select-city" class="form-select mb-2" type="text" name="city">
              <option value=""></option>
            </select>

            <button id="btn-submit" class="mb-2">Submit</button>
            <div id="warning-message" class="alert alert-danger" hidden>
              <strong>Warning!</strong> you must compile all fields
            </div>

            <div id="not-found-message" class="alert alert-danger" hidden>
              <strong>Sorry!</strong> can't find any result 
            </div>
          </form>

          <!-----button to open log table page------>
          <button id="btn-goto-log" style="margin-bottom: 10px;" > view history table</button>
      </div>    
    </div>

    <!------------------FOOTER PAGE------------>
    <?php include 'footer.html'; ?>
  </div>

  <!--my scripts-->
  <script defer>
    $(this).ready(()=>{
      setThemeToDefault();
      setFormSelectOptions('name','brands','#select-brand');
      setFormSelectOptions('name','items','#select-item');
      setFormSelectOptions('city','stores','#select-city');

      $('#btn-goto-log').click(gotoLogTablePage);
      $('#btn-theme-dark').click(setThemeToDark);
      $('#btn-theme-light').click(setThemeToLight);
      $('#btn-theme-default').click(setThemeToDefault);
      $('#form-find').submit(searchProduct);
    })
  </script>
  <script src="assets/javascript/db.requests.js" defer ></script>
  <script src="assets/javascript/theme.switcher.js" defer></script>
  <script src="assets/javascript/action.js" defer></script>

</body>
</html>