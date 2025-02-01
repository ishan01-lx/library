<div class="px-24 w-full h-45 flex flex-col justify-center my-12 ">
    <h1 class="text-4xl font-bold text-center pt-14">Welcome to Library Login</h1>
<div id="loginForm" class="text-black my-10 justify-start">
    <form action="authenticate.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-lg" required autocomplete="off">
        <br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" class="w-full border h-12 text-lg px-6 my-4 rounded shadow-lg" id="password" required>
        <input type="checkbox" onclick="toggle()">Show password
        <br>
        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">Login</button>
    </form>
    <div class="mt-11 flex">
    <p class="mb-3">If you haven`t register yet? </p>
        <a href="index.php?page=options">
            <p class="text-blue-500 hover:underline">Create an account</p>
        </a>
    </div>
</div>
</div>

<script src="toggle.js"></script>