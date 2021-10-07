<template>
  <div class="auth">
    <h1>This is the authentication page</h1>

    <div class="container">
    <form action="/action_page.php">
        <div class="form-group">
        <label for="name">Name:</label>
        <input type="name" class="form-control" placeholder="Enter name" id="name">
    </div>
        <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

  </div>
</template>