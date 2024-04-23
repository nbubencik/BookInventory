<?php   										// Opening PHP tag
	
	// Include the database connection script
	require 'includes/database-connection.php';

  	$bookId = $_GET['bookId'];
  	$bookName = $_GET['bookName'];
	$listID = $_GET['listID']
	$listName = $_GET['listName'];

	function remove_book_from_list(PDO $pdo, string $bookId, string $listID){
	    // start transaction
	    $pdo->beginTransaction();
	    	
	    // delete book into list
	    $sql = "DELETE FROM user_books WHERE listID = :listID and bookID = :bookId";
	    $stmt = pdo($pdo, $sql, ['listID' => $listID, 'bookId' => $bookId]);
	
	    // Commit transaction
	    $pdo->commit();
	    return ;
	}
	
	remove_book_from_list($pdo, $bookId, $listID);
	


	
// Closing PHP tag  ?> 

<!DOCTYPE>
<html>

	<head>
		<meta charset="UTF-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<title>Book Inventory</title>
  		<link rel="stylesheet" href="css/style.css">
  		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
	</head>

	<body>

		<header>
			<div class="header-left">
				<div class="logo">
					<img src="imgs/book-logo.jpg" alt="Book Inventory Logo">
      			</div>

	      		<nav>
	      			<ul>
	      				<li><a href="book-cat.php">Book Catalog</a></li>
	      				<li><a href="about.php">About</a></li>
			        </ul>
			    </nav>
		   	</div>

		    <div class="header-right">
		    	<ul>
				<li><a href="groups.php">Groups</a></li>
		    		<li><a href="list.php">Lists</a></li>
		    	</ul>
		    </div>
		</header>

		<main>

			<div class="rm-book-list-container">
				<div class="rm-book-list-container">
					<button onclick="location.href='list_books.php?listID=<?= $listID ?>&listName=<?= $listName ?>'; return false;" type="button">Back to Lists</button>
				</div>
            				<p><?= $bookName ?> has been removed from <?= $listName ?> List </p>
					
			</div>

		</main>

	</body>

</html>
