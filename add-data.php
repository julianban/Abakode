<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!--jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  <!--my style-->
  <link id="theme-style" rel="stylesheet" href="">
  <style>

    .wrap-inline{
      display: flex;
      flex-direction: row;
    }

    .wrap-inline .wrap-inline-item{
      margin-right: 5px;
    }
  </style>

  

  <title>Add data</title>
</head>
<body>

  <div class="page-layout">
    <!--------------NAVIGATION BAR------------->
    <header>
      <?php include 'navbar.html' ?>
    </header>
    
    
    
    <div class="bg-image content-body">
      <div class="container-floating">
        <h1 class="">Update DB </h1>
        <!--form-->
        <div>
          <form id="form" class="form-group">
            <!--first input field-->
            <label class="form-label" for=""> Insert item's name</label>
            <input id="input-new-item" class="form-control mb-2" type="text" name="item" placeholder="Item's name">

            <!--second input select-->
            <label class="form-label" for="">Select brand name</label>
            <span class="wrap-inline mb-2">
              <select id="select-brand" class="form-select wrap-inline-item" name="brand">
                <option value="Add new brand"> Add new brand </option>
              </select>
              <input id="input-new-brand" class="form-control" type="text" name="newbrand" placeholder="Add here new brand">
            </span>

            <!--third input field-->
            <label class="form-label" for=""> Insert location address</label>
            <span class="wrap-inline mb-2">
              <input id="input-new-address" class="form-control wrap-inline-item" type="text" name="address_location" placeholder="Address">
              <input id="input-new-city" class="form-control" type="text" name="city" placeholder="City">
            </span>

            <!--fourth input field-->
            <label class="form-label" for=""> Redirect to associate link <i style="opacity:30%;font-weight: 50; ">*optional</i></label>
            <input class="form-control mb-2" type="text" name="link" placeholder="redirect link">
            
            <!--submit button-->
            <button id="btn-submit">submit</button>
            <!--error message-->
            <div id="warning-message" class="alert alert-danger" hidden>
              <strong>Warning!</strong> you must compile all fields
            </div>
            <div id="success-message" class="alert alert-success" hidden >
              <strong>Success!</strong> new data has been added successfuly
            </div>

          </form>
        </div>
      </div>
    </div>




    <!-------------FOOTER PAGE------------>
    <?php include 'footer.html' ?>
  </div>

  
  <!--my scripts-->
  <script defer>
    $(document).ready(()=>{
      setSelectedTheme();
      setFormSelectOptions('name','brands','#select-brand');

      $('#btn-theme-dark').click(setThemeToDark);
      $('#btn-theme-light').click(setThemeToLight);
      $('#btn-theme-default').click(setThemeToDefault);

      $('#form').submit(addToDatabase);
      $('#select-brand').change(checkBrandSelectOption);
    })
  </script>
  <script src="assets/javascript/theme.switcher.js" defer></script>
  <script src="assets/javascript/db.requests.js" defer></script>
  <script src="assets/javascript/action.js" defer></script>

</body>
</html>