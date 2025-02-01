<div class="px-20 m-auto">
    <div class="">
        <h1 class="text-4xl font-bold pt-14 pb-2 text-center">NSS Library Management</h1>

        <div id="logo" class="flex justify-center items-center mb-10 mt-5">
            <a href="https://nss.edu.np"><img src="../images/logo.png" alt="logo" class="h-40"></a>
        </div>

        <div class="text-center">
            <h1 class="pb-2">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p></p>
        </div>
        <p class="text-center text-3xl">Books in our library</p>
    </div>
    <div class="relative mt-8 flex justify-between items-center">
        <div class="block items-center">
        <h2>Search by book name:</h2>
            <form action="main.php" method="GET" class="flex items-center">
                <input type="text" name="query" class="w-30 border h-12 text-lg px-6 my-2 rounded shadow-md" placeholder="Search for books..." autocomplete="off">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white mx-4 h-12 px-4 rounded">Search</button>
            </form>
        </div>
        <div class="block items-center">
        <h2>Search by Author name:</h2>
            <form action="main.php" method="GET" class="flex items-center"> 
                <input type="text" name="queryAuthor" class="w-30 border h-12 text-lg px-6 my-4 rounded shadow-md" placeholder="Search by author name..." autocomplete="off">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white mx-4 h-12 px-4 rounded">Search</button>
            </form>
        </div>
           
    </div>
    <div id="bookDetails" class="mt-4 text-center">
    <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Book Name</th>
                        <th class="py-2 px-4 border-b">Author</th>
                        <th class="py-2 px-4 border-b">Quantity</th>
                        <th class="py-2 px-4 border-b">ISBN</th>
                    </tr>
                </thead>
                <tbody id="bookTableBody">
                <?php
                        require 'config.php'; // Database connection

                        $searchTerm = isset($_GET['query']) ? $_GET['query'] : '';
                        $searchAuthor = isset($_GET['queryAuthor']) ? $_GET['queryAuthor'] : '';

                        $stmt = $conn->prepare("SELECT * FROM books WHERE bookname LIKE ? OR author LIKE ?");
                        $searchTerm = "%$searchTerm%";
                        $searchAuthor = "%$searchAuthor%";
                        $stmt->bind_param("ss", $searchTerm, $searchAuthor);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td class="py-2 px-4 border-b"><a href="index.php?page=bookdetail&id=' . $row['id'] . '">' . $row['id'] . '</a></td>';
                                echo '<td class="py-2 px-4 border-b"><a href="index.php?page=bookdetail&id=' . $row['id'] . '">' . $row['bookname'] . '</a></td>';
                                echo '<td class="py-2 px-4 border-b"><a href="index.php?page=bookdetail&id=' . $row['id'] . '">' . $row['author'] . '</a></td>';
                                echo '<td class="py-2 px-4 border-b"><a href="index.php?page=bookdetail&id=' . $row['id'] . '">' . $row['quantity'] . '</a></td>';
                                echo '<td class="py-2 px-4 border-b"><a href="index.php?page=bookdetail&id=' . $row['id'] . '">' . $row['ISBN'] . '</a></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5" class="text-center py-4">No books found</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
    </div>
</div>
