<form action="/" method="GET" accept-charset="utf-8" class="container">
	<div class="input-group mb-3">
		<div class="form-floating">
			<input type="search" placeholder="Type student name" autocomplete="off"
				class="form-control" id="search" name="search"
				value="{{(isset($_GET['search'])) ? $_GET['search'] : ''}}"/>
			<label for="search">Type student name...</label>
		</div>
		<button type="submit" class="input-group-text">
			<i class="fa-solid fa-magnifying-glass"></i>&nbsp; Search
		</span>
	</div>
</form>