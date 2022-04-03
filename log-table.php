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
	<link rel="stylesheet" href="assets/css/log-table-style.css">
	

	<title>Search History</title>
	
</head>
<body>

	<div class="page-layout">
		<!--------------NAVIGATION BAR------------->
		<header>
			<?php include 'navbar.html'; ?>
		</header>
		

		<div class="bg-image content-body">
			<div class="container-floating">
				<h1>History table</h1>

				<div class="form d-flex flex-row mt-5">
					<span class="select-wrap w-25">

						<select class="form-select" id="ord-by">
							<option value="DESC"> Most recent </option>
							<option value="ASC"> Least recent</option>
						</select>
					</span>
								
					<span class="select-wrap w-25">
						<select class="form-select" id="date-to">
							<option value="1"> Today</option>
							<option value="7" selected> Last Week</option>
							<option value="31"> Last Month</option>
							<option value="366"> Last Year </option>
						</select>
					</span>
					

					<input id="search-bar" class="form-control w-50" type="text" placeholder="Search" aria-label="Search">
				</div>
			
				<table id="table-log" class="table"></table>
			</div>
		</div>
	
		<!-------------FOOTER PAGE------------>
		<?php include 'footer.html'; ?>
	</div>
  <script defer>
		$(document).ready(()=>{
				setSelectedTheme();
				$('#btn-theme-dark').click(setThemeToDark);
      	$('#btn-theme-light').click(setThemeToLight);
     		$('#btn-theme-default').click(setThemeToDefault);

				$('#search-bar').keyup(validateSearchBarInput);
				$('#ord-by').change(loadLogTable);
				$('#date-to').change(loadLogTable);
				loadLogTable()
		})
	</script>

	<!--my scripts-->
	<script src="assets/javascript/theme.switcher.js" defer></script>
	<script src="assets/javascript/db.requests.js" defer></script>
	<script src="assets/javascript/action.js" defer></script>

</body>
</html>