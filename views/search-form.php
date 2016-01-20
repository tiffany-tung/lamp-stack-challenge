<h1>Movies</h1>
<form action="" method="GET">
    <div class="form-group">
        <input type="text" 
            id="titleInput" 
            name="title"
            class="form-control" 
            value="<?= htmlentities($title) ?>"
            placeholder="search by title"
            >
    </div>
    <div class="form-group text-left">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>