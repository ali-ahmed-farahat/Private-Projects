<!DOCTYPE html>
<html>
<head>
	<title>Gamasa Airways</title>
	<style>
		/* Set primary and secondary colors */
		:root {
			--primary-color: #1da1f2;
			--secondary-color: #d8d8d8;
		}

		/* Style the header */
		header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			background-color: var(--primary-color);
			padding: 20px;
			color: #ffffff;
			font-family: 'Segoe UI', sans-serif;
			font-size: 24px;
			font-weight: bold;
		}

		/* Style the "Book a flight" button */
		.btn-book {
			background-color: #ff5a5f;
			color: #ffffff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			font-family: 'Segoe UI', sans-serif;
			font-size: 16px;
			font-weight: bold;
			cursor: pointer;
		}

		/* Style the "Book a flight" button on hover */
		.btn-book:hover {
			background-color: #ff4449;
		}

	</style>
</head>
<body>
	<header>
		<!-- Logo or company name -->
		<div>Gamasa Airways</div>
		<!-- Book a flight button -->
		<button class="btn-book">Book a flight</button>
	</header>
</body>
</html>