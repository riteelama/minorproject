<form id="searchform" method="post">
<table class="table">
    <tr colspan="3">
    <td>Search Users</td>
    <td><a href="?new" class="btn btn-primary btn-block" name="create">Add new <?php echo ucfirst($type);?></a></td>
    <td><a href="?all" class="btn btn-success btn-block" name="create">View <?php echo ucfirst($type);?></a></td>
    </tr>
      <tr>
    <td>Search By Search Key
        <select name="searchby">
            <option value="id">ID</option>
            <option value="name" selected>Name</option>
            <option value="description">Description</option>
            <option value="excerpt" selected>Excerpt</option>
            <option value="price" selected>Price</option>
            <option value="postdate">Postdate</option>
            <option value="status">Status</option>
        </select>
        <input type="text" name="searchkey" id="searchkey">
        <button type="submit" name="search-btn" class="btn btn-secondary">Search <?php echo ucfirst($type);?></button>
    </td>
    </tr>
</table>
</form>
